<?php 

$contor = 0;
include ('dbcon.php');

$filtre = $_GET['filtre'];

$data = date("Y-m-d",strtotime($filtre['data']));
$sql = "SELECT ex.id, ex.grupa, ex.an, ex.oraIncepere, ex.oraFinal, ex.sala, spec.NumeSpec, mat.Nume, us.nume
 FROM examene as ex
 INNER JOIN specializari as spec ON ex.specID = spec.id 
 INNER JOIN materii as mat ON ex.materieID = mat.id  
 INNER JOIN profesori as pr ON ex.profID = pr.id 
 INNER JOIN users as us ON pr.userID = us.id WHERE ex.data = '$data'";

if($filtre['materie']){
    $materie = $filtre['materie'];
    $sql .= " AND mat.id = $materie";
}
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
$sql .= " ORDER BY ex.oraIncepere, ex.oraFinal ASC";
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
            <th scope='col'>Ora start</th>
            <th scope='col'>Ora final</th>
            <th scope='col'>Sala</th>
            <th scope='col'>Prof. Coordonator</th>
            <th scope='col'>Actiuni</th>
            </tr>
            </thead>
        <tbody>";
            foreach($examene as $examen){
                $examenId=$examen['id'];
                $contor = $contor+1;
                if($numesesiune == $examen['nume']){
                   
                echo
                "<tr class='examenRow' data-examen='$examenId'>" . "<td scope='row'>" . $contor ."</td>". 
                "<td>" . $examen['Nume'] ."</td>".
                 "<td>" . $examen['NumeSpec'] ."</td>".
                  "<td>" . $examen['an'] . "</td>".
                  "<td>" . $examen['grupa'] ."</td>".
                  "<td> " . $examen['oraIncepere'] . "</td>".
                 "<td>" . $examen['oraFinal'] ."</td>".
                 "<td>" . $examen['sala']. "</td>".
                 " <td> " . $examen['nume'] . "</td>".
                 "<td><button type='button' class='btn btn-danger stergeExamen' data-toggle='modal' data-target='#exampleModal2'  data-examen='$examenId'> Ștergere </button></td>
                 
                 <div class='modal fade' id='exampleModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' >
                 <div class='modal-dialog modal-lg' role='document'  style='width:100% position: absolute;
                
                 top: 30%;';>
                 <div class='modal-content'>
                 
                    
                    
                    
                 
                 <div class='modal-body'>
                    <p>Sunteți sigur că doriți să ștergeți programarea examenului?</p>
                    <button type='button' class='btn btn-dark' data-dismiss='modal'>Închide</button>
                    <button type='button' class='btn btn-danger stergeExamenSucces'  data-dismiss='modal'>Sterge examen</button>
                </div>

                 ".
                 "</tr>";
                }
                 else{
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
            }
        } 
        else {
            echo "Nu există examene programate în data de: ". $data ;
        }
    echo "</tbody>";

   
        ?>
    
    </div> 
</html>