<?php
  session_start();
$_SESSION['check'] = '1';
$_SESSION['rollno'] = "NA";
$_SESSION['staff'] = 'true';
  // require 'logginsession.php';
$_SESSION['loggedin_time'] = time();

  //echo $_SESSION['check'];
  if (!isset($_SESSION['check'])){
      header('location: index.php');
    exit;
  }else
 if (isLoginSessionExpired()){
    header("Location:logout.php?session_expired=1");
  }
  //echo $_SESSION['ldap_id'];
?>


<!DOCTYPE html>
  <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title> Hospital Feedback System</title>
      <!--Import Google Icon Font-->
<!--      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --> 
      <!--Import local material icon css -->
      <link rel="stylesheet" href="css/materialicon.css"> 
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!-- Import font-awesome.css -->
      <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
      <!-- Import manual css file -->
      <link type="text/css" rel="stylesheet" href="style.css">

    </head>

    <body>
      <div class="container-fluid">
        <div class="row light-blue darken-2 valign-wrapper">
          <div class="col s10 m10 l10 xl10 center-align"><h3>Hospital FeedBack System</h3></div>
          <div class="col s2 m2 l2 xl2 center-align"><a class="btn waves-effect waves-light" href="logout.php">Logout</a></div>
        </div>
      </div>
      <div class="container">
	<div class="row">
  <form id="form1" method="post">
            <div class="input-field col s4">
              <input placeholder="Enter Your Name" id="name" type="text" class="validate" name="name" required>
              <label for="name">Name</label>
            </div>
            <div class="input-field col s4">
              <input placeholder="Enter LDAP ID" id="ldapid" type="text" class="validate" name="ldapid" required>
              <label for="ldapid">LDAP ID</label>
            </div>
          <div class="input-field col s4 m4 l4 xl4">
            <select name="occupation" required="true">
              <option value="" disabled selected>Select Category</option>
              <option value="Faculty">Faculty</option>
              <option value="Staff">Staff</option>
            </select>
            <label>Occupation</label>
          </div>
          <input type="submit" name="details" hidden="true">
    </form>
        </div>
        <div class="row">
          <h5>You were in Hospital for:</h5>
        </div>
        <div class="row">
          <ul class="collapsible popout">


  <!-- Accordian for OPD Treatment -->

             <li>
               <div class="collapsible-header"><i class="material-icons">local_hospital</i>General OPD Treatment</div>
               <div class="collapsible-body">
                 <form action="submit.php" method="post">

                     <div class="row valign-wrapper left-align">
                       <div class="col s6 m6 l6 xl6">
                          <p>
                           How much time did you have to wait?
                          </p>
                        </div>
                        <div class="col s6 m6 l6 xl6">
                           <p>
                             <label>
                               <input class="with-gap" name="waitingtime" type="radio" value="less than 10 minutes" checked />
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
                   <div class="row valign-wrapper center-align">
                      <div class="col s2 m2 l2 xl2">  1 star : Poor </div><div class="col s2 m2 l2 xl2"> 3 star : Average </div><div class="col s2 m2 l2 xl2"> 5 star : Excellent</div>
                      <div class="col s6 m6 l6 xl6 star">
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
                <div class="divider"></div>
                 <div class="section">
                   <div class="row valign-wrapper left-align">
                     <div class="col s6 m6 l6 xl6">
                       <p> Have you been recommended to specialist ? </p>
                     </div>
                     <div class="col s6 m6 l6 xl6">
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
                <div class="row valign-wrapper">
                   <div class="col s2 m2 l2 xl2">  1 star : Poor </div><div class="col s2 m2 l2 xl2"> 3 star : Average </div><div class="col s2 m2 l2 xl2"> 5 star : Excellent</div>
                   <div class="col s6 m6 l6 xl6 star">
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
              <div class="divider"></div>
               <div class="section">
                <h5> Suggestions and Feedback</h5>
                <p> If you faced any issues during the treatment, mention them here </p>
                <input placeholder="Problems and Issues, you faced or any related Suggestion" name="feedbackopd" id="feedbackopd" type="text" class="validate">
                <label for="feedbackopd">Your FeedBack</label>
              </div>

              <!-- <input type="hidden" name="submitOPD" value="OPD"> -->
                <button class="btn waves-effect waves-light" type="submit" name="submitOPD" id="form2" onclick="submitForm1">Submit
                                   <i class="material-icons right">send</i>
                 </button>
                 </form>
               </div>
             </li>


   <!-- Accordian for Appointment with Specialist -->

             <li>
               <div class="collapsible-header"><i class="material-icons">add_box</i>Appointment with Specialist Doctor</div>
               <div class="collapsible-body">
                  <form action="submit.php" method="post">

                       <div class="row valign-wrapper left-align">
                         <div class="col s6 m6 l6 xl6">
                           <p>How much you waited to meet the specialist ?</p>
                         </div>
                         <div class="col s6 m6 l6 xl6">
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
                                <input class="with-gap" name="waitingtimeSpecialist" type="radio"  value="1 - 2 week" />
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
                         <div class="row valign-wrapper left-align">
                           <div class="col s6 m6 l6 xl6">
                             <p> Was there any clash between your Academic Calender and Appointment ? </p>
                           </div>
                           <div class="col s6 m6 l6 xl6">
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
                       <div class="row valign-wrapper left-align">
                         <div class="col s6 m6 l6 xl6">
                           <p> If you were admitted to Hospital ? For what duration ?</p>
                        </div>
                        <div class="col s6 m6 l6 xl6">
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
                        <input placeholder="Enter Number of Days" id="duration" name="duration" type="text" class="validate" disabled="true" >
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
                  <div class="row valign-wrapper">
                     <div class="col s2 m2 l2 xl2">  1 star : Poor </div><div class="col s2 m2 l2 xl2"> 3 star : Average </div><div class="col s2 m2 l2 xl2"> 5 star : Excellent</div>
                     <div class="col s6 m6 l6 xl6 star">
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

              <div class="divider"></div>
               <div class="section">
                 <div class="row left-align">
                   <div class="col s12 m12 l12 xl12">
                     <p> Rate Overall Experience </p>
                   </div>
                 </div>
                <div class="row valign-wrapper">
                   <div class="col s2 m2 l2 xl2">  1 star : Poor </div><div class="col s2 m2 l2 xl2"> 3 star : Average </div><div class="col s2 m2 l2 xl2"> 5 star : Excellent</div>
                   <div class="col s6 m6 l6 xl6 star">
                          <input class="star star-5" id="rateoverallspecial-5" type="radio" name="rateoverallspecial" value="5" required/>
                          <label class="star star-5" for="rateoverallspecial-5"></label>
                          <input class="star star-4" id="rateoverallspecial-4" type="radio" name="rateoverallspecial" value="4" />
                          <label class="star star-4" for="rateoverallspecial-4"></label>
                          <input class="star star-3" id="rateoverallspecial-3" type="radio" name="rateoverallspecial" value="3" />
                          <label class="star star-3" for="rateoverallspecial-3"></label>
                          <input class="star star-2" id="rateoverallspecial-2" type="radio" name="rateoverallspecial" value="2" />
                          <label class="star star-2" for="rateoverallspecial-2"></label>
                          <input class="star star-1" id="rateoverallspecial-1" type="radio" name="rateoverallspecial" value="1" />
                          <label class="star star-1" for="rateoverallspecial-1"></label>
                  </div>
                </div>
              </div>

              <div class="divider"></div>
               <div class="section">
                  <h5> Suggestions and Feedback</h5>
                  <p> If you faced any issues during the treatment, mention them here </p>
                  <input placeholder="Problems and Issues, you faced or any related Suggestion" id="feedbackspecial" name="feedbackspecial" type="text" class="validate">
                  <label for="feedbackspecial">Your FeedBack</label>
                </div>

                  <!-- <input type="hidden" name="submitSpecialist" value="Specialist"> -->
                  <button class="btn waves-effect waves-light" type="submit" name="submitSpecialist" id="form3" onclick="submitForm2">Submit
                                     <i class="material-icons right">send</i>
                   </button>
                  </form>
               </div>
             </li>


<!-- Accordian for Other Suggestions -->

             <li>
               <div class="collapsible-header"><i class="material-icons">chat_bubble_outline</i>Any Other Suggestions</div>
               <div class="collapsible-body">
                 <form action="submit.php" method="post">
                   <input placeholder="Give Your Suggestions here" id="feedbackother" name="feedbackother" type="text" class="validate" required>
                   <label for="feedbackother">Your FeedBack</label>
                   <br>
                   <!-- <input type="hidden" name="submitOther" value="Other"> -->
                   <button class="btn waves-effect waves-light" type="submit" name="submitOther" id="form4" onclick="submitForm3">Submit
                                      <i class="material-icons right">send</i>
                    </button>
                 </form>
               </div>
             </li>


        </ul>
        </div>
      </div>

      <!--JavaScript at end of body for optimized loading-->
<script src="js/jquery.min.js">

</script>
<script type="text/javascript">

submitForm1 = function(){
    document.getElementById("form1").submit();
    document.getElementById("form2").submit();
}

submitForm2 = function(){
    document.getElementById("form1").submit();
    document.getElementById("form3").submit();
}

submitForm3 = function(){
    document.getElementById("form1").submit();
    document.getElementById("form4").submit();
}

</script>
<script>
  $(document).ready(function(){
        $("button[name=submitSpecialist]").click(function(){
          if(($.trim($('#name').val()) == '') || ($.trim($('#ldapid').val()) == '') || ($.trim($("select[name=occupation]").val()) == '')){
            alert('Please Fill your details first!!!');
	}
		$("#form1").submit();
           $("input[name=details]").trigger("click");
        });
        $("button[name=submitOPD]").click(function(){
          if(($.trim($('#name').val()) == '') || ($.trim($('#ldapid').val()) == '') || ($.trim($("select[name=occupation]").val()) == '')){
            alert('Please Fill your details first!!!');
          }
		$("#form1").submit();
	  $("input[name=details]").trigger("click");
        });
        $("button[name=submitOther]").click(function(){
          if(($.trim($('#name').val()) == '') || ($.trim($('#ldapid').val()) == '') || ($.trim($("select[name=occupation]").val()) == '')){
            alert('Please Fill your details first!!!');
		}
		$("#form1").submit();
            $("input[name=details]").trigger("click");
        });
      });
      </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>      

      <script>
      $(document).ready(function() {
          $("input[name=admitted]").change(function(){
              if (this.value == "Yes")
              {
                $("#duration").prop("required",true);
                $("#duration").prop("disabled",false);
              }else {
                $("#duration").prop("required",false);
                $("#duration").prop("disabled",true);
              }
          });
        });
      </script>
	<script type="text/javascript">
              document.addEventListener('DOMContentLoaded', function() {
 		var elems = document.querySelectorAll('.collapsible');
		var instances = M.Collapsible.init(elems);
  	});
      </script>
      <script>
              document.addEventListener('DOMContentLoaded', function() {
 		 var elems = document.querySelectorAll('select');
		var instances = M.FormSelect.init(elems);
  });

      </script>
</body>
</html>
