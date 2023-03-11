<?php
$contor = 0;
include ('dbcon.php');
// asa iei datele din request
$filtre = $_GET['filtre'];
// vezi exact ce este in variabila
// var_dump($filtre);
 //die;
$data = date("Y-m-d",strtotime($filtre['data']));
$numestudent = $_SESSION['name'];
$sql = "SELECT st.grupa, st.an, st.specID FROM studenti as st INNER JOIN specializari as sp ON st.specID = sp.id  INNER JOIN users as us ON st.userID = us.id WHERE us.nume = '$numestudent'";
$results = $con->query($sql);

foreach($results as $result)
{
    $specST = $result['specID'];
    $grupaST = $result['grupa'];
    $anST = $result['an'];
}

$sql="SELECT ex.id, ex.grupa, ex.an, ex.oraIncepere, ex.oraFinal, ex.sala, spec.NumeSpec, mat.Nume, us.nume FROM examene as ex INNER JOIN specializari as spec ON ex.specID = spec.id INNER JOIN materii as mat ON ex.materieID = mat.id  INNER JOIN profesori as pr ON ex.profID = pr.id INNER JOIN users as us ON pr.userID = us.id WHERE ex.data = '$data' AND ex.specID ='$specST' AND ex.grupa ='$grupaST' AND ex.an = '$anST'";
if($filtre['materie']){
    $materie = $filtre['materie'];
    $sql .= " AND mat.id = $materie";
}
$sql .= " ORDER BY ex.oraIncepere, ex.oraFinal ASC";
$examene = $con->query($sql);


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
        
         
         echo
         "<tr>" . "<th scope='row'>" . $contor ."</th>". 
         "<td>" . $examen['Nume'] ."</td>".
          "<td>" . $examen['NumeSpec'] ."</td>".
           "<td>" . $examen['an'] . "</td>".
           "<td>" . $examen['grupa'] ."</td>".
           "<td> " . $examen['oraIncepere'] . "</td>".
          "<td>" . $examen['oraFinal'] ."</td>".
          "<td>" . $examen['sala']. "</td>".
          " <td> " . $examen['nume'] . "</td>".
          "</tr>";
         
     }
 } else {
     echo "Nu există examene programate în data de: ". $data ;
 }
echo "</tbody>";
 ?>

</div> 
</html>