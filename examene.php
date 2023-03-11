<?php 

//Variabile pentru baza de date
$contor = 0;
include ('dbcon.php');
// asa iei datele din request
$filtre = $_GET['filtre'];
// vezi exact ce este in variabila
// var_dump($filtre);
 //die;
$data = date("Y-m-d",strtotime($filtre['data']));
$sql = "SELECT ex.grupa, ex.an, ex.oraIncepere, ex.oraFinal, ex.sala, spec.NumeSpec, mat.Nume, us.nume FROM examene as ex INNER JOIN specializari as spec ON ex.specID = spec.id INNER JOIN materii as mat ON ex.materieID = mat.id  INNER JOIN profesori as pr ON ex.profID = pr.id INNER JOIN users as us ON pr.userID = us.id WHERE ex.data = '$data'";
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
$examene = $con->query($sql);
?>

<html>
    
 <div class="exameneafisate">
    <ul>
        <?php 
        if($examene) {
            foreach($examene as $examen){

                echo "<li>" . "Materie: " . $examen['Nume'] . " | Specializare: " . $examen['NumeSpec'] . " | Anul: " . $examen['an'] . " | Grupa: " . $examen['grupa'] . " | Ora: " . $examen['oraIncepere'] . " - " . $examen['oraFinal'] . " | Sala:" . $examen['sala']. " | Prof. Coordonator: " . $examen['nume'] . "</li>";
            }
        } else {
            echo "Nu exista examene programate in data de:". $data ;
        }
        ?>
    </ul>
    </div> 
</html>