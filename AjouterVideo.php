<?php
require "connection.php";
  session_start();
  $id = $_SESSION["userid"];
  $idg = $_GET["id"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn'])) {

    
    $sql8 = "INSERT  into notificaton (id,idUser,commentaire,date) values (null,$idg,'a cree un video',NOW())";
    $result8 = mysqli_query($conn,$sql8);

    // $targetDir = "C:/xampp/htdocs/Website/ImageStory/"; 
    // $video = basename($_FILES["video"]["name"]);
    $nom = $_POST["nom"];
    $commentaire = $_POST["commentaire"];
    $url = $_POST["url"];
    
    // $targetFilePath = $targetDir . $video;

    // if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO video (nom,commentaire,video,date,idUser) VALUES ('$nom','$commentaire','$url',NOW(),$id)"; 
        if ($conn->query($sql) === TRUE) {
            
            header("location:video.php");
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
        }
    // } else {
    //     echo "Une erreur s'est produite lors du téléchargement du fichier.";
    // }
// }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width==, initial-scale=1.0">
    <link rel="stylesheet" href="AjouterVideo.css">
    <title>Document</title>
</head>
<body>
   
    <div class="CrSty">
        <div class="Cry">
        <a href="video.php"><img src="./ImageStory/xmark-solid.svg" class="img1" alt=""></a>
        <h1 class="h1">Créer une vidéo</h1>
        <img src="./ImageStory/camera-solid.svg" class="img2" alt="">
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
              <tr><td><label>nom</label></td><td><input type="text" name="nom" class="nom" placeholder="entrer le nom" required></td></tr>
              <tr><td><label>commentaire</label></td><td><input type="text" name="commentaire" class="commentaire" placeholder="entrer le commentaire" required></td></tr>
              <tr><td><label>url</label></td><td><input type="text" name="url" class="url" placeholder="entrer l'url" required></td></tr>
              <!-- <input type="file" class="file" name="video"  required> -->
              <a href="accueil.php"><input type="submit" class="btn" name="btn" value="Envoyer"></a>
            </table>
        </form>
    </div>
  
</body>
</html>
