<?php 
include ('dbcon.php');
$valori = $_POST['valexamen'];
$materieform = $valori['materieform'];
$specializareform = $valori['specializareform'];
$anform = $valori['anform'];
$grupaform = $valori['grupaform'];
$dataform = $valori['dataform'];
$oraStart = $valori['oraStart'] . ":" . $valori['minuteStart'];
$oraFinal = $valori['oraFinal'] . ":" . $valori['minuteFinal'];
$minutefinal = $valori['minuteFinal'];
$salaform = $valori['salaform'];
$numecurent = $_SESSION['name'];
$sql = "SELECT pr.id, pr.userID FROM profesori as pr INNER JOIN users as us ON pr.userID = us.id where us.nume = '$numecurent'";
$ids = $con->query($sql);
$exameneSql = "SELECT id, oraIncepere, oraFinal FROM examene WHERE sala = '$salaform' and data ='$dataform'";
$examene = $con->query($exameneSql);
foreach($examene as $examen)
{
    if(($oraStart >= $examen['oraIncepere'] && $oraStart < $examen['oraFinal']) || ($oraFinal > $examen['oraIncepere'] && $oraFinal <= $examen['oraFinal'])) 
    {
        echo json_encode(['status' => 401]);
        die;
    }
}
$exameneSql2 = "SELECT materieID, grupa FROM examene WHERE materieID='$materieform'";
$examene2 = $con->query($exameneSql2);
foreach($examene2 as $examen)
{
    if(($examen['materieID'] == $materieform) && ($examen['grupa'] == $grupaform)) 
    {
        echo json_encode(['status' => 402]);
        die;
    }
}
foreach($ids as $id){
    $profid = $id['id'];
}
if (!mysqli_query($con,"INSERT INTO examene (materieID, specID, profID, an, grupa, data, oraIncepere, oraFinal, sala)
 VALUES ('$materieform', '$specializareform', '$profid', '$anform', '$grupaform', '$dataform', '$oraStart', '$oraFinal', '$salaform')")) {
    echo json_encode(['status' => 400]);
    die;
  }
echo json_encode((object)['status' => 200]);
die;
?>