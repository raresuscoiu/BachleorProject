<?php
include ('dbcon.php');

if (isset($_POST['login'])) {
    
    if (empty($_POST['email'])) { array_push($errors, "Introduceti adresa de email institutionala"); }
    if (empty($_POST['password'])) { array_push($errors, "Introduceti parola"); }

}
if($stmt = $con->prepare('SELECT * FROM users  WHERE email = ?')){
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
}
if($stmt->num_rows > 0){
    $stmt->bind_result($id, $nume, $email, $password, $functie);
    $stmt->fetch();
    if($_POST['password'] === $password && $_POST['email'] === $email){
        $emailcurent = $_POST['email'];
        $hashpassword = md5($_POST['password']);
        $hash = "UPDATE users SET password = '$hashpassword' WHERE email = '$emailcurent' ";
        $hashh = $con->query($hash);
    }
    if(md5($_POST['password'])=== $password && $_POST['email'] === $email){
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $nume;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['functie'] = $functie;
        $_SESSION['password'] = $password;
        
        if($_SESSION['functie'] == 'student')
		    header('Location: studenti.php');
        if($_SESSION['functie'] == 'profesor')
            header('Location: profesori.php'); 
        if($_SESSION['functie'] == 'secretar')
            header('Location: secretar.php');
        
    } else{
        if (isset($_POST['login']))
        if($_POST['password'] && $_POST['email'])
                 array_push($errors, "Parola sau adresa de email gresita");
    }
}



