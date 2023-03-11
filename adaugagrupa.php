<?php

include("dbcon.php");

$valgrupa = $_POST['valgrupa'];

$specializare = $valgrupa['specializare'];
$an = $valgrupa['an'];
$grupa =$valgrupa['grupa'];

if (!mysqli_query($con,"INSERT INTO grupe (numeGrupa, specID, an)
 VALUES ('$grupa', '$specializare', '$an')")) {
    echo json_encode(['status' => 400]);
    die;
  }

echo json_encode((object)['status' => 200]);
die;

?>