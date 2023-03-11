<?php
include ('dbcon.php');
// session_start();
// redirectionare la pagina de logare daca user-ul nu este logat
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$sql = "SELECT * FROM specializari";
$specializari = $con->query($sql);

$numecurent = $_SESSION['name'];
$sql = "SELECT mat.Nume, mat.profesorID, mat.an, mat.id FROM materii as mat INNER JOIN profesori as pr ON mat.profesorID = pr.id INNER JOIN users as us ON pr.userID = us.id where us.nume = '$numecurent' ";
$materii = $con->query($sql);


?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/materia/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<?php
    include('headerst.php');
    
?>

<body> 

<div class="info-prof">
<?php
$numestudent = $_SESSION['name']; 
$sql = "SELECT st.grupa, st.an, st.specID, sp.NumeSpec FROM studenti as st INNER JOIN specializari as sp ON st.specID = sp.id  INNER JOIN users as us ON st.userID = us.id WHERE us.nume = '$numestudent'";
$results = $con->query($sql);

foreach($results as $result)
{
    $specST = $result['NumeSpec'];
    $grupaST = $result['grupa'];
    $anST = $result['an'];
}

$sqlcount = "SELECT COUNT(ex.id) as total FROM examene as ex INNER JOIN specializari as spec ON ex.specID = spec.id WHERE spec.NumeSpec = '$specST' AND ex.grupa ='$grupaST' AND ex.an = '$anST'"; 
            $datacount = mysqli_query($con,$sqlcount);
            $count = mysqli_fetch_assoc($datacount);
            

echo "Utilizator curent: " . $numestudent . "<br>";
echo "Specializare: " . $specST . "<br>";
echo "Anul : " . $anST . "<br>";
echo "Grupa: " . $grupaST . "<br>";
echo "Examene programate: ".$count['total'] . "<br>";

?>
<button class="verificaorar btn btn-dark" onclick="location.href='studenti.php';">Verifică orarul</button>
</div>
</body>