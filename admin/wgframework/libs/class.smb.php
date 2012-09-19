<?php
class smb {

	var $cfgSmbClient = 'smbclient';
	var $user='', $pw='', $cfgAuthMode='';
	var $cfgDefaultServer='localhost', $cfgDefaultUser='', $cfgDefaultPassword='';
	var $types = array ('network', 'workgroup', 'server', 'share');
	var $type = 'network';
	var $network = 'Windows Network';
	var $workgroup='', $server='', $share='', $path='';
	var $name = '';
	var $workgroups=array(), $servers=array(), $shares=array(), $files=array();
	var $cfgCachePath = false;
	var $tempFile = '';
	var $debug = 0;
	var $socketOptions = 'TCP_NODELAY IPTOS_LOWDELAY SO_KEEPALIVE SO_RCVBUF=8192 SO_SNDBUF=8192';
	var $blockSize = 1200;
	var $order = 'NA';
	var $status = '';
	var $parser = array(
"^added interface ip=([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}) bcast=([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}) nmask=([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})\$" => 'SKIP',
"Anonymous login successful" => 'SKIP',
"^Domain=\[(.*)\] OS=\[(.*)\] Server=\[(.*)\]\$" => 'SKIP',
"^\tSharename[ ]+Type[ ]+Comment\$" => 'SHARES_MODE',
"^\t---------[ ]+----[ ]+-------\$" => 'SKIP',
"^\tServer   [ ]+Comment\$" => 'SERVERS_MODE',
"^\t---------[ ]+-------\$" => 'SKIP',
"^\tWorkgroup[ ]+Master\$" => 'WORKGROUPS_MODE',
"^\t(.*)[ ]+(Disk|IPC)[ ]+IPC.*\$" => 'SKIP',
"^\tIPC\\\$(.*)[ ]+IPC" => 'SKIP',
"^\t(.*)[ ]+(Disk|Printer)[ ]+(.*)\$" => 'SHARES',
'([0-9]+) blocks of size ([0-9]+)\. ([0-9]+) blocks available' => 'SIZE',
"Got a positive name query response from ([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})" => 'SKIP',
"^session setup failed: (.*)\$" => 'LOGON_FAILURE',
'^tree connect failed: ERRSRV - ERRbadpw' => 'LOGON_FAILURE',
"^Error returning browse list: (.*)\$" => 'ERROR',
"^tree connect failed: (.*)\$" => 'ERROR',
"^Connection to .* failed\$" => 'CONNECTION_FAILED',
'^NT_STATUS_INVALID_PARAMETER' => 'INVALID_PARAMETER',
'^NT_STATUS_DIRECTORY_NOT_EMPTY removing' => 'DIRECTORY_NOT_EMPTY',
'ERRDOS - ERRbadpath \(Directory invalid.\)' => 'NOT_A_DIRECTORY',
'NT_STATUS_NOT_A_DIRECTORY' => 'NOT_A_DIRECTORY',
'cd (.*): not a directory' => 'NOT_A_DIRECTORY',
'^NT_STATUS_NO_SUCH_FILE listing ' => 'NO_SUCH_FILE',
'^NT_STATUS_ACCESS_DENIED' => 'ACCESS_DENIED',
'^cd (.*): NT_STATUS_OBJECT_PATH_NOT_FOUND' => 'OBJECT_PATH_NOT_FOUND',
'^cd (.*): NT_STATUS_OBJECT_NAME_NOT_FOUND' => 'OBJECT_NAME_NOT_FOUND',
"^\t(.*)\$" => 'SERVERS_OR_WORKGROUPS',
"^([0-9]+)[ ]+([0-9]+)[ ]+(.*)\$" => 'PRINT_JOBS',
"^Job ([0-9]+) cancelled" => 'JOB_CANCELLED',
'^[ ]+(.*)[ ]+([0-9]+)[ ]+(Mon|Tue|Wed|Thu|Fri|Sat|Sun)[ ](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)[ ]+([0-9]+)[ ]+([0-9]{2}:[0-9]{2}:[0-9]{2})[ ]([0-9]{4})$' => 'FILES',
"^message start: ERRSRV - ERRmsgoff" => 'NOT_RECEIVING_MESSAGES',
"^NT_STATUS_CANNOT_DELETE" => 'CANNOT_DELETE'
	);

	public function __construct($path='') {
		if ($path <> '') $this->Go($path);
		print $path;
	}

	# path: WORKGROUP/SERVER/SHARE/PATH
	public function Go($path = '') {
		$a = ($path <> '') ? split('/',$path) : array();
		for ($i=0, $ap=array(); $i<count($a); $i++)
		switch ($i) {
			case 0: $this->workgroup = $a[$i]; break;
			case 1: $this->server = $a[$i]; break;
			case 2: $this->share = $a[$i]; break;
			default: $ap[] = $a[$i];
		}
		$this->path = join('/', $ap);
		$this->type = $this->types[(count($a) > 3) ? 3 : count($a)];
		$this->name = basename($path);
		$this->parent = $this->_DirectoryName($this->path);
		$this->fullPath = $path;
	}

	public function Browse($order='NA') {
		$this->results = array();
		$this->shares = $this->servers = $this->workgroups = $this->files = $this->printjobs = array();
		$server = ($this->server == '') ? $this->cfgDefaultServer : $this->server;
		# smbclient call
		switch ($this->type) {
			case 'share':
				$this->_SmbClient('dir', $this->path);
				switch ($this->status) {
					case 'NO_SUCH_FILE':
						$this->_SmbClient('queue', $this->path);
						$this->type = 'printer';
						break;
					case 'OBJECT_PATH_NOT_FOUND':
					case 'NOT_A_DIRECTORY':
						$this->_Get ();
				}
				break;
					case 'workgroup':
						if (($server = $this->_MasterOf($this->workgroup)) == $this->cfgDefaultServer) break;
					default:
						$this->_SmbClient('', $server);
		}
		# fix a smbclient bug (i think)
		if (! isset($this->servers[$server]))
		$this->servers[$server] = array ('name'=>$server, 'type'=>'server', 'comment'=>'');
		# sort and select results
		$results = array (
		'network' => 'workgroups', 'workgroup' => 'servers',
		'server' => 'shares', 'share' => 'files', 'folder' => 'files',
		'printer' => 'printjobs'
		);
		if (isset($results[$this->type])) {
			$this->results = $this->$results[$this->type];
			# we need a global var for the compare function
			$GLOBALS['SMBWEBCLIENT_SORT_BY'] = ($this->order <> '') ? $this->order : 'NA';
			uasort($this->results, array('samba', '_GreaterThan'));
		}
		return $this->status;
	}

	public function Remove() {
		$this->_SmbClient('del "'.$this->name.'"', $this->parent);
		if ($this->status == 'NO_SUCH_FILE') {
			# it is a folder or not exists
			$this->_SmbClient('dir', $this->parent);
			# OK : if it is a folder, delete recursively
			if (@$this->files[$this->name]['type'] == 'folder') $this->_DeleteFolder ();
		}
	}

	# recursive deletion of SMB folders
	private function _DeleteFolder() {
		$this->_SmbClient('del *', $this->path);
		$this->_SmbClient('rmdir "'.basename($this->path).'"', $this->_DirectoryName($this->path));
		if ($this->status == 'DIRECTORY_NOT_EMPTY') {
			$this->files = array();
			$savedPath = $this->path;
			$this->_SmbClient('dir', $this->path);
			$files = $this->files;
			foreach ($files as $name => $info) {
				switch ($info['type']) {
					case 'folder':
						$this->path = $savedPath.'/'.$name;
						$this->_DeleteFolder();
						break;
					case 'file':
						$this->_SmbClient('del "'.$name.'"', $this->path);
				}
			}
			$this->path = $savedPath;
			$this->_SmbClient('rmdir "'.basename($this->path).'"', $this->_DirectoryName($this->path));
		}
	}

	public function MakeDirectory() {
		$this->_SmbClient('mkdir "'.$this->name.'"', $this->parent);
	}

	public function UploadFile($file) {
		$this->_SmbClient('put "'.$file.'" "'.$this->name.'"', $this->parent);
	}

	public function PrintFile($file) {
		$this->_SmbClient('print '.$file);
	}

	public function RenameFile($file, $newname) {
		$this->_SmbClient('rename "'.$file.'" "'.$newname.'"', $this->parent);
	}

	public function CancelPrintJob($job) {
		$this->_SmbClient('cancel '.$job);
	}

	private function _GreaterThan($a, $b) {
		global $SMBWEBCLIENT_SORT_BY;
		list ($yes, $no) = ($SMBWEBCLIENT_SORT_BY[1] == 'D') ? array(-1,1) : array (1,-1);
		if ($a['type'] <> $b['type']) {
			return ($a['type'] == 'file') ? $yes : $no;
		} else {
			switch ($SMBWEBCLIENT_SORT_BY[0]) {
				case 'N': return (strtolower($a['name']) > strtolower($b['name'])) ? $yes : $no;
				case 'D': return (@$a['time'] > @$b['time']) ? $yes : $no;
				case 'S': return (@$a['size'] > @$b['size']) ? $yes : $no;
				case 'C': return (strtolower(@$a['comment']) > strtolower(@$b['comment'])) ? $yes : $no;
				case 'T':
					$pia = pathinfo(strtolower($a['name']));
					$pib = pathinfo(strtolower($b['name']));
					return (@$pia['extension'] > @$pib['extension']) ? $yes : $no;
			}
		}
	}

	private function _MasterOf($workgroup) {
		$saved = array ($this->type, $this->user, $this->pw);
		if ($this->cfgDefaultUser <> '') {
			list ($this->user, $this->pw) = array ($this->cfgDefaultUser, $this->cfgDefaultPassword);
		}
		$this->type = 'network';
		$this->_SmbClient('', $this->cfgDefaultServer);
		list ($this->type, $this->user, $this->pw) = $saved;
		return $this->workgroups[$this->workgroup]['comment'];
	}

	# get a file (including a cache)
	function _Get ()
	{
		$this->_SmbClient('dir "'.$this->name.'"', $this->parent);
		if ($this->status == '') {
			$this->type = 'file';
			$this->size = $this->files[$this->name]['size'];
			$this->time = $this->files[$this->name]['time'];
			if (! $this->cfgCachePath) {
				$this->DumpFile('', $this->name);
				$this->_SmbClient('get "'.$this->name.'" - "', $this->parent, '', true);
			} else {
				$this->tempFile = $this->cfgCachePath . $this->fullPath;
				if (@filemtime($this->tempFile) < $this->time OR !file_exists($this->tempFile)) {
					if (! is_dir($this->_DirectoryName($this->tempFile))) {
						$this->_MakeDirectoryRecursively($this->_DirectoryName($this->tempFile));
					}
					$this->_SmbClient('get "'.$this->name.'" "'.$this->tempFile.'"', $this->parent);
				}
				$this->DumpFile ($this->tempFile, $this->name);
			}
		}
	}

	function SendMessage ($server, $message)
	{
		$this->_SmbClient ('message', $server, $message);
	}

	private function _SmbClient($command='', $path='', $message='', $dumpFile=false) {
		$this->status = '';
		if ($command == '') $smbcmd = "-L ".escapeshellarg($path);
		elseif ($command == 'message') $smbcmd = "-M ".escapeshellarg($path);
		elseif ($command == 'compress') {
			$smbcmd = escapeshellarg("//{$this->server}/{$this->share}")." -Tqc - ".escapeshellarg($path);
		} else {
			$smbcmd = escapeshellarg("//{$this->server}/{$this->share}").
			" -c ".escapeshellarg($command);
			if ($path <> '') $smbcmd .= ' -D '.escapeshellarg($path);
		}
		$options = ' -d 0 ';
		if ($command <> '') {
			if ($this->workgroup <> '') $options .= ' -W '.escapeshellarg($this->workgroup);
			if ($this->socketOptions <> '') $options .= ' -O '.escapeshellarg($this->socketOptions);
			if ($this->blockSize <> '') $options .= ' -b '.$this->blockSize;
		}
		if ($this->user <> '') {
			# not anonymous
			switch ($this->cfgAuthMode) {
				case 'SMB_AUTH_ENV': putenv('USER='.$this->user.'%'.$this->pw); break;
				case 'SMB_AUTH_ARG': $smbcmd .= ' -U '.escapeshellarg($this->user.'%'.$this->pw);
			}
		}
		$cmdline = $this->cfgSmbClient.' '.$smbcmd.' '.$options.' -N ';
		if ($message <> '') $cmdline = "echo ".escapeshellarg($message).' | '.$cmdline;
		$cmdline .= ($dumpFile) ? '2>/dev/null' : '2>&1';
		if ($command == 'compress') {
			$tmpfname = tempnam("/tmp", "swcZ");
			$archiver = str_replace("@f", $tmpfname, $this->archiverPlugins[$this->cfgArchiver]);
			@unlink($tmpfname);
			$cmdline .= $archiver;
			$dumpFile = true;
		}
		return $this->_ParseSmbClient ($cmdline, $dumpFile);
	}

	function _ParseSmbClient ($cmdline, $dumpFile=false)
	{
		$sec_cmdline = str_replace($this->pw, '****', $cmdline);
		if (! $dumpFile) {
			$output = shell_exec($cmdline);
			$debug_command = ($this->debug > 1) ? "\n[smbclient]\n{$output}\n[/smbclient]" : "";
		} else {
			# output a file
			passthru($cmdline);
		}
		$this->Debug("{$sec_cmdline}{$debug_command}",1);
		$lineType = $mode = '';
		foreach (split("\n", $output) as $line) if ($line <> '') {
			$regs = array();
			reset ($this->parser);
			$linetype = 'skip';
			$regs = array();
			foreach ($this->parser as $regexp => $type) {
				# preg_match is much faster than ereg (Bram Daams)
				if (preg_match('/'.$regexp.'/', $line, $regs)) {
					$lineType = $type;
					break;
				}
			}
			switch ($lineType) {
				case 'SKIP': continue;
				case 'SHARES_MODE': $mode = 'shares'; break;
				case 'SERVERS_MODE': $mode = 'servers'; break;
				case 'WORKGROUPS_MODE': $mode = 'workgroups'; break;
				case 'SHARES':
					$name = trim($regs[1]);
					$type = strtolower($regs[2]);
					if ($this->cfgHideSystemShares == true AND $name[strlen($name)-1] == '$') break;
					if ($this->cfgHidePrinterShares == true AND $type == 'printer') break;
					$this->shares[$name] = array (
						'name' => $name,
						'type' => $type,
						'comment' => $regs[3]
					);
					break;
				case 'SERVERS_OR_WORKGROUPS':
					$name = trim(substr($line,1,21));
					$comment = trim(substr($line, 22));
					if ($mode == 'servers') {
						$this->servers[$name] = array ('name' => $name, 'type' => 'server', 'comment' => $comment);
					} else {
						$this->workgroups[$name] = array ('name' => $name, 'type' => 'workgroup', 'comment' => $comment);
					}
					break;
				case 'FILES':
					# with attribute ?
					if (preg_match("/^(.*)[ ]+([D|A|H|S|R]+)$/", trim($regs[1]), $regs2)) {
						$attr = trim($regs2[2]);
						$name = trim($regs2[1]);
					} else {
						$attr = '';
						$name = trim($regs[1]);
					}
					if ($name <> '.' AND $name <> '..') {
						$type = (strpos($attr,'D') === false) ? 'file' : 'folder';
						$this->files[$name] = array (
						'name' => $name,
						'attr' => $attr,
						'size' => $regs[2],
						'time' => $this->_ParseTime($regs[4],$regs[5],$regs[7],$regs[6]),
						'type' => $type
						);
					}
					break;
				case 'PRINT_JOBS':
					$name = $regs[1].' '.$regs[3];
					$this->printjobs[$name] = array(
					'name'=>$name,
					'type'=>'printjob',
					'id'=>$regs[1],
					'size'=>$regs[2]
					);
					break;
				case 'SIZE':
					$this->size = $regs[1] * $regs[2];
					$this->available = $regs[3] * $regs[2];
					break;
				case 'ERROR': $this->status = $regs[1]; break;
				default:  $this->status = $lineType;
			}
		}
	}

	# returns unix time from smbclient output
	function _ParseTime ($m, $d, $y, $hhiiss)
	{
		$his= split(':', $hhiiss);
		$im = 1 + strpos("JanFebMarAprMayJunJulAugSepOctNovDec", $m) / 3;
		return mktime($his[0], $his[1], $his[2], $im, $d, $y);
	}

	# make a directory recursively
	function _MakeDirectoryRecursively ($path, $mode = 0777)
	{
		if (strlen($path) == 0) return 0;
		if (is_dir($path)) return 1;
		elseif ($this->_DirectoryName($path) == $path) return 1;
		return ($this->_MakeDirectoryRecursively($this->_DirectoryName($path), $mode)
		and mkdir($path, $mode));
	}

	# I do not like PHP dirname
	function _DirectoryName ($path='')
	{
		$a = split('/', $path);
		$n = (trim($a[count($a)-1]) == '') ? (count($a)-2) : (count($a)-1);
		for ($dir=array(),$i=0; $i<$n; $i++) $dir[] = $a[$i];
		return join('/',$dir);
	}

}

?>
