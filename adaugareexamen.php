<?php
session_start();
// redirectionare la pagina de logare daca user-ul nu este logat
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

?>

<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <title> Profesor/examene  </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<?php
    include('headerpr.php');
?>

<body> 
 

<form action="adaugareexamen.php" method="post">
    <div class="formular">
<h3>Urmariti instructiunile respective fiecarui paragraf din formular pentru adaugarea in orar a unui examnen:</h3>
<div class="input-box">


<h4>1.Alegeti disciplina din meniul de mai jos:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input list="disciplina" placeholder="Alegeti disciplina" name="disciplina">



<br>
<br>
<h4>2.Alegeti specializarea din meniul de mai jos:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input list="specializarea" placeholder="Alegeti specializarea" name="specializarea">
<datalist id="specializarea">
  <option value="AIA">
  <option value="TI">
</datalist>
<br>
<br>

<h4>3.Alegeti anul de studiu:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input list="anul" placeholder="Alegeti anul" name="anul">
<datalist id="anul">
  <option value="I">
  <option value="II">
  <option value="III">
  <option value="IV">
</datalist>
<br>
<br>

<h4>4.Alegeti grupa:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input list="grupa" placeholder="Alegeti grupa" name="grupa">
<datalist id="grupa">
  <option value="1">
  <option value="2">
  <option value="3">
  <option value="4">
</datalist>
<br>
<br>

<h4>5.Alegeti data examenului:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input type="date" placeholder="Alegeti data" name="data" id="data">

<br>
<br>

<h4>6.Alegeti ora la care se va sustine examenul:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>

<input type="number" min="0" max="23" placeholder="00" name="ora">
<input type="number" min="0" max="59" placeholder="00">

<br>
<br>

<h4>7.Alegeti sala in care doriti sa se sustina examenul:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input type="list" placeholder="Alegeti sala" name="sala" id="sala">

<br>
<br>

<h4>Va rugam verificati daca datele introduse mai sus sunt corecte:</h4>
<style>
    h4{
        color:aliceblue;
        font-size:18px;
    }
</style>
<input type="submit" class="adaugare-btn" value="Adaugati examen">

<br>
<br>









</div>
</div>
</form>

</body>
</html>
