<?php

    include ('authenticate.php');

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" conent="width=device-width, initial-scale:1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Autentificare</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
    </head>

    <body>
    
    <section class="header">
            <img src="images/logo_unitbv.png">
            <style>
            img{
                height: 100px;
            }
        </style>
            <div class="welcome">
                <h2>BINE AȚI VENIT!</h2>
                <h4>Pe această pagină veți putea obține informații referitoare la programarea examenelor</h4>
            </div>
    </section>
    

    <section class="bodyy">
        <!-- Formularul de Login -->
        <div class="form-box">
            <h1>Autentificare</h1>

            <!-- Include authenticate.php -->
            <form  method="post" action="index.php" > 
           
            <?php include('errors.php'); ?>

            <div class="input-box">
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" placeholder="Email instituțional" id="email">
            </div>
            <div class="input-box">
                <i class="fa fa-key" aria-hidden="true"></i>
                <input type="password" name= "password" placeholder="Parola" id="password">
                <span class="eye" onclick="myFunction()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
            </div>
            <button type="submit" class="login-btn" name="login" > Autentificare </button>
            </form>
        </div>
        <div class="info">
            <p>Vă puteți autentifica cu <b>adresa de email institutională</b>, astfel:</p>

            <p>Personal universitate: @unitbv.ro</p>

            <p>Studenți: @student.unitbv.ro</p>
      
        </div>
    </section>
        
        
        
        <!-- Script-ul pentru butonul "eye" pentru afisarea/ascunderea parolei -->
        <script>
            function myFunction(){
                var x = document.getElementById("password");
                var y = document.getElementById("hide1");
                var z = document.getElementById("hide2");

                if(x.type === 'password'){
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                }
                else{
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                }
            }
        </script>
    </body>
</html>