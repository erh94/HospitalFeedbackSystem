<?php
  session_start();
     require 'logginsession.php';
  if (!isset($_SESSION['check'])){
    header('location: index.php');
    exit;
  }else if (isLoginSessionExpired()) {
      header("Location:logout.php?session_expired=1");
  }
else{
	require "connect.php";
	if(isset($_SESSION['staff'])){
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['ldapid'] = $_POST['ldapid'];
	$_SESSION['occupation'] = "staff";
	}
try
{
  $occupation = $_SESSION['occupation'];
	$name = $_SESSION['name'];
	$ldap = $_SESSION['ldap_id'];
	$rollno = $_SESSION['rollno'];


    if(isset($_POST['submitOPD']))
    {
      $waitingtime = $_POST['waitingtime'];
      $ratetreatmentOPD = $_POST['ratetreatmentopd'];
      $specialistrecommended = $_POST['specialistrecommended'];
      $overallservice = $_POST['rateoverallopd'];
      $feedbackopd = $_POST['feedbackopd'];

      // echo $waitingtime;
      // echo $ratetreatmentOPD;
      // echo $specialistrecommended;
      // echo $overallservice;
      // echo $feedbackopd;

      $sql1 = "INSERT INTO Hospital_feedback_studentsOPD(Occupation, Name, Ldap, Rollno, waitingtime, ratetreatment, specialistrecommended, rateoverall, feedback)
        VALUES(:occupation,:name,:ldap,:rollno,:waitingtime,:ratetreatmentopd,:specialistrecommended,:rateoverallopd,:feedbackopd)";

      $sql =  $con->prepare($sql1);
            $sql->bindParam(':occupation', $occupation, PDO::PARAM_STR, 1000);
    				$sql->bindParam(':name', $name, PDO::PARAM_STR, 1000);
    				$sql->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
    				$sql->bindParam(':rollno', $rollno, PDO::PARAM_STR, 1000);
    				$sql->bindParam(':waitingtime', $waitingtime, PDO::PARAM_STR, 1000);
    				$sql->bindParam(':ratetreatmentopd', $ratetreatmentOPD, PDO::PARAM_STR, 50);
    				$sql->bindParam(':specialistrecommended', $specialistrecommended, PDO::PARAM_STR, 100);
    				$sql->bindParam(':rateoverallopd', $overallservice, PDO::PARAM_STR, 50);
    				$sql->bindParam(':feedbackopd', $feedbackopd, PDO::PARAM_STR, 5000);
            
    }
    elseif (isset($_POST['submitSpecialist']))
    {
      $waitingtimeSpecialist = $_POST['waitingtimeSpecialist'];
      $clash = $_POST['clash'];
      $admitted = $_POST['admitted'];
      if($admitted == 'Yes')
      {
        $duration = $_POST['duration'];
      }else{
        $duration = "N/A";
      }
      $ratetreatmentspecial = $_POST['ratetreatmentspecial'];
      $rateoverallspecial = $_POST['rateoverallspecial'];
      $feedbackspecial = $_POST['feedbackspecial'];

      $sql2 = "INSERT INTO Hospital_feedback_studentsSpecialist(Occupation, Name, Ldap, Rollno, waitingtime, clash, admitted, duration, ratetreatment, rateoverall, feedback)
        VALUES(:occupation,:name,:ldap,:rollno,:waitingtimeSpecialist,:clash,:admitted,:duration,:ratetreatmentspecial,:rateoverallspecial,:feedbackspecial)";

      $sql =  $con->prepare($sql2);
            $sql->bindParam(':occupation', $occupation, PDO::PARAM_STR, 1000);
            $sql->bindParam(':name', $name, PDO::PARAM_STR, 1000);
            $sql->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
            $sql->bindParam(':rollno', $rollno, PDO::PARAM_STR, 1000);
            $sql->bindParam(':waitingtimeSpecialist', $waitingtimeSpecialist, PDO::PARAM_STR, 1000);
            $sql->bindParam(':clash', $clash, PDO::PARAM_STR, 100);
            $sql->bindParam(':admitted', $admitted, PDO::PARAM_STR, 100);
            $sql->bindParam(':duration', $duration, PDO::PARAM_STR, 1000);
            $sql->bindParam(':ratetreatmentspecial', $ratetreatmentspecial, PDO::PARAM_STR, 50);
            $sql->bindParam(':rateoverallspecial', $rateoverallspecial, PDO::PARAM_STR, 50);
            $sql->bindParam(':feedbackspecial', $feedbackspecial, PDO::PARAM_STR, 5000);

    }
    elseif (isset($_POST['submitAdmittedPatient']))
    { 
      $admittedTime = $_POST['admittedTime'];
      $admitreason = $_POST['admitreason'];
      $foodEnough = $_POST['foodEnough'];
      $ratequalityfood = $_POST['ratequalityfood'];
      $ratehygiene = $_POST['ratehygiene'];
      $ratemedicalofficer = $_POST['ratemedicalofficer'];
      $rateoveralladmit = $_POST['rateoveralladmit'];
      $feedbackadmit = $_POST['feedbackadmit'];

      // echo $admittedTime;
      // echo $admitreason;
      // echo $foodEnough;
      // echo $ratequalityfood;
      // echo $ratehygiene;
      // echo $ratemedicalofficer;
      // echo $rateoveralladmit;
      // echo $feedbackadmit;
      

      // $sql2 = "INSERT INTO Hospital_feedback_studentsAdmitted(Occupation, Name, Ldap, Rollno, admittedTime, admitreason,foodEnough, ratequalityfood, ratehygiene, ratemedicalofficer, rateoveralladmit, feedbackadmit) VALUES(:occupation,:name,:ldap,:rollno,:admittedTime,:admitreason,:foodEnough,:ratefoodquality,:ratehygiene,:ratemedicalofficer,:rateoveralladmit,:feedbackadmit)";


        $sql2 = "INSERT INTO Hospital_feedback_studentsAdmitted(Occupation, Name, Ldap, Rollno,admittedTime,foodEnough, admitreason,ratequalityfood,ratehygiene,ratemedicalofficer,rateoveralladmit,feedbackadmit) VALUES(:occupation,:name,:ldap,:rollno,:admittedTime,:foodEnough,:admitreason,:ratequalityfood,:ratehygiene,:ratemedicalofficer,:rateoveralladmit,:feedbackadmit)";


        $sql =  $con->prepare($sql2);
            $sql->bindParam(':occupation', $occupation, PDO::PARAM_STR, 1000);
            $sql->bindParam(':name', $name, PDO::PARAM_STR, 1000);
            $sql->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
            $sql->bindParam(':rollno', $rollno, PDO::PARAM_STR, 1000);
            $sql->bindParam(':admittedTime',$admittedTime,PDO::PARAM_STR,1000);
            $sql->bindParam(':admitreason',$admitreason,PDO::PARAM_STR,1000);
            $sql->bindParam(':foodEnough',$foodEnough,PDO::PARAM_STR,1000);
            $sql->bindParam(':ratequalityfood',$ratequalityfood,PDO::PARAM_STR,100);
            $sql->bindParam(':ratehygiene',$ratehygiene,PDO::PARAM_STR,100);
            $sql->bindParam(':ratemedicalofficer',$ratemedicalofficer,PDO::PARAM_STR,100);
            $sql->bindParam(':rateoveralladmit',$rateoveralladmit,PDO::PARAM_STR,100);
            $sql->bindParam(':feedbackadmit',$feedbackadmit,PDO::PARAM_STR,1000);

            
            // echo "here";

            // echo '<script>alert("Reached at right submit Your response has been recorded!! Click Ok to Submit and Logout\n")</script>';

    }
    elseif (isset($_POST['submitOther']))
    {
      # code...
      $feedbackother = $_POST['feedbackother'];

      $sql3 = "INSERT INTO Hospital_feedback_studentsOther(Occupation, Name, Ldap, Rollno, Feedback)
        VALUES(:occupation,:name,:ldap,:rollno,:feedbackother)";

        $sql =  $con->prepare($sql3);
        
        $sql->bindParam(':occupation', $occupation, PDO::PARAM_STR, 1000);
        $sql->bindParam(':name', $name, PDO::PARAM_STR, 1000);
        $sql->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
        $sql->bindParam(':rollno', $rollno, PDO::PARAM_STR, 1000);
        $sql->bindParam(':feedbackother', $feedbackother, PDO::PARAM_STR, 5000);
        
    }



    if (!$sql->execute()) {
      echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
    }

    if($_SESSION['occupation']=='student')
    echo '<script>alert("Your response has been recorded!! Click Ok to Submit");window.location = "student.php"</script>';

	}
	catch (PDOException $e){
	    echo "Error: " . $e->getMessage();
		}

}
 ?>

<!DOCTYPE html>

<html>
<head>
  <title>feedback Submitted</title>
</head>
<body>

</body>
</html>
