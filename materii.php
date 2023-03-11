<?php 

$dBHost = 'localhost';
$dBEmail = 'root';
$dBPass = '';
$dBName = 'proiectlicenta';
$errors = array();

//Ne conectam la baza de date folosind datele de mai sus
$con = mysqli_connect($dBHost, $dBEmail, $dBPass, $dBName);
if(mysqli_connect_errno()){
    //Daca avem o eroare la conexiune, oprim programul si afisam mesajul urmator
    exit('Failed to connect: ' . mysqli_connect_error());
}

$numesesiune = $_SESSION['name'];
$sql="SELECT materia1, materia2, materia3 FROM profesori where nume='$numesesiune'";
$result = mysqli_query($con,$sql);
$materii= mysqli_fetch_array($result);


?>