<?php
session_start();
require "connection.php";
// $id = $_SESSION["userid"];


if(isset($_POST['btn1'])) {
  $targetDir = "C:/xampp/htdocs/Website/ImageStory/"; 
  $image = basename($_FILES["file"]["name"]);
  $text = $_POST["text"];
  $targetFilePath = $targetDir . $image;
  $id_sess = $_GET['idP'];

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      $sql = "INSERT INTO post (idUser,img,text, date ) VALUES ($id_sess, '$image','$text', NOW())"; 
      
      if ($conn->query($sql) === TRUE ) {
        //  echo "Post ajouté avec succès.";
      } else {
          echo "Erreur : " . $sql . "<br>" . $conn->error;
      }
  } else {
      echo "Une erreur s'est produite lors du téléchargement du fichier.";
  }

  $sql8 = "INSERT  into notificaton (id,idUser,commentaire,date) values (null,$id_sess,'a cree un post',NOW())";
  $result8 = mysqli_query($conn,$sql8);
}

if (isset($_SESSION['userid'])) {
  $id = $_SESSION['userid'];
  $sql1 = "SELECT user.img AS user_img, Nom,Prenom FROM user where id=$id"; 
  $result1 = $conn->query($sql1);
  $row1 = mysqli_fetch_assoc($result1);

  // Your code that uses $id
}  

?>
<!-- pour la recherche -->
<?php
    if(isset($_POST['b'])){
        if(isset($_POST['s'])){
            $recherche = $_POST['s'];
            $allusers = $conn->query('SELECT img,Nom , Prenom,id FROM user WHERE Nom LIKE "'.$recherche.'%" ORDER BY id DESC');
        }else{
            $allusers = $conn->query('SELECT * FROM user ORDER BY id DESC');
        }
    }
?>
<!-- pour le commentaire -->
<!-- $idP -->
<?php

 

  // $idp = $_GET['idP'];
  // echo var_dump($idp);
 if(isset($_POST["PostC"])){
  $idp=$_POST["idp"];
  $commentaire = $_POST["commentaire"]; 
  $sqll = " INSERT into commentaire (idUser,idPoste,msg,Date,idVideo) values ($id,$idp,'$commentaire',NOW(),Null)";
  $resultt = mysqli_query($conn,$sqll);
  //echo "lah yaredi 3lik hhh";
}



?>







 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="accueil.css">
    <title>Document</title>
 
<script src="https://use.fontawesome.com/fe459689b4.js"></script>

    
   

</head>

<body>
    
       <header>

               <div class="Head hedr1">
                  <div class="divH1">
                    <img  src="imgSite.png"  class="img1" alt="" >
                    
                    <form action="" class="form" method="post">
                        <input type="text" class="txt" name="s" id="searchInput" placeholder=" Recherche sur WorkDay">
                        <img src="recherche-profil-Acc.svg"  class="img2" alt="" >
                        <button type="submit" name="b" class="btn"><img src="recherche-profil-Acc.svg" alt=""></button>
                    </form>
                   
                  </div>
                  <div class="divIcon">
                    <img src="commentAcc5.svg"  alt=""  id="i1" style="width: 24px;height: 24px;" >
                  </div>
                </div>
          
               <div class="Head hedr2">

                  <a href="#"><img src="ImgAcc1.PNG" alt=""></a>

                  <a href="video.php"><img src="ImgAcc2.PNG" alt=""></a>

                  <a href="invitation.php"><img src="userAcc3.svg" alt=""></a>

                  <a href="notification.php"><img src="notifAcc4.svg" alt=""></a>

                  <a href="Parametre.php"> <img src="bars-Acc8.svg" alt=""></a>

               </div>
       </header>


       <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper ">
      
      <div class="swiper-slide dd">
        <img src="ImageStory/user1.webp" id="imgSlid1" style="width: 195px;height: 208px;">
        <div class="vide"> <a href="AjouterStory.php?id=<?php echo $id; ?>"><img id="iimgSlid1" src="plus-Acc7.svg" alt=""></a></div>
            
        <h4 class="h2Slid1" >Créer une story</h4>
      </div>
     
     <?php
      $sql3 = "SELECT s.img AS storyImg, u.img AS userImg, u.Nom, u.Prenom FROM story s JOIN user u ON u.id = s.idUser ";
      $result3 = $conn->query($sql3);
        //  $row01 = mysqli_fetch_assoc($result);
        //  $row02 = mysqli_fetch_assoc($result3);
       
        while($row03 = mysqli_fetch_assoc($result3)){

          $imgStory = $row03["storyImg"];
          $imgUser = $row03["userImg"];
          $nom = $row03["Nom"];
          $prenom = $row03["Prenom"];
          ?>
        <div class="swiper-slide"> 
        <img src="ImageStory/<?php echo $imgStory; ?>" class="img" style="width: 190px;height:246px;margin-bottom:15px;">
        <img src="<?php echo $imgUser; ?>" id="imgPr" style="width: 40px; height: 37px;border-radius: 50%; position: absolute; top: 13px; left: 22%;transform: translateX(-50%);border:2px solid #1C74E4" alt="">
        <p class="h2Pr" style="position: absolute; top: 219px; left: 36.9%; transform: translateX(-50%);color:white;font-size:11.5px; font-weight: 800;letter-spacing:1.3px; "><?php echo $nom ." ". $prenom;  ?></p>
        </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>


<div class="postPR">
          
    
    <div class="sideDiv">
      <div class="userInfo">
        <a href="profile.php?id=<?php echo $id ?>">
        <img src="<?php echo $row1['user_img']; ?>" alt="Profile Picture"></a>
        <div class="userText">
        <h3><?php echo $row1['Nom'] . " " . $row1['Prenom']; ?></h3>
        <p>Web Developer</p>
      </div>
    </div>
     <div class="friendsList">
        <h2>Amis</h2>
         <?php
        $sql3 = "SELECT u.id,u.Nom as nom , u.Prenom as prenom , u.img as img , u.pays as pays FROM user u INNER JOIN amis a ON a.idSt=u.id WHERE a.idSf={$_SESSION['userid']}";     
          $result3 = mysqli_query($conn, $sql3);
                       while($row3 = mysqli_fetch_assoc($result3)){
                            $img    =  $row3["img"];
                            $nom    =  $row3["nom"];
                            $prenom =  $row3["prenom"];
                            
                           
                       ?>
        <ul>
            <li>
              <img src="<?php echo $img ?>" alt="Friend 1">
               <div class="LiText">
                <h3><?php echo $nom ." ". $prenom;  ?></h3> 
                <p>amis sur WorkDay</p>
              </div>
              <a href="invitation.php"><img src="user.svg"  class="ImgPara"/></a>
             </li>
            <!-- ... ajoutez d'autres amis ... -->
        </ul>
        <?php } ?>
        
       
     </div>
    
  </div>
<?php
if (isset($_POST["btn"])) {
  $idUser = $_SESSION["userid"];
  $idPoste = $_POST['idp'];
  $sql_check = "SELECT * FROM likes WHERE idPoste=$idPoste AND idUser=$idUser";

  $result_check = $conn->query($sql_check);
  if(mysqli_num_rows($result_check) == 0){
      $sql_check = "INSERT INTO likes values (null,$idPoste,0,$idUser)";
      $conn->query($sql_check);
  }else{
    $sql_check = "DELETE FROM likes WHERE idPoste=$idPoste AND idUser=$idUser";
    $conn->query($sql_check);
  }
  
}
?>

  <div class="posts">
        <?php
        $sql2 = "SELECT p.id AS idPoste, p.img AS img_post,p.text, u.img AS user_img, u.Nom, u.Prenom FROM post p JOIN user u ON u.id = p.idUser";
        $result2 = $conn->query($sql2);

        while ( $row2 = mysqli_fetch_assoc($result2)) {
            $idPoste = $row2['idPoste'];
            $image = $row2["img_post"];
            $text = $row2["text"];
            $imgProfile = $row2["user_img"];
            $nom = $row2["Nom"];
            $Prenom = $row2["Prenom"];
        ?> 
      <div class="post">
            <div class="imgH">
            <img src="<?php echo $imgProfile; ?>" alt="">
            <h2><?php echo $nom ." ". $Prenom; ?></h2>
            </div>
            <h4 class="commentairePoste"><?php echo $text; ?></h4>
            <img src="ImageStory/<?php echo $image; ?>" class="imgPost" alt="">
            
          <div class="PostBas">
          <div class="post1">
          <?php
//code de php pour j'aime
  
?>

<!-- Afficher le bouton "J'aime" -->

    <form action="" method="post">
        <!-- Remplacez $idPoste par la valeur de l'ID du poste -->
        <input type="hidden" name="idp" value="<?php echo $idPoste ;?>"/>
        <button class="" name="btn">
            <i id="jaime" class="fa fa-thumbs-up fa-lg"></i>
        </button>
        <?php 
        $sql3 = "SELECT count(*) as nbLike FROM likes WHERE idPoste=$idPoste";
        $result3 = $conn->query($sql3);
        $row3 = mysqli_fetch_assoc($result3);

        echo $row3['nbLike'];
        ?>
    </form>
</div>

          
          <!-- </form> -->
            <div class="post2">
                <img src="commentaire.svg" alt="">
                <!-- <h4>Commmentaire</h4> -->
                 <button type="button" class="btnC" >Commentaire</button> 
            </div>
            <div class="post3">
                <img src="Partage.svg" alt="">
                <h4>Partage</h4>
            </div>
          </div>

          <div class="popupC">
            <form action="" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="idp" value="<?php echo $idPoste?>"/>
                <input type="submit" value="Post" class="btC" name="PostC">
                <input name="commentaire" id="" class="inpC" placeholder="entrer le commentaire"/>
                
            </form>
             <?php

              $sqlComments = "SELECT c.msg, u.Nom AS comment_nom ,u.img as img, u.Prenom AS comment_prenom 
               FROM user u INNER JOIN commentaire c ON u.id = c.idUser
               where c.idPoste = $idPoste";
              $resultComments = mysqli_query($conn, $sqlComments);
    
            while ($rowComment = mysqli_fetch_assoc($resultComments)) {
              $commentaire = $rowComment["msg"];
              $commentNom = $rowComment["comment_nom"];
              $commentPrenom = $rowComment["comment_prenom"];
              $img           = $rowComment["img"];
              
              ?>
                <div class="comm">
                <img src="<?php echo $img; ?>" class="imgC" alt="">
        
                <div class="commMin">
                  <h3 class="h3C"><?php echo $commentNom ." ". $commentPrenom ?></h3>
                <p class="pC"><?php echo  $commentaire; ?></p>
                </div>
        
          </div>
       
        <?php
        }
       
        ?>
      </div>
    </div>
        <?php } ?>
  </div>



</div>
   



<?php 
    if(isset($_POST['b'])){
    
  ?>
  <div id="popup">
        <?php 
            if (mysqli_num_rows($allusers) > 0) {
                while ($user = mysqli_fetch_assoc($allusers)) {
        ?>
                 <img src="<?php echo $user["img"]; ?>" class="img"  alt="">
                <a href="profile.php?id=<?php echo $user["id"] ?>" class="lien"><?= " ".$user["Nom"] ." ". $user["Prenom"] ."<br>"; ?></a>
        <?php
                }
            }else{
        ?>
            <p>Aucun utilisateur trouvé</p>
        <?php
            }
        ?>
    </div>
 <?php
    }
?>
 </div> 


<script>
  const btnCArray = document.querySelectorAll('.btnC');
  const popupArray = document.querySelectorAll('.popupC');
  btnCArray.forEach((btnC,index) => {
    let popupOpened = false;
    btnC.addEventListener('click', function() {
      if(!popupOpened){ 
        popupArray[index].style.display = "block";
        popupOpened=true;
      }else{
        popupArray[index].style.display = "none";
        popupOpened=false;
      }
    });
  });

</script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>






</body>
</html>