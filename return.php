<?php
    session_start();
    //Variabile pentru baza de date
    $dBHost = 'localhost';
    $dBEmail = 'root';
    $dBPass = '';
    $dBName = 'test';
    $errors = array();

    //Ne conectam la baza de date folosind datele de mai sus
    $con = mysqli_connect($dBHost, $dBEmail, $dBPass, $dBName);
    if(mysqli_connect_errno()){
        //Daca avem o eroare la conexiune, oprim programul si afisam mesajul urmator
        exit('Failed to connect: ' . mysqli_connect_error());
    }
    $sql = "SELECT *  FROM examene";
    $result = $con->query($sql);

    // exemplu select studenti unde specializarea este 1
    $sql = "SELECT *  FROM studenti WHERE specializare_id = 1";
?>

<html>
    <ul>
        <?php 
        foreach($result as $materie){
            echo "<li>" . $materie['materie'] . "</li>";
        }
        ?>
    </ul>
    <option class="optiune" data-specId="<?= $specializare['id']?>"> <?= $specializare['nume']?> </option>
</html>