<?php
include ('dbcon.php');

$materieselectata = $_GET['materieselectata'];

$sql = "SELECT sp.id, sp.NumeSpec from specializari";
    $specializari = $con->query($sql);
               
     echo "<option value= null ></option> ";
     foreach($specializari as $specializare){
     $specId = $specializare['id'];
     $specNume = $specializare['NumeSpec'];
    echo "<option value=$specId>$specNume</option>";
     }
 ?>