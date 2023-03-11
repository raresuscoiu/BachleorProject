<?php 

$contor = 0;
include ('dbcon.php');



$filtre = $_GET['filtre'];

$data = date("Y-m-d",strtotime($filtre['data']));

if($filtre['materie']){
    $materie = $filtre['materie'];
}

$sql = "SELECT ex.id, ex.grupa, ex.an, ex.data, ex.oraIncepere, ex.oraFinal, ex.sala, spec.NumeSpec, mat.Nume, us.nume
 FROM examene as ex
 INNER JOIN specializari as spec ON ex.specID = spec.id 
 INNER JOIN materii as mat ON ex.materieID = mat.id  
 INNER JOIN profesori as pr ON ex.profID = pr.id 
 INNER JOIN users as us ON pr.userID = us.id WHERE mat.id = '$materie'";

if($filtre['specializare']){
    $specializare = $filtre['specializare'];
    $sql .= " AND spec.id = $specializare";
}
if($filtre['an']){
    $an = $filtre['an'];
    $sql .= " AND ex.an = $an";
}
if($filtre['grupa']){
    $grupa = $filtre['grupa'];
    $sql .= " AND ex.grupa = '$grupa'";
}
$sql .= " ORDER BY ex.data, ex.oraIncepere, ex.oraFinal ASC";

$examene = $con->query($sql);
$numesesiune = $_SESSION['name'];
?>
<html>
    
    <div class="exameneafisate">
    
           <?php 
           if($examene->num_rows) {
              echo "<table class='table table-striped table-dark'>
               <thead>
               <tr>
               <th scope='col'>#</th>
               <th scope='col'>Materie</th>
               <th scope='col'>Specializare</th>
               <th scope='col'>Anul</th>
               <th scope='col'>Grupa</th>
               <th scope='col'>Data</th>
               <th scope='col'>Ora start</th>
               <th scope='col'>Ora final</th>
               <th scope='col'>Sala</th>
               <th scope='col'>Prof. Coordonator</th>
               
               </tr>
               </thead>
           <tbody>";
               foreach($examene as $examen){
                   $examenId=$examen['id'];
                   $contor = $contor+1;
                   if($numesesiune == $examen['nume']){
                      
                   echo
                   "<tr class='examenRow' data-examen='$examenId'>" . "<th scope='row'>" . $contor ."</th>". 
                   "<td>" . $examen['Nume'] ."</td>".
                    "<td>" . $examen['NumeSpec'] ."</td>".
                     "<td>" . $examen['an'] . "</td>".
                     "<td>" . $examen['grupa'] ."</td>".
                     "<td>" . $examen['data'] ."</td>".
                     "<td> " . $examen['oraIncepere'] . "</td>".
                    "<td>" . $examen['oraFinal'] ."</td>".
                    "<td>" . $examen['sala']. "</td>".
                    " <td> " . $examen['nume'] . "</td>".
                    
                    "</tr>";
                   }
                    else{
                       echo
                   "<tr>" . "<th scope='row'>" . $contor ."</th>". 
                   "<td>" . $examen['Nume'] ."</td>".
                    "<td>" . $examen['NumeSpec'] ."</td>".
                     "<td>" . $examen['an'] . "</td>".
                     "<td>" . $examen['grupa'] ."</td>".
                     "<td>" . $examen['data'] ."</td>".
                     "<td> " . $examen['oraIncepere'] . "</td>".
                    "<td>" . $examen['oraFinal'] ."</td>".
                    "<td>" . $examen['sala']. "</td>".
                    " <td> " . $examen['nume'] . "</td>".
                    "</tr>";
                    }
               }
           } else {
               echo "Nu există examene programate pentru materia aleasă ";
           }
       echo "</tbody>";
           ?>
       
       </div> 
   </html>

