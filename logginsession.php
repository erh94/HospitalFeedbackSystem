<?php
session_start();
function isLoginSessionExpired() {
	$login_session_duration = 1600;
	$current_time = time();
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION['check'])){
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){
			return true;
		}
	}
	return false;
}
?>
