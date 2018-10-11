<?php

function getdata($con, $sql)
{
    $query =  $con->prepare($sql);
    // PDO connection

    $data = array();
    
    if ($query->execute()) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // echo $row['foodEnough'];
        
            $data[]=$row;
        }
    } else {
        echo 'Could not fetch results.';
    }


    return $data;
}

function studentsAdmitted($con)
{


    $sql = "SELECT `waitingtime`, `ratetreatment`,`rateoverall` FROM `Hospital_feedback_studentsOPD` WHERE 1";

    $data = getdata($con, $sql);


    $waitingTime = array_fill(0, 3,0);
    $rate =  array_fill(0,5,0);
    $overall = array_fill(0,5,0);

    

    if (count($data) > 0) {
        foreach ($data as $row) {

            if($row['waitingtime']=='less than 10 minutes') $waitingTime[0]++;
            else if ($row['waitingtime']=='more than 30 minutes') $waitingTime[2]++;
            else
            $waitingTime[1]++;

           $rate[$row['ratetreatment']-1]++;
           $overall[$row['rateoverall']-1]++;
        }
    } else {
        echo "Error";
    }



    $data=[];
    $data['rate'] = $rate;
    $data['waitingTime'] = $waitingTime;
    $data['overall'] = $overall;
        
    
    echo json_encode($data);
}

session_start();

require '../connect.php';
// Get the DB connections



// studentsSpecialist($con);

// studentsOther($con);

studentsAdmitted($con);


?>
