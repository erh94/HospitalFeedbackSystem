<?php
session_start();

$url = "index.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
  $_SESSION['sessionexpired'] = 'true';
	unset($_SESSION['SimpleLogout']);
}else{
  $_SESSION['SimpleLogout'] = 'true';
	unset($_SESSION['sessionexpired']);
}
unset($_SESSION['check']);
?>
<script> a = window.open("https://gymkhana.iitb.ac.in/sso/account/logout/","_blank"); a.close(); window.location = "index.php";</script>
