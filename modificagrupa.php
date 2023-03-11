<?php 

include ('dbcon.php');
$idgrupa = $_GET['idgrupa'];
$numegrupa =$_GET['numegrupa'];
if($idgrupa){
    if (!mysqli_query($con,"UPDATE grupe SET numeGrupa='$numegrupa' WHERE id = '$idgrupa'")) {
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