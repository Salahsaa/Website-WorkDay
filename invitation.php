<?php
require "connection.php";
session_start();
$id_sess = $_SESSION["userid"];
$sql = "SELECT u.id as id1, u.Prenom as pre, u.Nom as nom, u.img as img  from invitation i, user u where  i.idSf = u.id  and i.idSt =$id_sess"; 
$result1 = $conn->query($sql);

while($row2 = mysqli_fetch_assoc($result1)){
   $conca = 'ajoutami'.$row2['id1'];
if(isset($_POST[$conca])){
  
            $id1 = $_POST['id1'];
            $req = "INSERT into amis(idSf,idSt) values ('$id1', '$id_sess')";
            $req3 = "INSERT into amis(idSf,idSt) values ('$id_sess','$id1')";
            $req2 = "DELETE from invitation where idSf = $id1 and idSt = $id_sess";

            $result = mysqli_query($conn,$req);
            $result = mysqli_query($conn,$req3);
            $result2 = mysqli_query($conn,$req2);
            header("location:accueil.php");
         }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="invitation.css">
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
         <a href="#"><img src="userAcc3.svg" alt=""></a>
         <a href="notification.php"><img src="notifAcc4.svg" alt=""></a>
        <a href="Parametre.php"> <img src="bars-Acc8.svg" alt=""></a>
        </div>
    </header>
    <h1 class="titre">Invitations</h1>
    <div class="partInvt">
      <?php
      $sql = "select u.id as id1, u.Prenom as pre, u.Nom as nom, u.img as img  from invitation i, user u where  i.idSf = u.id  and i.idSt =$id_sess"; 
      $result1 = $conn->query($sql);
       while($row = mysqli_fetch_assoc($result1)){
       
         
         ?>
        <div class="SecInvit">
           <img src="<?php echo $row['img']; ?>" alt="">
           <h4><?php echo $row['pre']." ".$row['nom']?></h4>
           <div class="divBtn">
            <form action="#" method="post">
            
         
            <input type="hidden" value="<?php echo $row['id1']; ?>" name='id1' >
            <input type="submit" class="btn" value="Confirmer" name='ajoutami<?php echo $row['id1']  ?>'>
            </form>

           <input type="submit" class="btn1" value="Suprimer">
           </div>
        </div>
        <?php } ?>
        
    </div> 
</body>
</html>