<?php
require_once 'sso_handler.php';

$required_fields =array('username','etc','etc3');
$required_scopes=array('basic','profile','ldap');
$CLIENT_ID="";
$CLIENT_SECRET="";



$REDIRECT_URI = "https://gymkhana.iitb.ac.in/HospitalFeedback/login.php";

$sso_handler = new SSOHandler($CLIENT_ID, $CLIENT_SECRET);
// if ($sso_handler->validate_code($_GET)) {
  $response = $sso_handler->default_execution($_GET, $REDIRECT_URI, $required_scopes, $required_fields);
  $user_info = $response['user_information'];
  $roll_number = $user_info['roll_number'];

    $ldapId = $user_info['username'];

    $name = $user_info['first_name'] . ' ' . $user_info['last_name'];
    $type = $user_info['type'];


    session_start();

    $_SESSION['ldap_id'] = $ldapId;
    $_SESSION['access'] = $response['access_information'];
    $_SESSION['rollno'] = $roll_number;
    $_SESSION['name'] = $name;
    if($ldapId=="reach_himanshu"){
        $_SESSION['admin']=TRUE;

    }else{
        $_SESSION['admin']=FALSE;
        
    }
    include 'connect.php';

    $_SESSION['check'] = 1;
    header("location:student.php");
    exit();

// } else{
    // echo "Code is not present";
// }

END:

?>
