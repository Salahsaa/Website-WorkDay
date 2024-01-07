<?php
   session_start();
   $id = $_SESSION["userid"];

  require "connection.php";
//  $text = $_POST['text'];
//  echo $text;
   

  $sql = " SELECT u.Nom,u.Prenom,u.img,n.commentaire,n.date from user u , notificaton n where u.id=n.idUser and u.id=$id"; 
  $result = mysqli_query($conn,$sql);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notification.css">
    <title>Document</title>
</head>
<body>
     
    <header>

        <div class="Head hedr1">
         <div class="divH1">
             <img  src="imgSite.png"  class="img1" alt="" >
             <!-- <input type="text" class="txt" placeholder=" Recherche sur Facebook">
             <img src="recherche-profil-Acc.svg"  class="img2" alt="" > -->
         </div>
         <div class="divIcon">
             <img src="commentAcc5.svg"  alt=""  id="i1" style="width: 24px;height: 24px;" >
         </div>
        </div>

        <div class="Head hedr2">
         <a href="accueil.php"><img src="ImgAcc1.PNG" alt=""></a>
         <a href="video.php"><img src="ImgAcc2.PNG" alt=""></a>
         <a href="invitation.php"><img src="userAcc3.svg" alt=""></a>
         <a href="#"><img src="notifAcc4.svg" alt=""></a>
        <a href="Parametre.php"> <img src="bars-Acc8.svg" alt=""></a>
        </div>
    </header>

    <div class="PrntNotif">
        <h1>Notifications</h1>
        <?php 
            while($row = mysqli_fetch_assoc($result)){
              $img = $row['img'];
              $Nom = $row['Nom'];
              $Prenom = $row['Prenom'];
              $commentaire = $row['commentaire'];
              $date = $row['date'];
        ?>
        <div class="notif">
            <img src="<?php echo $img; ?>" alt="">
          <div class="notifCmt">
            <h2><?php echo $Nom ." ".$Prenom; ?></h2>
            <h4><?php echo $commentaire;  ?></h4>
          </div>
          <p><?php echo $date;  ?></p>
        </div>
        <?php } ?>
        
    </div>

</body>
</html>