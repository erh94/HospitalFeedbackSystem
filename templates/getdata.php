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


function makeCSV($filename, $tmpName)
{
    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=$filename");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($tmpName));

    ob_clean();
    flush();
    readfile($tmpName);

    unlink($tmpName);
}

function students($con)
{
    
}

function studentsAdmitted($con)
{
    $sql = "SELECT `foodEnough`, `ratequalityfood`, `ratehygiene`, `ratemedicalofficer`, `rateoveralladmit` FROM `Hospital_feedback_studentsAdmitted` WHERE 1";

    $data = getdata($con, $sql);


    $foodEnough = array_fill(0, 2,0);
    $foodrate = array_fill(0,5,0);
    $hygienerate = array_fill(0,5,0);
    $rateMO =  array_fill(0,5,0);
    $overall = array_fill(0,5,0);

    

    if (count($data) > 0) {
        foreach ($data as $row) {
            if($row['foodEnough']=='No') $foodEnough[0]++;
            else $foodEnough[1]++;

            $foodrate[$row['ratequalityfood']-1]++;
            $hygienerate[$row['ratehygiene']-1]++;
            $rateMO[$row['ratemedicalofficer']-1]++;
            $overall[$row['rateoveralladmit']-1]++;
        }
    } else {
        echo "Error";
    }



    $data=[];
    $data['foodEnough']=$foodEnough;
    $data['foodrate']=$foodrate;
    $data['hygienerate'] = $hygienerate;
    $data['rateMO'] = $rateMO;
    $data['overall'] = $overall;
        
    
    echo json_encode($data);
}


function studentsOPD($con)
{
   
}

function studentsOther($con)
{
   
}


function studentsSpecialist($con)
{
    
}

session_start();

require '../connect.php';
// Get the DB connections



// studentsSpecialist($con);

// studentsOther($con);

studentsAdmitted($con);


?>
