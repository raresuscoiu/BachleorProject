<?php 

include ('dbcon.php');
$idgrupa = $_GET['idgrupa'];

if($idgrupa){
    if (!mysqli_query($con,"DELETE FROM grupe WHERE id = $idgrupa")) {
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