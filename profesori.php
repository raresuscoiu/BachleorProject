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
$sql = "SELECT DISTINCT mat.Nume, mat.profesorID, mat.an, mat.id FROM materii as mat INNER JOIN profesori as pr ON mat.profesorID = pr.id INNER JOIN users as us ON pr.userID = us.id where us.nume = '$numecurent' GROUP BY mat.Nume";
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
    include('headerpr.php');
    
?>

<body> 

<br>

    <div class="row cauta" style="text-align:center; width:50%;">
            <div class="col-sm-6">
                <label>Căutare după dată:</label>
                <input type="text" class="form-control datepicker textbox">
                <br>
                <label>Căutare după materie:</label>
                <select class="form-control" id="materiepick"> 
                            <option value="<?= null ?>"></option> 
                            <?php 
                                foreach($materii as $materie){
                                    $matId = $materie['id'];
                                    $matNume = $materie['Nume'];
                                    echo "<option value=$matId>$matNume</option>";  
                                }
                            ?> 
                        </select>
                        <br>
                <button class="arataExamene btn btn-primary">Arată examene</button>
                <button class="ascundeExamene btn btn-primary hidden">Ascunde examene</button>
                <button class="arataFiltre btn btn-primary">Arată filtre</button>
                <button class="arataFiltre btn btn-primary hidden">Ascunde filtre</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Adaugă Examen </button>
                <div class="filtre hidden">
                    <br>
                    <label for="specializare">Specializare:</label>
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
                    <label for="an">An:</label>
                    <input id="an" type="text" class="form-control">
                    <br>
                    <label for="grupa">Grupă:</label>
                    <input id="grupa" type="text" class="form-control">
                </div>
            </div>
            <div class="listaExamene hidden">
               
            </div>
        </div>
        <script src="javascript/script2.js"></script> 

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document"  style="width:100%;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adăugare examen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                        <div class="formular">
                        
                        <h3>Urmăriți instrucțiunile fiecărui paragraf din formular pentru adăugarea în orar a unui examnen:</h3>
                        <div class="input-box valexamen">


                        <h4>1.Alegeți disciplina din meniul de mai jos:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                        <select class="classic" id="materieform" style="width:200px; text-align:center;"> 
                            <option value=0></option> 
                            <?php 
                                foreach($materii as $materie){
                                    $matId = $materie['id'];
                                    $matNume = $materie['Nume'];
                                    echo "<option value=$matId>$matNume</option>";  
                                }
                            ?> 
                        </select>
                       
                        <br>
                        <br>
                        <h4>2.Alegeți specializarea din meniul de mai jos:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                        
                        <select class="classic" name="specializareform" id="specializareform" style="width:200px; text-align:center;">
                        </select>
                        <br>
                        <br>

                        <h4>3.Alegeți anul de studiu:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                        <select class="classic" name="anform" id="anform" style="width:200px; text-align:center;">
                            <option value="<?= null ?>"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <br>
                        <br>

                        <h4>4.Alegeți grupa:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                       
                        <select class="classic" name="grupaform" id="grupaform" style="width:200px; text-align:center;">
                        </select>
                        <br>
                        <br>

                        <h4>5.Alegeți data examenului:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                        <input type="date" placeholder="Alegeti data" name="dataform" id="dataform">

                        <br>
                        <br>

                        <h4>6.Alegeți ora la care se va susține examenul:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>

                        <input type="number" min="0" max="23" placeholder="00" name="oraStart" id="oraStart">
                        <input type="number" min="0" max="59" placeholder="00" name="minuteStart" id="minuteStart">

                        <br>
                        <br>

                        <h4>7.Alegeți ora la care se va încheia examenul:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>

                        <input type="number" min="0" max="23" placeholder="00" name="oraFinal" id="oraFinal">
                        <input type="number" min="0" max="59" placeholder="00" name="minuteFinal" id="minuteFinal">

                        <br>
                        <br>

                        <h4>8.Alegeți sala în care doriti să se susțină examenul:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                        <input type="list" placeholder="Alegeti sala" name="salaform" id="salaform">

                        <br>
                        <br>

                        <h4>Vă rugăm să verificați dacă datele introduse mai sus sunt corecte:</h4>
                        <style>
                            h4{
                                color:aliceblue;
                                font-size:18px;
                            }
                        </style>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Închide</button>
                    <button type="button" class="btn btn-primary adaugaExamen">Adaugă examen</button>
                </div>
                
                </div>
            </div>
        </div>
</div>
                        </div>


</body>
</html>

