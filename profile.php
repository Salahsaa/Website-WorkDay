<?php
ini_set('display_errors', 0);
?>

<?php
require "connection.php";
session_start();
$id_get = $_GET['id'];
//var_dump($id_get);
$id_sess = $_SESSION["userid"];
//var_dump($id_sess);

$addAmi = $_POST["addAmi"]; 
    if(isset($addAmi)){
        $req = "insert into invitation(idSf,idSt) values ('$id_sess', '$id_get')";
        $result = mysqli_query($conn,$req);
    }
    
$sql = "select * from user where id =$id_get"; 
$result1 = $conn->query($sql);
$row1 = mysqli_fetch_assoc($result1);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




//ajouter notifivation
// $id_get = $_GET['id'];


?>
<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
</head>
<body>
    
             <header>
                <h1 class="h1">WorkDay</h1>
                <div class="search">
                    <input type="text" class="text" placeholder="search for people,places and things">
                    <img  src="recherche-profil-Acc.svg" class="imgs" alt="">
                </div>
                
                <a href="accueil.php"><img src="<?php echo $row1["img"]; ?>" class="img" alt=""></a>
             </header>
            <section>
                <div class="parent" style="position:relative">
                    <div class="child child1" >
                        <?php if($id_get!=$id_sess){?>
                            <?php 
                                $sql = "SELECT * from amis where idSf =$id_get and idSt =$id_sess or  idSf =$id_sess and idSt =$id_get"; 
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0 ){ ?>
                                <div class="add" style="position:absolute; bottom: 60px; right: 20px; color: white; z-index:99">vous etes amis</div>
                                <?php }else{ 
                                     $sql2 = "SELECT * from invitation where idSf =$id_get and idSt =$id_sess or  idSf =$id_sess and idSt =$id_get"; 
                                     $result2 = mysqli_query($conn,$sql2);
                                     if(mysqli_num_rows($result2) > 0 ){ 
                                    ?>
                                          <div class="add" style="position:absolute; bottom: 60px; right: 20px; color: white; z-index:99">invitation en attente</div>
                        
                                    <?php }else{ 
                                        ?>
                                        <form action="#" method="post">
                                            <div class="add" style="position:absolute; bottom: 60px; right: 20px; color: white; z-index:99">
                                            <input type="submit" value=" ajouter ami" class="addAmi" name='addAmi'> 
                                            </div>
                                        </form>
                                    <?php }
                                } ?>

                        
                            <?php } ?>
                                     <img src="<?php echo $row1['imgProfile']; ?>" alt="hada mahowa hada hh" class="img1">
                                     <img src="<?php echo $row1['img']; ?>" alt="" class="img2">
                                     <h2 class="h2"><?php echo $row1['Prenom']." ".$row1['Nom']; ?></h2>
                    </div>
                    <div class="child child2">
                        <ul>
                            <li>Timeline</li>
                            <li>About</li>
                            <li>Friends</li>
                            <li>Photos</li>
                            <li>Settings</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section>
                <div class="DivPrt">
                    
                    <div class="DivCld cld1">
                        <h1 class="h1">Amis</h1>
                        <hr id="hr">
                       <?php
                    //    $sql3 = "SELECT u.Nom as nom , u.Prenom as prenom , u.img as img , u.pays as pays
                    //    FROM amis a INNER JOIN user u ON a.idSf = u.id
                    //    WHERE (a.idSf = $id_get AND a.idSt = $id_sess)
                    //    OR (a.idSf = $id_sess AND a.idSt = $id_get)";
                    //  $result3 = mysqli_query($conn, $sql3);
                    $sql3 = "SELECT u.id,u.Nom as nom , u.Prenom as prenom , u.img as img , u.pays as pays FROM user u INNER JOIN amis a ON a.idSt=u.id WHERE a.idSf=$id_get";
                   
                      $result3 = mysqli_query($conn, $sql3);
                       while($row3 = mysqli_fetch_assoc($result3)){
                            $img    =  $row3["img"];
                            $nom    =  $row3["nom"];
                            $prenom =  $row3["prenom"];
                            $pays   =  $row3["pays"];
                           
                       ?>
                         <div class="divPcld">
                            <img src="<?php echo $img; ?>" class="imgD" alt="">
                            <div class="dC">
                                <h2 class="h2D"><?php echo $nom ." ". $prenom;  ?></h2>
                            <p class="pD"> <?php echo $pays; ?>, User  </p>
                            </div>
                        </div>
                        <?php } ?>
 

                    </div>

                    <div class="DivCld cld2">
                        <?php if($id_get==$id_sess){?>
                            <div class="divChld c1">
                              <form action="accueil.php?idP=<?php echo $id_sess; ?>" method="post" enctype="multipart/form-data">
                                <input type="text" name="text" class="txtC1" placeholder="Whats in your mind?">
                                <input type="submit" name="btn1" class="btnC1" value="Post">
                                <input type="file"  name="file" class="file">
                              </form>
                           
                    
                            </div>
                        <?php }?>
                       
                       
                    <div class="divChldPart">
                     <?php
                               $sqlP = "select p.img as img , u.Nom as nom , u.Prenom as prenom , p.text as text from post p , user u where u.id = p.idUser and  p.idUser=$id_sess ";
                               $resultP = mysqli_query($conn,$sqlP);
                               while( $rowP = mysqli_fetch_assoc($resultP)){
                               $imgp  = $rowP["img"];
                               $textp = $rowP["text"];
                               $nomu = $rowP["nom"];
                               $prenomu = $rowP["prenom"];
                               
                              ?>
                        <div class="divChld c2">
                             
                            <img src="./ImageStory/<?php echo $imgp;  ?>" class="imgC2" alt="">
                            <div class="dcld2">
                                <h2 class="h2C2"><?php echo $nomu ." ".$prenomu ?></h2>
                                <p class="pC2"><?php echo $textp; ?></p>
                                <!-- <hr id="hR"> -->
                            </div>         
                        </div> 
                        <?php } ?>      
                    </div>
                  
                      
                    </div>
                      
                </div>
            </section>
             
</body>
</html>