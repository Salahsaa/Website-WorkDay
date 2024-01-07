<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>
<?php
    require "connection.php";
    $nom = $_POST["nom"]; 
    $prenom = $_POST["prenom"]; 
    $pass = $_POST["pass"]; 
    $passcofirm = $_POST["passcofirm"]; 
    $gender = $_POST["gender"]; 
    $email = $_POST["email"]; 
    $number = $_POST["number"]; 

    if( !empty($nom) && !empty($prenom) && !empty($pass) && !empty($passcofirm) && !empty($gender) && !empty($email) && !empty($number)) {
            if($pass == $passcofirm ){
                $req = "insert into user(Nom,Prenom,Password,Email,Gender,Tele) values ('$nom', '$prenom' ,'$pass','$email','$gender','$number')";
                $result = mysqli_query($conn,$req);
                 header("location:login.php");
             
            }else{
                echo "erreur de password";
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignUp.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&family=Roboto:ital@1&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
       <form method="post" class="disgne">
           <h1>Inscrivez-vous !</h1>
        <table>
            <div class="input">
            <tr><td><label class="label">Nom</label></td>  <td><input type="text" name="nom" placeholder="entrer ton nom" required class="inp"></td></tr>
            <tr><td><label class="label">Prenom</label></td>  <td><input type="text" name="prenom" placeholder="entrer ton prenom" required class="inp"></td></tr>
            <tr><td><label class="label">Mot de passe</label></td>  <td><input type="password" name="pass" placeholder="entrer ton mot de passe" required class="inp"></td></tr>
            <tr><td><label class="label">Confirmer mot de passe</label></td>  <td><input type="password" name="passcofirm" placeholder="entrer ton mot de passe" required class="inp"></td> <td><span class="pass">
            </span></td></tr>
            <tr><td><label class="label">Sexe</label></td>  <td><select name="gender" required class="inp ">
                <option value="" class="select">selectionner</option>    
                <option value="Famme" class="select">Femme</option>
                <option value="Homme" class="select">Homme</option>
            </select></td></tr>
            <tr><td><label class="label">Email</label></td>   <td><input type="text" name="email" placeholder="entrer ton email" required class="inp"></td></tr>
            <tr><td><label class="label">Telephone</label></td>  <td><input type="text" name="number" placeholder="entrer ton N telephone" required class="inp"></td></tr>
            <tr>
               <td><input type="submit" name="btn" value="S'inscrire"  class="btn"></td>
               <td><a href="login.php"><input type="button" value="Retour"  class="btn1"></a></td>
            </tr>
            </div>
        </table>
       </form>
</body>
</html>