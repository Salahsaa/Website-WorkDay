<?php
require "connection.php";
session_start();
  $id = $_SESSION["userid"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn'])) {
    $targetDir = "C:/xampp/htdocs/Website/ImageStory/"; 
    $image = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $image;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO story (idUser, img, date) VALUES ($id, '$image', NOW())"; 

        $idg = $_GET["id"];
        $sql8 = "INSERT into notificaton (id,idUser,commentaire,date) values (null,$idg,'a cree un story',NOW())";
        $result8 = mysqli_query($conn,$sql8);
        if ($conn->query($sql) === TRUE) {
            //echo "story ajouté avec succès.";
            header("location:accueil.php");
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
}
?>
<?php 
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width==, initial-scale=1.0">
    <link rel="stylesheet" href="AjouterStory.css">
    <title>Document</title>
</head>
<body>
   
    <div class="CrSty">
        <div class="Cry">
        <a href="accueil.php"><img src="./ImageStory/xmark-solid.svg" class="img1" alt=""></a>
        <h1 class="h1">Créer une story</h1>
        <img src="./ImageStory/camera-solid.svg" class="img2" alt="">
        </div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" class="file" name="file"  required>
    <a href="accueil.php"><input type="submit" class="btn" name="btn" value="Envoyer"></a>
    </form>
    </div>
  
</body>
</html>




