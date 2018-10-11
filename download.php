<?php

function getdata($con, $sql)
{
    $query =  $con->prepare($sql);
    // PDO connection

    $data = array();
    
    if ($query->execute()) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // echo $row['Time'];
        
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

    return $tmpName;
}

function students($con)
{
    $sql = "SELECT `Time`,`Rollno`, `waitingtime`, `clash`, `admitted`, `duration`, `ratetreatment`, `rateoverall`, `feedback` FROM `Hospital_feedback_studentsSpecialist` WHERE 1";

    $data = getdata($con, $sql);
    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');

    $fields = array('Time','Rollno', 'Waitingtime', 'Clash', 'Admitted(Yes/No)', 'Duration', 'Rate of treatment', 'Overall Ratings', 'Feedback');

    fputcsv($file, $fields);

    if (count($data) > 0) {
        foreach ($data as $row) {
            // echo $row['Time'];
            fputcsv($file, $row);
        }
    } else {
        echo "Error";
    }
    fclose($file);
    $filename = "SpecialistFeedback".date("Y-m-d").".csv";

    makeCSV($filename, $tmpName);
}

function studentsAdmitted($con)
{
    $sql = "SELECT `Time`,`Rollno`, `admittedTime`, `foodEnough`, `admitreason`, `ratequalityfood`, `ratehygiene`, `ratemedicalofficer`, `rateoveralladmit`, `feedbackadmit` FROM `Hospital_feedback_studentsAdmitted` WHERE 1";

    $data = getdata($con, $sql);
    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');

    $fields = array('Time','Rollno', 'Admitted for Number of Days', 'Enough Food(Yes/No)', 'Reason of Admit','Rate Food Quality', 'Hygiene Rate', 'Rating MO', 'Overall Rating', 'Feedback');

    fputcsv($file, $fields);

    if (count($data) > 0) {
        foreach ($data as $row) {
            // echo $row['Time'];
            fputcsv($file, $row);
        }
    } else {
        echo "Error";
    }
    fclose($file);
    $filename = "AdmittedFeedback".date("Y-m-d").".csv";

    makeCSV($filename, $tmpName);
}


function studentsOPD($con)
{
    $sql = "SELECT `Time`,`Rollno`, `waitingtime`, `ratetreatment`, `specialistrecommended`, `rateoverall`, `feedback` FROM `Hospital_feedback_studentsOPD` WHERE 1";

    $data = getdata($con, $sql);
    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');

    $fields = array('Time','Rollno', 'Waitingtime', 'Rating of Treatment', 'Specialist(Yes/No)', 'Overall Rating', 'Any Suggestion');

    fputcsv($file, $fields);

    if (count($data) > 0) {
        foreach ($data as $row) {
            // echo $row['Time'];
            fputcsv($file, $row);
        }
    } else {
        echo "Error";
    }
    fclose($file);
    $filename = "OPDFeedback".date("Y-m-d").".csv";

    makeCSV($filename, $tmpName);
}

function studentsOther($con)
{
    $sql = "SELECT `Name`, `Rollno`, `Feedback` FROM `Hospital_feedback_studentsOther` WHERE 1";

    $data = getdata($con, $sql);
    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');

    $fields = array('Name','Rollno', 'Suggestions');

    fputcsv($file, $fields);

    if (count($data) > 0) {
        foreach ($data as $row) {
            // echo $row['Time'];
            fputcsv($file, $row);
        }
    } else {
        echo "Error";
    }
    fclose($file);
    $filename = "Suggestions".date("Y-m-d").".csv";

    makeCSV($filename, $tmpName);
}


function studentsSpecialist($con)
{
    $sql = "SELECT `Time`,`Rollno`, `waitingtime`, `clash`, `admitted`, `duration`, `ratetreatment`, `rateoverall`, `feedback` FROM `Hospital_feedback_studentsSpecialist` WHERE 1";

    $data = getdata($con, $sql);
    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');

    $fields = array('Time','Rollno', 'Waitingtime', 'Clash', 'Admitted(Yes/No)', 'Duration', 'Rate of treatment', 'Overall Ratings', 'Feedback');

    fputcsv($file, $fields);

    if (count($data) > 0) {
        foreach ($data as $row) {
            // echo $row['Time'];
            fputcsv($file, $row);
        }
    } else {
        echo "Error";
    }
    fclose($file);
    $filename = "SpecialistFeedback".date("Y-m-d").".csv";

    return makeCSV($filename, $tmpName);
}

function zipfile($con){
    // $file = studentsSpecialist($con);

// some data to be used in the csv files
$headers = array('id', 'name', 'age', 'species');
$records = array(
    array('1', 'gise', '4', 'cat'),
    array('2', 'hek2mgl', '36', 'human')
);

// create your zip file
$zipname = 'file.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);

// loop to create 3 csv files
for ($i = 0; $i < 3; $i++) {

    // create a temporary file
    $fd = fopen('php://temp/maxmemory:1048576', 'w');
    if (false === $fd) {
        die('Failed to create temporary file');
    }

    // write the data to csv
    fputcsv($fd, $headers);
    foreach($records as $record) {
        fputcsv($fd, $record);
    }

    // return to the start of the stream
    rewind($fd);

    // add the in-memory file to the archive, giving a name
    $zip->addFromString('file-'.$i.'.csv', stream_get_contents($fd) );
    //close the file
    fclose($fd);


}
// close the archive
$zip->close();

header('Content-Description: File Transfer');
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

// remove the zip archive
// you could also use the temp file method above for this.
unlink($zipname);
}

session_start();

require './connect.php';
// Get the DB connections



// studentsSpecialist($con);

// studentsOther($con);

// studentsOPD($con);

// zipfile($con);

if (isset($_GET['Button'])) {

    if($_GET['Button']=='OPD') studentsOPD($con);

    if($_GET['Button']=='spc') studentsSpecialist($con);

    if($_GET['Button']=='adm') studentsAdmitted($con);

    if($_GET['Button']=='sugg') studentsOther($con);

    // if($_GET['Button']=='all') zipfile($con);

}


?>
