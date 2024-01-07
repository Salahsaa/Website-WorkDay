<?php
    session_start();
    require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Parametre.css">
    <title>Document</title>
</head>
<body>
     
      <div class="parent">
        <div class="haut">
            <h1>Menu</h1>
            <div class="hautimg">
                <div class="S1"></div>
                <div class="S2"></div>
                <img src="Parametre.svg" class="img1" alt="">
                <img src="recherche-profil-Acc.svg" class="img2" alt="">
            </div>
        </div>
            <?php
                if (isset($_SESSION['userid'])) {
                    $id = $_SESSION['userid'];
                    $sql1 = "SELECT img, Nom, Prenom FROM user where id=$id"; 
                    $result1 = $conn->query($sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                  
                    // Your code that uses $id
                  }  
            ?>
         <div class="ParPrfl">
         <a href="profile.php"><img src="<?= $row1['img'] ?>" alt=""></a>
           <div class="ProfTExt">
            <h2><?= $row1['Nom'] . " " . $row1['Prenom'] ?></h2>
            <p>Voir votre profil</p>
           </div>
        </div>
        <hr>
    </div>
        <div class="ParentCase">
              <div class="deconnection">
                <img src="<?= $row1['img'] ?>" class="img1" alt="">
            <div class="Deco">
                <input type="button" class="btn" value="Invitation">
                <div class="dec1">
                    <img src="PointInterrogation.svg" class="imgDec1" alt="">
                    <h2>Aide et assistance</h2>
                </div>
                <div class="dec2">
                    <img src="Parametre.svg" class="imgDec2" alt="">
                    <h2>Parmètres et confidentialité</h2>
                </div>
                <hr>
                <a href="deconnection.php"><input type="button" class="btn1" value="Déconnexion"></a>
            </div>
        </div>

            <div class="ParCase"> 
            <div class="Case">
                <a href="video.php"><img src="ImgAcc2.PNG" class="CaseImg" alt=""></a>
                <h3>Vidéos</h3>
            </div>
            <div class="Case">
                <a href="#"><img src="Souvenir.svg" class="CaseImg" alt=""></a>
                <h3>Souvenirs</h3>      
            </div>
            <div class="Case">
                <a href="#"><img src="Enregistre.svg" class="CaseImg" alt=""></a>
                <h3>Enregistrements</h3>
            </div>
            <div class="Case">
                <a href="#"><img src="Market.svg" class="CaseImg" alt=""></a>
                <h3>Marketplace</h3>
            </div>
            <div class="Case">
                <a href="accueil.php"><img src="file.svg" class="CaseImg" alt=""></a>
                <h3>Fils</h3>
            </div>
            <div class="Case">
                <a href="#"><img src="Group.svg" class="CaseImg" alt=""></a>
                <h3>Groupes</h3>
            </div>
            <div class="Case">
                <a href="invitation.php"><img src="amis.svg" class="CaseImg" alt=""></a>
                <h3>Retrouver des ami(e)s</h3>
            </div>
            <div class="Case">
                <a href="notification.php"><img src="notifAcc4.svg" class="CaseImg" alt=""></a>
                <h3>Notifications</h3>
            </div>
            <div class="Case">
                <a href="message.php"><img src="commentAcc5.svg" class="CaseImg" alt=""></a>
                <h3>Méssages</h3>
            </div>
        </div>

        </div>
     



</body>
</html>