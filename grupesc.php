<?php 

include("dbcon.php");
$contor = 0;
$filtre = $_GET['filtre'];

$specializare = $filtre['specializare'];
$an = $filtre['an'];

$sql = "SELECT id, numeGrupa from grupe where specID='$specializare' and an='$an' ORDER BY numeGrupa ASC";
$grupe = $con->query($sql);

?>

<html>

<div class="grupeafisate">
 
        <?php 
        if($grupe->num_rows) {
           echo "<table class='table table-striped table-dark'>
            <thead>
            <tr>
            <th scope='col'>#</th>
            <th scope='col'>Grupa</th>
            <th scope='col'></th>
            <th scope='col'></th>
           
            </tr>
            </thead>
        <tbody>";
            foreach($grupe as $grupa){

                $idgrupa = $grupa['id'];
                $contor = $contor+1;
               
                   
                echo
                "<tr class='grupaRow' data-grupa='$idgrupa'>" . 
                "<td scope='row'>" . $contor ."</td>". 
                "<td>" . $grupa['numeGrupa'] ."</td>".
                "<td><button type='button' class='btn btn-danger stergeGrupa' data-toggle='modal' data-target='#exampleModal2' data-grupa='$idgrupa'> Șterge </button></td>
                 
                
               ".
                "<td><button type='button' class='btn btn-primary modificaGrupa' data-toggle='modal' data-target='#exampleModal3' data-grupa='$idgrupa'> Modifică </button></td>
                 
                <div class='modal fade' id='exampleModal3' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                <div class='modal-dialog modal-lg' role='document'  style='width:100% position: absolute;
               
                top: 30%;';>
                <div class='modal-content'>
                
                   
                   
                   
                
                <div class='modal-body'>
                   <p style='color:black;'>Modificați numele grupei</p>
                   <input type='text' class='form-control' id='modgrupa' style='text-align:center;'></input>
                   
                   <br>
                   <button type='button' class='btn btn-dark' data-dismiss='modal'>Închide</button>
                   <button type='button' class='btn btn-primary modificaGrupaSucces' data-dismiss='modal'>Modifică</button>
               </div>".
                 "</tr>";
              
                 
            }
        } 
        else {
            echo "Nu sunt grupe" ;
        }
        echo "<br><td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal4'> Adaugă Grupă </button></td>
                 
                 <div class='modal fade' id='exampleModal4' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                 <div class='modal-dialog modal-lg' role='document'  style='width:100% position: absolute;
                
                 top: 30%;';>
                 <div class='modal-content'>
                 
                    
                    
                 
                 
                 <div class='modal-body'>
                    <p style='color:black;'>Introduceți numele grupei</p>
                    <input type='text' class='form-control' id='grupamodal' style='text-align:center;'></input>
                    
                    <br>
                    <button type='button' class='btn btn-dark closemodal' data-dismiss='modal' aria-label='Close'>Închide</button>
                    <button type='button' class='btn btn-primary adaugaGrupa'>Adaugă grupă</button>
                </div>
                 ";
    echo "</tbody>
    <div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                <div class='modal-dialog modal-lg' role='document'  style='width:100% position: absolute;
               
                top: 30%;';>
                <div class='modal-content'>
                
                   
                   
                   
                
                <div class='modal-body'>
                   <p>Sunteți sigur că doriți să ștergeți grupa?</p>
                   <button type='button' class='btn btn-dark' data-dismiss='modal'>Închide</button>
                   <button type='button' class='btn btn-danger stergeSucces'  data-dismiss='modal' >Șterge grupa</button>
               </div>";


   
        ?>
    </div>

</html>

