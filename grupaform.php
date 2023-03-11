<?php
include ('dbcon.php');

$specializareselectata = $_GET['specializareselectata'];
$anselectat = $_GET['anselectat'];
 

$sql = "SELECT gr.numeGrupa from grupe as gr INNER JOIN specializari as sp on gr.specID = sp.id where sp.id = '$specializareselectata' and gr.an ='$anselectat' ";
$grupe = $con->query($sql);
               
    echo "<option value= null ></option> ";
    foreach($grupe as $grupa){
    $numeGrupa = $grupa['numeGrupa'];
    echo "<option value=$numeGrupa>$numeGrupa</option>";
    }



?>