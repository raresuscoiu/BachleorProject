<?php
include ('dbcon.php');
// session_start();
// redirectionare la pagina de logare daca user-ul nu este logat
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$sql = "SELECT id, NumeSpec FROM specializari";
$specializari = $con->query($sql);
?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Profesor/examene  </title>
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
    include('headersc.php');
    
?>

<body> 

<div class="row cauta" style="text-align:center; width:26%">
            <div class="col-sm-6" style="text-align:center;" >
                <label>Specializare:</label>
                <select class="form-control" name="specializare" id="specializare">
                        <option value="<?= null ?>"></option>
                        <?php 
                            foreach($specializari as $specializare){
                                $specId = $specializare['id'];
                                $specNume = $specializare['NumeSpec'];
                                echo "<option value=$specId>$specNume</option>";  
                            }
                        ?>
                    </select>
                <br>
                <label>An:</label>
                <br>
                <select class="form-control" name="an" id="an">
                            <option value="<?= null ?>"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                <br>
                <button class="arataGrupe btn btn-primary">Afișează grupe</button>
            </div>
            <div class="listagrupe hidden">
               
            </div>
        </div>
        <script src="javascript/script2.js"></script> 

</body>