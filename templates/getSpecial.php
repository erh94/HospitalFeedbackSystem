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

    $sql = "SELECT `waitingtime`, `clash`, `admitted`, `duration`, `ratetreatment`, `rateoverall` FROM `Hospital_feedback_studentsSpecialist` WHERE 1";

    
    $data = getdata($con, $sql);


    $waitingTime = array_fill(0, 4,0);
    $clash = array_fill(0,2,0);
    $admitted = array_fill(0,2,0);
    $rate =  array_fill(0,5,0);
    $overall = array_fill(0,5,0);

    

    if (count($data) > 0) {
        foreach ($data as $row) {
            if($row['clash']=='No') $clash[0]++;
            else $clash[1]++;

            if($row['admitted']=='No') $admitted[0]++;
            else $admitted[1]++;

            if($row['waitingtime']=='more than 2 weeks') $waitingTime[3]++;
            else if ($row['waitingtime']=='1 week') $waitingTime[1]++;
            else if ($row['waitingtime']=='1 - 2 week') $waitingTime[2]++;
            else
            $waitingTime[0]++;

           $rate[$row['ratetreatment']-1]++;
           $overall[$row['rateoverall']-1]++;
        }
    } else {
        echo "Error";
    }



    $data=[];
    $data['clash']=$clash;
    $data['admitted']=$admitted;
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
