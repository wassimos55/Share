<?php
/* The error feature is disabled by default
 * To activate it you need to include it to the bootstrap.php file
 * e.g: include 'error_log.php';
 * Good Luck
 */

$error_log = [
	'name' => ''
];

function err_log($error){
	global $error_log;
		if (!empty($error)) {
			$error_log = [
				'name' => $error
			];
			foreach ($error_log as $err) {
				echo "<div class='alert alert-danger'>".$err."</div>";
				unset($error_log['name']);
			}
		}else{
			return false;
		}
	}
