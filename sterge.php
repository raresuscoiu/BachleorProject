<?php 

include ('dbcon.php');
$examenId = $_GET['examenId'];

if($examenId){
    if (!mysqli_query($con,"DELETE FROM examene WHERE id = $examenId")) {
        echo json_encode(['status' => 400]);
        die;
    }
    echo json_encode(['status' => 200]);
    die;
} else {
    echo json_encode(['status' => 400]);
    die;
}

?>