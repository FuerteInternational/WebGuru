<?php
function customError($errno, $errstr='', $errfile='', $errline='') { 
	switch ($errno) {
	case E_ERROR:
		echo "<p class=\"wgerrorbox\"><b>FATAL ERROR</b> [$errno] $errstr<br />\n";
		echo "  Fatal error on line $errline in file $errfile";
		echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
		echo "Aborting...<br /></p>\n";
		exit(1);
		break;
	
	case E_USER_ERROR:
		echo "<p><b>USER ERROR</b> [$errno] $errstr<br />\n";
		echo "  Fatal error on line $errline in file $errfile";
		echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
		echo "Aborting...<br /></p>\n";
		exit(1);
		break;
	
	case E_WARNING:
		echo "<p><b>WARNING</b> $errstr \n";
		echo "on line $errline in file $errfile</p>\n";
		if (DEVELOP == true) {
			//echo "You are in the WebGuru Developers Mode, system can't continue.";
			//exit(1);
		}
		break;
	
	case E_USER_WARNING:
		echo "<p><b>USER WARNING</b> [$errno] $errstr<br />\n";
		echo "on line <b>$errline</b> in file $errfile</p>\n";
		//exit(1);
		break;
	
	case E_STRICT:
		//echo "<b>STRICT WARNING</b> [$errno] $errstr<br />$errfile, line:$errline\n";
		//exit(1);
		break;
	
	case E_NOTICE:
		echo "<p><b>NOTICE</b> [$errno] $errstr \n";
		echo "on line <b>$errline</b> in file $errfile</p>\n";
		break;
	
	case E_USER_NOTICE:
		echo "<p><b>USER NOTICE</b> [$errno] $errstr<br />\n";
		echo "on line <b>$errline</b> in file $errfile</p>\n";
		break;
		
	default:
		echo "<p>Unknown error type: [$errno] $errstr<br />\n";
		echo "on line <b>$errline</b> in file $errfile</p>\n";
		break;
	}
	/* Don't execute PHP internal error handler */
	return true;
}
//set_error_handler('customError');
//set_exception_handler('customError');


class WgException extends Exception {

	/** The nested "cause" exception. */
	protected $cause;

	function __construct($p1, $p2 = null) {

		$cause = null;

		if ($p2 !== null) {
			$msg = $p1;
			$cause = $p2;
		} else {
			if ($p1 instanceof Exception) {
				$msg = "";
				$cause = $p1;
			} else {
				$msg = $p1;
			}
		}

		parent::__construct($msg);

		if ($cause !== null) {
			$this->cause = $cause;
			$this->message .= " [wrapped: " . $cause->getMessage() ."]";
		}
	}

	function getCause() {
		return $this->cause;
	}

}
?>