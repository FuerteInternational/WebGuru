<div class="box">
	<h2>System check</h2>
    <div class="legend">
    	<p>If any of these items are highlates in <span class="red">red</span> please take actions to correct them. Failture to do so could lead to your WebGuru Publisher CMS installation not functioning correctly.</p>
    </div>
	<table class="content">
        <colgroup>
            <col style="width:50%;" />
            <col style="width:50%;" />
            <col style="width:0%;" />
        </colgroup>
    	<tbody>
        	<tr>
            	<td>PHP version</td>
            	<td class="green"><?php echo PHP_VERSION; ?></td>
            	<td>&nbsp;</td>
            </tr>
        	<tr>
            	<td>MySQL support</td>
            	<td><?php echo $ismysql ? '<span class="green">Available</span>' : '<span class="red">Unavailable</span>';?></td>
            	<td>&nbsp;</td>
            </tr>
        	<tr>
            	<td>MySQLi support</td>
            	<td><?php echo extension_loaded('mysqli') ? '<span class="green">Available</span>' : '<span class="orange">Unavailable</span>';?></td>
            	<td>&nbsp;</td>
            </tr>
        	<tr>
            	<td>OpenSSL support</td>
            	<td><?php echo extension_loaded('openssl') ? '<span class="green">Available</span>' : '<span class="orange">Unavailable</span>';?></td>
            	<td>&nbsp;</td>
            </tr>
        	<tr>
            	<td>SOAP support</td>
            	<td><?php echo extension_loaded('soap') ? '<span class="green">Available</span>' : '<span class="orange">Unavailable</span>';?></td>
            	<td>&nbsp;</td>
            </tr>
        	<tr>
            	<td>Root folder</td>
            	<td><?php echo is_writable('../') ? '<span class="green">Writable</span>' : '<span class="orange">Protected</span>';?></td>
            	<td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="box">
	<h2>Recommended settings</h2>
    <?php
	$phpRecommendedSettings = array(array ('Safe Mode', 'safe_mode', false),
	array ('Display Errors','display_errors', true),
	array ('File Uploads','file_uploads', true),
	array ('Magic Quotes GPC','magic_quotes_gpc', true),
	array ('Magic Quotes Runtime','magic_quotes_runtime', false),
	array ('Register Globals','register_globals', false),
	array ('Output Buffering','output_buffering', false),
	array ('Session auto start','session.auto_start', false),
	);
	?>
	<table class="content">
        <colgroup>
            <col style="width:50%;" />
            <col style="width:25%;" />
            <col style="width:25%;" />
        </colgroup>
    	<tbody>
        	<?php foreach ($phpRecommendedSettings as $res) {?>
        	<tr>
            	<td><?php echo $res[0]; ?></td>
            	<td><?php echo $res[2] ? 'ON' : 'OFF'; ?></td>
            	<td><?php
					$onoff = $res[2] ? 'ON' : 'OFF';
                    if (getPhpSetting($res[1]) == $onoff) {
                    ?><span class="green"><?php
                    }
					else {
						if ($res[1] == 'safe_mode') $color = 'red';
						else $color = 'orange';
                    ?><span class="<?php echo $color; ?>"><?php
                    }
                    echo getPhpSetting($res[1]);
                    ?></span></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<form action="" method="post">
	<p><input name="reload" type="button" value="Reload" onclick="reloadPage();" class="js" /> <input name="submit" type="submit" value="Next step"<?php echo $disablenext; ?> /></p>
</form>