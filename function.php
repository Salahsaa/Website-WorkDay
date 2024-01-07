<?php 
   
   require "connection.php";
//    session_start();
//   $id = $_SESSION["userid"];

   $idPoste = $_POST["idPoste"];
   $idUser  = $_POST["idUser"];
   $status  = $_POST["status"];

   $likess = mysqli_query($conn,"SELECT * from likes where  idUser = $idUser and idPoste = $idPoste ");
   if(mysqli_num_rows($likess) > 0 ){
     $likes = mysqli_fetch_assoc($likess); 
     if($likes['status'] == $status){
       mysqli_query($conn,"DELETE from likes where  idUser = $idUser and idPoste = $idPoste  ");
       echo "delete" . $status;
     }
     else{
      mysqli_query($conn,"UPDATE likes set  status = '$status' where  idUser = $idUser and idPoste = $idPoste  ");
      echo "changeto" . $status;
     }
   }
   else{
    mysqli_query($conn,"INSERT into  likes (idUSer,idPoste,status)  values ('$idUser','$idPoste','$status')");
      echo "new" . $status;
   }
?>
