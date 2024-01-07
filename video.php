<?php
   session_start();
   $id = $_SESSION["userid"];

  require "connection.php"; 
 
  $sql2 = " SELECT * from video "; 
  $result2 = mysqli_query($conn,$sql2);

?>

<?php

if(isset($_POST["PostC"])){
  $idv=$_POST["idv"];
  $commentaire = $_POST["commentaire"]; 
  $sqll = " INSERT into commentaire (idUser,idPoste,msg,Date,idVideo) values ($id,null,'$commentaire',NOW(),$idv)";
  $resultt = mysqli_query($conn,$sqll);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="video.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title>Document</title>
 
<script src="https://use.fontawesome.com/fe459689b4.js"></script>
<style>

       /* les video */

  .postPR{
    background-color: white;
    margin-top: 79px;
    margin-left:20px;
    width: 90%;
    height: 448px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;

    
   }
   .posts{
    display: flex;
    flex-direction: column;
    position: relative;
    left: 450px; 
   }
   .post{
    width: 750px;
    background-color: rgb(249, 249, 249);
    height: 480px;
    margin-right: 9px; 
   
    margin-bottom:10px;
 
    
   }

   .NewVideo{
    position: fixed;
    top: 85px; 
    left: -0px; 
    /* border-top-left-radius: 18px;
    border-bottom-left-radius: 18px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); */
    width: 34%;
    height: 745px;
    margin-top:10px;
    margin-bottom: 115px;
    margin-left: 0px;
    display: flex;
    flex-direction: column;
    /* background-color: yellow;   */
    
   }
   .NewVideo .parent  h1{
    position: relative;
    bottom: 70px;
    left: 10px;
    margin-bottom: 60px;
    /* margin-top:10px; */
   
   }
   .NewVideo .video{
    display: flex;
    flex-direction: row;
    margin-left: 9px;
    margin-top:2px;
    
   }
   .NewVideo .video iframe{
    margin-top: 7px;
    margin-right: 30px;
    border-radius: 20px;
   }

   .Text{
    display: flex;
    flex-direction: column;
    margin-top: 10px;
   }
   .NewVideo .video .videoText{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
   }
   .NewVideo .video .videoText h2{
   font-size: 18px;
   margin-top: 14px;

   }
     .NewVideo .video .videoText h4{   
    margin-right: 6px
  }
  .NewVideo .video .videoText p{
    margin-top: 7px;
    margin-right: 100px;

  }





  .postPR .imgH {
    display: flex;
    flex-direction: row;
  }
  .postPR .imgH img{
    width: 50px;
    height: 50px;
    border-radius: 44%;
    margin-top: 6px;
    margin-left: 8px;
  }
  .postPR .imgH h2{
    margin-left: 5px;
    margin-top: 7px;
  }
  .postPR  h4{

    margin-left: 11px;
    margin-top: 7px;
    margin-bottom: 10px;
  }
  .postPR .imgPost{
    width: 100%;
    height: 360px;
  }  



  .popupC{
    display: none;
    background-color: white; 
    width: 100%;
    height: 300px;
    padding-bottom: 20px;
} 
 .popupC .inpC{
    border-radius: 20px;
    margin-left: 560px;
    position: relative;
    bottom: 19px;
    height: 30px;
    border: 1px solid black;
    padding-left: 4px;
}
.btC{
    background: none;
    border: none;
    position: relative;
    top: 14px;
    margin-left: 504px;
    margin-bottom: 4px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    border: 1px solid black;
    padding: 4px;
    border-radius: 25px;
}
.btC:hover{
    color: white;
    background-color: black;
 }
.comm{
    display: flex;
    flex-direction: row;
    margin-left: 15px;
    margin: 14px;
}
.commMin{
    display: flex;
    flex-direction: column;
    background-color: rgb(245, 245, 245);
    position: relative;
    left: 8px;
    padding: 5px;
    border-radius: 16px;
    padding-left: 7px;
    margin-right: 7px;
}
.imgC{
     width: 40px;
     height: 40px;
     border-radius: 50%;
}
.pC{
    font-size: 13px;
    font-weight: 00;
    letter-spacing: 1px;
    
}
.h3C{
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 0.4px;
}
</style>
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
             <a href="AjouterVideo.php?id=<?php echo $id; ?>"><img src="plus-Acc7.svg"  alt=""  id="i1" style="width: 24px;height: 24px;" ></a> 
            </div>
        </div>

        <div class="Head hedr2">
            <a href="accueil.php"><img src="ImgAcc1.PNG" alt=""></a>
            <a href="#"><img src="ImgAcc2.PNG" alt=""></a>
            <a href="invitation.php"><img src="userAcc3.svg" alt=""></a>
            <a href="notification.php"><img src="notifAcc4.svg" alt=""></a>
            <a href="Parametre.php"> <img src="bars-Acc8.svg" alt=""></a>
        </div>
    </header>

  
    <!-- <hr> -->

  <?php
  if (isset($_POST["btn"])) {
    $idUser = $_SESSION["userid"];
    $idPoste = $_POST['idp'];
    $sql_check = "SELECT * FROM likes WHERE idVideo=$idPoste AND idUser=$idUser";
  
    $result_check = $conn->query($sql_check);
    if(mysqli_num_rows($result_check) == 0){
        $sql_check = "INSERT INTO likes values (null,0,$idPoste,$idUser)";
        $conn->query($sql_check);
    }else{
      $sql_check = "DELETE FROM likes WHERE idVideo=$idPoste AND idUser=$idUser";
      $conn->query($sql_check);
    }
    
  }
  ?>

<div class="postPR" >

    <div class="NewVideo" >
        <div class="parent">
          <h1>Vidéo</h1>
        </div>

        <?php 

        // if (mysqli_num_rows($result)<5){
             $count = 0;
             while(($row1 = mysqli_fetch_assoc($result2)) && $count < 5 ){
               $Nom         =  $row1["nom"];
               $Commentaire =  $row1["commentaire"];
               $Date        =  $row1["date"];
               $Video       =  $row1["video"];
            ?>

            <div class="video">
             <iframe style="width:65px;height:45px;" src="<?php echo $Video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
               <div class="Text">
                <h2><?php echo $Nom; ?></h2>
                <div class="videoText">
                <h4><?php echo $Commentaire; ?></h4> <p><?php echo $Date; ?></p> 
                </div>
               </div>
            </div> 

            <?php 
              $count++; 
               } //} 
            ?>  
    </div>
        
        <div class="posts">
            <?php 
               $sql2 = "SELECT v.id AS idVideo, v.video AS img_Video,v.commentaire,v.nom as nom,v.date, u.img AS user_img, u.Nom as Nom, u.Prenom as Prenom FROM video v JOIN user u ON u.id = v.idUser";
               $result = mysqli_query($conn,$sql2); 
              while($row = mysqli_fetch_assoc($result)){
                $idPoste = $row['idVideo'];
                // $idPoste = $row['idPoste'];
                $nom = $row["nom"];
                $commentaire = $row["commentaire"];
                $date = $row["date"];
                $video = $row["img_Video"];
                $Nom = $row["Nom"];
                $Prenom = $row["Prenom"];
                $img = $row["user_img"];
             ?>
         
          <div class="post">
              <div class="imgH">
                <img src="<?php echo $img ?>" alt="">
                <h2><?php echo $Nom ." ".$Prenom; ?></h2>
              </div>

              <h4 class="commentairePoste"> <?php echo $commentaire ?></h4>
              <iframe  class="imgPost" src="<?php echo $video?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            
              <div class="PostBas">
                    <div class="post1">
                      <form action="" method="post">
                      <!-- Remplacez $idPoste par la valeur de l'ID du poste -->
                      <input type="hidden" name="idp" value="<?php echo $idPoste ;?>"/>
                      <button class="" name="btn">
                          <i id="jaime" class="fa fa-thumbs-up fa-lg"></i>
                          <span></span>
                      </button>
                      <?php 
                      $sql3 = "SELECT count(*) as nbLike FROM likes WHERE idVideo=$idPoste";
                      $result3 = $conn->query($sql3);
                      $row3 = mysqli_fetch_assoc($result3);

                      echo $row3['nbLike'];
                      ?>
                     </form>
                    </div>
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
                <input type="hidden" name="idv" value="<?php echo $idPoste; ?>"/>
                <input type="submit" value="Post" class="btC" name="PostC">
                <input name="commentaire" id="" class="inpC" placeholder="entrer le commentaire"/>
                
              </form>
              <?php

               $sqlComments = "SELECT c.msg, u.Nom AS comment_nom ,u.img as img, u.Prenom AS comment_prenom 
               /* , DATE_FORMAT(u.date, '%H:%i:%s') as Date*/  FROM user u INNER JOIN commentaire c ON u.id = c.idUser
               where c.idVideo = $idPoste";
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
          <?php } ?>
        </div>

<script>
 const btnCArray = document.querySelectorAll('.btnC');
 const popupArray = document.querySelectorAll('.popupC');
 btnCArray.forEach((btnC,index) => {
    let popupOpened = false;
    btnC.addEventListener('click', function() {
      if(!popupOpened){ // if(popupOpened) <-- if(popupOpened == true) | if(!popupOpened) <-- if(popupOpened == flase)
        popupArray[index].style.display = "block";
        popupOpened=true;
      }else{
        popupArray[index].style.display = "none";
        popupOpened=false;
      }
    });
  });

</script>
    
</body>
</html>