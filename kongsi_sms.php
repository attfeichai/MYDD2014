#!/usr/bin/php 

<?php

	$pref_path = "/var/www/kongsi/";

	// include the necessary classes
	include $pref_path."config.php";
	include $pref_path."include/adodb5/adodb.inc.php";
	include $pref_path."include/class.DateHelperExt.php";
	
	$smsfolder = '/var/spool/gammu/inbox/';
	$sms_error = "";
	$date = new DateTime();
	$result = "";

	if ($handle = opendir($smsfolder)) {
        		while (false !== ($entry = readdir($handle))) {
          		if ($entry != "." && $entry != ".." && (pathinfo($entry)["extension"]) == "txt") {
             			$content  = file_get_contents($smsfolder . $entry);

                  		$file_part = explode("_",$entry);       
                  		$command =  $file_part[1];
				$customer_id =  $file_part[2];
				$menu_id =  $file_part[3];
				$securitycode =  $file_part[4];
				echo "Command: '$command' \n";
				}
		}
	fclose($handle);
	}
?>
                  
