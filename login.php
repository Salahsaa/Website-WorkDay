<?php

require "connection.php";
session_start();

if(isset($_POST["btn"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "select * from user where Email = '$email'  and Password = '$password' ";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0 ){
        while($data = mysqli_fetch_assoc($result)){
         $_SESSION["userid"]=$data["id"];
        }
         header("location:accueil.php");
    }
    else
    {
         echo " erreur ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <header>
   <h1>WorkDay</h1>
  <a href="SignUp.php"> <input type="button" value="S'inscrire" class="btn"></a>
    </header>
    
    <section>
        <form action="" method="post" >
        <h2>login to WorkDay</h2>
        <input type="text" class="text" name="email" placeholder="Email adresse or phone numbre">
        <input type="password" class="password" name="password" placeholder="Password" id="">
        <input type="submit" name="btn" value="Login In" class="login">
        <div class="lien">
            <a href="" class="a1">Compte oublié</a> <a href="" class="a2">Inscrivez-vous à WorkDay</a>
        </div>
        </form>
     </section>
</body>
</html>