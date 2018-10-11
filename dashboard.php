<?php
  session_start();
//   require 'logginsession.php';
//   //echo $_SESSION['check'];
//   if (!isset($_SESSION['check'])){
//       header('location: index.php');
//     exit;
//   }else if (isLoginSessionExpired()){
//     header("Location:logout.php?session_expired=1");
//   }

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
        .container-fluid {
            height: 20vh;
        }

        #form {
            min-height: 62%;
        }

        .footer {
            height: 14vh;
        }

        #main {
            min-height: 60vh;
        }
    </style>
    <script defer src="/js/fontawesome-all.min.js"></script>
    <script src="/js/Chart.bundle.min.js"></script>
    <script src="./js/Chart.min.js"></script>


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
        if ($_SESSION['admin']) {
            echo '<div class="col s4 m2 l2 xl2 center-align">
          <a class="btn waves-effect waves-light" href="showresponses.php">View Responses</a>
        </div>';
        }
      ?>
        </div>
    </div>


    <div id="main">

        <div class="container">

            <div class="row">
            <h6>Feedback by Admitted Patient</h6>
            <div class="col m3">
            <canvas id="food-chart" width="20vh" height="20vh"></canvas>
            
            </div>
        
            <div class="col m3">
            <canvas id="hygiene-chart" width="20vh" height="20vh"></canvas>
            
            </div>
            
            <div class="col m3">
            <canvas id="MO-chart" width="20vh" height="20vh"></canvas>
            
            </div>

            <div class="col m3">
            <canvas id="overallAdmit-chart" width="20vh" height="20vh"></canvas>
            
            </div>
            </div>


               <div class="row">
            <h6>Feedback for OPD</h6>
            <div class="col m3">
            <canvas id="rate-chart" width="20vh" height="20vh"></canvas>
            
            </div>
        
            <div class="col m3">
            <canvas id="waiting-chart" width="20vh" height="20vh"></canvas>
            
            </div>
            
            <div class="col m3">
            <canvas id="overall-chart" width="20vh" height="20vh"></canvas>
            
            </div>

            <div class="col m3">
            <canvas id="waitingS-chart" width="20vh" height="20vh"></canvas>
            
            </div>
            </div>

               <div class="row">
            <h6>Feedback for Specialist</h6>
            <div class="col m3">
            <canvas id="clash-chart" width="20px" height="20px"></canvas>
            
            </div>
        
            <div class="col m3">
            <canvas id="admitted-chart" width="20px" height="20px"></canvas>
            
            </div>
            
            <div class="col m3">
            <canvas id="rateS-chart" width="20px" height="20px"></canvas>
            
            </div>

            <div class="col m3">
            <canvas id="overallSpecialist-chart" width="20vh" height="20vh"></canvas>
            
            </div>
            </div>


            
            <div class="row">
                
                <a onclick="CSVDownload('OPD')" id="OPD" class="waves-effect waves-light btn-small">
                    <i class="material-icons right">cloud_download</i>OPD Responses</a>
                <a onclick="CSVDownload('spc')" id="specialist" class="waves-effect waves-light btn-small">
                    <i class="material-icons right">cloud_download</i>Specialist Responses</a>
                <a onclick="CSVDownload('adm')" id="Admitted" class="waves-effect waves-light btn-small">
                    <i class="material-icons right">cloud_download</i>Admitted Responses</a>
                <a onclick="CSVDownload('sugg')" id="suggestions" class="waves-effect waves-light btn-small">
                    <i class="material-icons right">cloud_download</i>Suggestions Responses</a>
                <!-- <a  onclick="CSVDownload('all')" id="all" class="waves-effect waves-light btn-small green">
                    <i class="material-icons right">cloud_download</i>All Responses</a> -->




            </div>


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
                    <a href="https://www.facebook.com/u.contact.himanshu">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://github.com/erh94" />
                    <i class="fab fa-github"></i>
                    </a>
                    Himanshu Upreti

                </div>
            </div>
    </footer>


    <!--JavaScript at end of body for optimized loading-->
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/all.js"></script>
    <script src="./populateCharts.js"></script>

    <script>
       
        function CSVDownload(value){
            console.log(value);
            var conf = confirm("Export labs to CSV?");
            if(conf == true)
            {
                window.open("download.php?Button="+value+"",'_blank');
                // console.log("download.php?Button="+value+"")
            }
        };
        

        



    </script>
    <script>
        var elem = document.querySelector('.collapsible.expandable');
        var instance = M.Collapsible.init(elem, {
            accordion: false
        });

    </script>
</body>

</html>