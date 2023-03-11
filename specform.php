<?php 

include ('dbcon.php');

$materieselectata = $_GET['materieselectata'];
                    

     $sql ="SELECT Nume from materii where id='$materieselectata'";
     $result = $con->query($sql);
     foreach($result as $materie)
        $materia = $materie['Nume'];
    


    $sql = "SELECT sp.id, sp.NumeSpec from specializari as sp INNER JOIN materii as mat on sp.id = mat.specID where mat.Nume='$materia'";
    $specializari = $con->query($sql);
               
    echo "<option value= 0 ></option> ";
    foreach($specializari as $specializare){
    $specId = $specializare['id'];
    $specNume = $specializare['NumeSpec'];
    echo "<option value=$specId>$specNume</option>";
    }



    

                           

?>

