<?php
  session_start();
  require 'logginsession.php';
  //echo $_SESSION['check'];
  if (!isset($_SESSION['check'])){
      header('location: index.php');
    exit;
  }else if (isLoginSessionExpired()){
    header("Location:logout.php?session_expired=1");
  }

  // $_SESSION['name']="Agent 47";
  // $_SESSION['rollno'] = "I041421";
  // $_SESSION['occupation'] = "Agent47";
  // //echo $_SESSION['ldap_id'];
?>


<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Hospital Feedback System</title>
  <!--Import Google Icon Font-->
  <!--      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
  <!--Import local material icon css -->
  <link rel="stylesheet" href="css/materialicon.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!-- Import font-awesome.css -->
  <!-- <link type="text/css" rel="stylesheet" href="css/all.css"> -->
  <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">

  <link rel="shortcut icon" href="images/favicon.png">

  <!-- Import manual css file -->
  <link type="text/css" rel="stylesheet" href="style.css">
  <style>
  
  .container-fluid{
    height :20vh;
  }
  
  #form{
    min-height:62%;
  }

  .footer{
    height:14vh;
  }
  
  
  </style>
  <script defer src="/js/fontawesome-all.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row light-blue darken-2 valign-wrapper">
      <div class="col s8 m10 l10 xl10 center-align">
        <h3>Hospital FeedBack System</h3>
      </div>
      <div class="col s4 m2 l2 xl2 center-align">
        <a class="btn waves-effect waves-light" href="logout.php">Logout</a>
      </div>
      <?php 
        if($_SESSION['admin']){
          echo '<div class="col s4 m2 l2 xl2 center-align">
          <a class="btn waves-effect waves-light" href="showresponses.php">View Responses</a>
        </div>';
        }
      ?>
    </div>
  </div>
  <div id="form" class="container">
    <div class="row">
      <div class="col s6 m6 l6 xl6">
        <?php
        $_SESSION['occupation'] = "student";
        $_SESSION['loggedin_time'] = time();
        echo "Welcome <h5> <b>". $_SESSION['name']."</b></h5>"; ?>
      </div>
      <div class="col s6 m6 l6 xl6">
        <?php 
        echo "Roll No: <h5> <b>". $_SESSION['rollno']."</b> </h5>"; 
        ?>
      </div>
    </div>
    <div class="row">
      <h5>Kindly fill the feedback form for the following options:</h5>
    </div>


    <div class="row">
      <ul class="collapsible expandable ">


        <!-- Accordian for OPD Treatment -->

        <li>
          <div class="collapsible-header">
            <i class="material-icons">local_hospital</i>General OPD Treatment</div>
          <div class="collapsible-body">
            <form action="submit.php" method="post">

              <div class="row">
                <div class="col s12 m7">
                  <p>
                    How much time did you have to wait?
                  </p>
                </div>
                <div class="col s12 m5">
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtime" type="radio" value="less than 10 minutes" />
                      <span> &lt; 10 minutes </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtime" type="radio" value="10 - 30 minutes" />
                      <span> 10 - 30 minutes </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtime" type="radio" value="more than 30 minutes" />
                      <span> &gt; 30 minutes </span>
                    </label>
                  </p>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate the treatment offered by Medical Officer (OPD) at the hospital</p>
                  </div>
                </div>
                <div class="row">



                  <div class="legends">
                    <div class="col s4">1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12">
                      <input class="star star-5" id="ratetreatmentopd-5" type="radio" name="ratetreatmentopd" value="5" required/>
                      <label class="star star-5" for="ratetreatmentopd-5"></label>
                      <input class="star star-4" id="ratetreatmentopd-4" type="radio" name="ratetreatmentopd" value="4" />
                      <label class="star star-4" for="ratetreatmentopd-4"></label>
                      <input class="star star-3" id="ratetreatmentopd-3" type="radio" name="ratetreatmentopd" value="3" />
                      <label class="star star-3" for="ratetreatmentopd-3"></label>
                      <input class="star star-2" id="ratetreatmentopd-2" type="radio" name="ratetreatmentopd" value="2" />
                      <label class="star star-2" for="ratetreatmentopd-2"></label>
                      <input class="star star-1" id="ratetreatmentopd-1" type="radio" name="ratetreatmentopd" value="1" />
                      <label class="star star-1" for="ratetreatmentopd-1"></label>
                    </div>
                  </div>

                </div>
              </div>
              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m7">
                    <p> Have you been recommended to specialist ? </p>
                  </div>
                  <div class="col s12 m5">
                    <p>
                      <label>
                        <input class="with-gap" name="specialistrecommended" type="radio" value="Yes" checked />
                        <span> Yes </span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input class="with-gap" name="specialistrecommended" type="radio" value="No" />
                        <span> No </span>
                      </label>
                    </p>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate Overall Experience </p>
                  </div>
                </div>
                <div class="row">

                  <div class="legends">
                    <div class="col s4"> 1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="rateoverallopd-5" type="radio" name="rateoverallopd" value="5" required/>
                      <label class="star star-5" for="rateoverallopd-5"></label>
                      <input class="star star-4" id="rateoverallopd-4" type="radio" name="rateoverallopd" value="4" />
                      <label class="star star-4" for="rateoverallopd-4"></label>
                      <input class="star star-3" id="rateoverallopd-3" type="radio" name="rateoverallopd" value="3" />
                      <label class="star star-3" for="rateoverallopd-3"></label>
                      <input class="star star-2" id="rateoverallopd-2" type="radio" name="rateoverallopd" value="2" />
                      <label class="star star-2" for="rateoverallopd-2"></label>
                      <input class="star star-1" id="rateoverallopd-1" type="radio" name="rateoverallopd" value="1" />
                      <label class="star star-1" for="rateoverallopd-1"></label>
                    </div>
                  </div>


                </div>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5> Suggestions and Feedback</h5>
                <p> If you faced any issues during the treatment, mention them here </p>
                <input placeholder="Problems and Issues, you faced or any related Suggestion" name="feedbackopd" id="feedbackopd" type="text"
                  class="validate">
                <label for="feedbackopd">Your FeedBack</label>
              </div>

              <!-- <input type="hidden" name="submitOPD" value="OPD"> -->
              <button class="btn waves-effect waves-light" type="submit" name="submitOPD">Submit
                <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </li>


        <!-- Accordian for Appointment with Specialist -->

        <li>
          <div class="collapsible-header">
            <i class="material-icons">add_box</i>Appointment with Specialist Doctor</div>
          <div class="collapsible-body">
            <form action="submit.php" method="post">

              <div class="row ">
                <div class="col s12 m7">
                  <p>How much you waited to meet the specialist ?</p>
                </div>
                <div class="col s12 m5">
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtimeSpecialist" type="radio" value="less than 3 days" checked />
                      <span> &lt; 3 days </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtimeSpecialist" type="radio" value="1 week" />
                      <span> 1 week </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtimeSpecialist" type="radio" value="1 - 2 week" />
                      <span> 1 - 2 weeks </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="waitingtimeSpecialist" type="radio" value="more than 2 weeks" />
                      <span> &gt; 2 weeks </span>
                    </label>
                  </p>
                </div>
              </div>
              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m7">
                    <p> Was there any clash between your Academic Calender and Appointment ? </p>
                  </div>
                  <div class="col s12 m5">
                    <p>
                      <label>
                        <input class="with-gap" name="clash" type="radio" value="Yes" checked />
                        <span> Yes </span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input class="with-gap" name="clash" type="radio" value="No" />
                        <span> No </span>
                      </label>
                    </p>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m7">
                    <p> If you were admitted to Hospital ? For what duration ?</p>
                  </div>
                  <div class="col s12 m5">
                    <label>
                      <input class="with-gap" id="admitted" name="admitted" type="radio" value="No" checked/>
                      <span> No </span>
                    </label>
                    </p>
                    <p>
                      <label>
                        <input class="with-gap" id="admitted" name="admitted" type="radio" value="Yes" />
                        <span> Yes </span>
                      </label>
                    </p>
                    <input placeholder="Enter Number of Days" id="duration" name="duration" type="text" class="validate" disabled="true">
                    <label for="duration">Duration</label>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate Treatment by Specialist: </p>
                  </div>
                </div>
                <div class="row">

                  <div class="legends">
                    <div class="col s4"> 1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="ratetreatmentspecial-5" type="radio" name="ratetreatmentspecial" value="5" required/>
                      <label class="star star-5" for="ratetreatmentspecial-5"></label>
                      <input class="star star-4" id="ratetreatmentspecial-4" type="radio" name="ratetreatmentspecial" value="4" />
                      <label class="star star-4" for="ratetreatmentspecial-4"></label>
                      <input class="star star-3" id="ratetreatmentspecial-3" type="radio" name="ratetreatmentspecial" value="3" />
                      <label class="star star-3" for="ratetreatmentspecial-3"></label>
                      <input class="star star-2" id="ratetreatmentspecial-2" type="radio" name="ratetreatmentspecial" value="2" />
                      <label class="star star-2" for="ratetreatmentspecial-2"></label>
                      <input class="star star-1" id="ratetreatmentspecial-1" type="radio" name="ratetreatmentspecial" value="1" />
                      <label class="star star-1" for="ratetreatmentspecial-1"></label>
                    </div>
                  </div>


                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate Overall Experience </p>
                  </div>
                </div>
                <div class="row">
                  <div class="legends">
                    <div class="col s4"> 1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="rateoverallspecial-5" type="radio" name="rateoverallspecial" value="5" required/>
                      <label class="star star-5 " for="rateoverallspecial-5"></label>
                      <input class="star star-4" id="rateoverallspecial-4" type="radio" name="rateoverallspecial" value="4" />
                      <label class="star star-4 " for="rateoverallspecial-4"></label>
                      <input class="star star-3" id="rateoverallspecial-3" type="radio" name="rateoverallspecial" value="3" />
                      <label class="star star-3 " for="rateoverallspecial-3"></label>
                      <input class="star star-2" id="rateoverallspecial-2" type="radio" name="rateoverallspecial" value="2" />
                      <label class="star star-2 " for="rateoverallspecial-2"></label>
                      <input class="star star-1" id="rateoverallspecial-1" type="radio" name="rateoverallspecial" value="1" />
                      <label class="star star-1 " for="rateoverallspecial-1"></label>
                    </div>
                  </div>


                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <h5> Suggestions and Feedback</h5>
                <p> If you faced any issues during the treatment, mention them here </p>
                <input placeholder="Problems and Issues, you faced or any related Suggestion" id="feedbackspecial" name="feedbackspecial"
                  type="text" class="validate">
                <label for="feedbackspecial">Your FeedBack</label>
              </div>

              <!-- <input type="hidden" name="submitSpecialist" value="Specialist"> -->
              <button class="btn waves-effect waves-light" type="submit" name="submitSpecialist">Submit
                <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </li>

        <!-- Accordian for In Patient Treatment -->

        <li>
          <div class="collapsible-header">
            <i class="material-icons">add_box</i>Admitted Patient Treatment</div>
          <div class="collapsible-body">
            <form action="submit.php" method="post">

              <div class="row">
                <div class="col s12 m7 ">
                  <p>How many days you were admitted in Hospital ?</p>
                </div>

                <div class="col s12 m5">
                  <p>
                    <label>
                      <input class="with-gap" name="admittedTime" type="radio" value="less than 3 days" checked />
                      <span> &lt; 3 days </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="admittedTime" type="radio" value="1 week" />
                      <span> 1 week </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="admittedTime" type="radio" value="1 - 2 week" />
                      <span> 1 - 2 weeks </span>
                    </label>
                  </p>
                  <p>
                    <label>
                      <input class="with-gap" name="admittedTime" type="radio" value="more than 2 weeks" />
                      <span> &gt; 2 weeks </span>
                    </label>
                  </p>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <p> Why were you admitted to Hospital </p>
                <input placeholder="Reason" id="admitreason" name="admitreason" type="text" class="validate">
                <label for="admitreason">Reason</label>
              </div>


              <div class="divider"></div>
              <div class="section">
                <div class="row ">
                  <div class="col s12 m7">
                    <p> Was the food provided enough ? </p>
                  </div>
                  <div class="col s12 m5 right">
                    <p>
                      <label>
                        <input class="with-gap" name="foodEnough" type="radio" value="Yes" checked />
                        <span> Yes </span>
                      </label>
                    </p>
                    <p>
                      <label>
                        <input class="with-gap" name="foodEnough" type="radio" value="No" />
                        <span> No </span>
                      </label>
                    </p>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate the quality of food provided during your stay </p>
                  </div>
                </div>
                <div class="row">
                  <div class="legends">
                    <div class="col s4 "> 1 star : Poor </div>
                    <div class="col s4 "> 3 star : Average </div>
                    <div class="col s4 "> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="ratequalityfood-5" type="radio" name="ratequalityfood" value="5" required/>
                      <label class="star star-5 " for="ratequalityfood-5"></label>
                      <input class="star star-4" id="ratequalityfood-4" type="radio" name="ratequalityfood" value="4" />
                      <label class="star star-4 " for="ratequalityfood-4"></label>
                      <input class="star star-3" id="ratequalityfood-3" type="radio" name="ratequalityfood" value="3" />
                      <label class="star star-3 " for="ratequalityfood-3"></label>
                      <input class="star star-2" id="ratequalityfood-2" type="radio" name="ratequalityfood" value="2" />
                      <label class="star star-2 " for="ratequalityfood-2"></label>
                      <input class="star star-1" id="ratequalityfood-1" type="radio" name="ratequalityfood" value="1" />
                      <label class="star star-1 " for="ratequalityfood-1"></label>
                    </div>
                  </div>




                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate the general hygiene in hospital: </p>
                  </div>
                </div>
                <div class="row">
                  <div class="legends">
                    <div class="col s4"> 1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="ratehygiene-5" type="radio" name="ratehygiene" value="5" required/>
                      <label class="star star-5" for="ratehygiene-5"></label>
                      <input class="star star-4" id="ratehygiene-4" type="radio" name="ratehygiene" value="4" />
                      <label class="star star-4" for="ratehygiene-4"></label>
                      <input class="star star-3" id="ratehygiene-3" type="radio" name="ratehygiene" value="3" />
                      <label class="star star-3" for="ratehygiene-3"></label>
                      <input class="star star-2" id="ratehygiene-2" type="radio" name="ratehygiene" value="2" />
                      <label class="star star-2" for="ratehygiene-2"></label>
                      <input class="star star-1" id="ratehygiene-1" type="radio" name="ratehygiene" value="1" />
                      <label class="star star-1" for="ratehygiene-1"></label>
                    </div>
                  </div>


                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12 ">
                    <p> Rate the treatment by Medical Officer: </p>
                  </div>
                </div>
                <div class="row">
                  <div class="legends">
                    <div class="col s4"> 1 star : Poor </div>
                    <div class="col s4"> 3 star : Average </div>
                    <div class="col s4"> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="ratemedicalofficer-5" type="radio" name="ratemedicalofficer" value="5" required/>
                      <label class="star star-5 " for="ratemedicalofficer-5"></label>
                      <input class="star star-4" id="ratemedicalofficer-4" type="radio" name="ratemedicalofficer" value="4" />
                      <label class="star star-4 " for="ratemedicalofficer-4"></label>
                      <input class="star star-3" id="ratemedicalofficer-3" type="radio" name="ratemedicalofficer" value="3" />
                      <label class="star star-3 " for="ratemedicalofficer-3"></label>
                      <input class="star star-2" id="ratemedicalofficer-2" type="radio" name="ratemedicalofficer" value="2" />
                      <label class="star star-2 " for="ratemedicalofficer-2"></label>
                      <input class="star star-1" id="ratemedicalofficer-1" type="radio" name="ratemedicalofficer" value="1" />
                      <label class="star star-1 " for="ratemedicalofficer-1"></label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <div class="row left-align">
                  <div class="col s12 m12 l12 xl12">
                    <p> Rate Overall Experience </p>
                  </div>
                </div>
                <div class="row">
                  <div class="legends">
                    <div class="col s4 "> 1 star : Poor </div>
                    <div class="col s4 "> 3 star : Average </div>
                    <div class="col s4 "> 5 star : Excellent</div>
                  </div>
                  <div class="stars">
                    <div class="col s12 star">
                      <input class="star star-5" id="rateoveralladmit-5" type="radio" name="rateoveralladmit" value="5" required/>
                      <label class="star star-5 " for="rateoveralladmit-5"></label>
                      <input class="star star-4" id="rateoveralladmit-4" type="radio" name="rateoveralladmit" value="4" />
                      <label class="star star-4 " for="rateoveralladmit-4"></label>
                      <input class="star star-3" id="rateoveralladmit-3" type="radio" name="rateoveralladmit" value="3" />
                      <label class="star star-3 " for="rateoveralladmit-3"></label>
                      <input class="star star-2" id="rateoveralladmit-2" type="radio" name="rateoveralladmit" value="2" />
                      <label class="star star-2 " for="rateoveralladmit-2"></label>
                      <input class="star star-1" id="rateoveralladmit-1" type="radio" name="rateoveralladmit" value="1" />
                      <label class="star star-1 " for="rateoveralladmit-1"></label>
                    </div>
                  </div>





                </div>
              </div>

              <div class="divider"></div>
              <div class="section">
                <p> What all can be done to better the facilities in hospital:</p>
                <input placeholder="Problems and Issues, you faced or any related Suggestion" id="feedbackadmit" name="feedbackadmit" type="text"
                  class="validate">
                <label for="feedbackadmit">Your FeedBack</label>
              </div>

              <!-- <input type="hidden" name="submitSpecialist" value="Specialist"> -->
              <button class="btn waves-effect waves-light" type="submit" name="submitAdmittedPatient">Submit
                <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </li>



        <!-- Accordian for Other Suggestions -->

        <li>
          <div class="collapsible-header">
            <i class="material-icons">chat_bubble_outline</i>Any Other Suggestions</div>
          <div class="collapsible-body">
            <form action="submit.php" method="post">
              <input placeholder="Give Your Suggestions here" id="feedbackother" name="feedbackother" type="text" class="validate" required>
              <label for="feedbackother">Your FeedBack</label>
              <br>
              <!-- <input type="hidden" name="submitOther" value="Other"> -->
              <button class="btn waves-effect waves-light" type="submit" name="submitOther">Submit
                <i class="material-icons right">send</i>
              </button>
            </form>
          </div>
        </li>


      </ul>





    </div>



  </div>

      <footer id="footer" class="page-footer black">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h6 class="white-text">Hostel Affairs, IIT Bombay</h6>
          </div>
         
        </div>
        <div class="footer-copyright">
          <div class="container">
            Developed by
            <a href="https://www.facebook.com/u.contact.himanshu"><i class="fab fa-facebook-f"></i></a>
            <a href="https://github.com/erh94"/><i class="fab fa-github"></i></a>
            Himanshu Upreti
          
          </div>
        </div>
    </footer>


  <!--JavaScript at end of body for optimized loading-->
  <script src="js/jquery.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/all.js"></script>

  <script>
    $(document).ready(function () {
      $("input[name=admitted]").change(function () {
        if (this.value == "Yes") {
          $("#duration").prop("required", true);
          $("#duration").prop("disabled", false);
        } else {
          $("#duration").prop("required", false);
          $("#duration").prop("disabled", true);
        }
      });
    });
  </script>
  <script>
    var elem = document.querySelector('.collapsible.expandable');
    var instance = M.Collapsible.init(elem, {
      accordion: false
    });

  </script>
</body>

</html>