<?php
session_start();
include "../include/db_con1.php";
if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name'])) { 
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

     $uname = validate($_POST['uname']);
     $pass = validate($_POST['password']);
     $name = validate($_POST['name']);

     $user_data = 'uname='. $uname. '&name='. $name;
     

     if (empty($uname)) {
        header("Location: ../pages/index.php?error=User Name is required&$user_data");
        exit();
     }else if (empty($pass)){
        header("Location: ../pages/index.php?error=Password is required&$user_data");
        exit();
     }
     else if (empty($name)){
        header("Location: ../pages/index.php?error=Name is required&$user_data");
        exit();
     }

     
     else {

       
        
        $sql = "SELECT * FROM login WHERE user_name='$uname' ";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
         header("Location: ../pages/index.php?error=The username is already taken&$user_data");
        exit();
          }
          else {
            $sql2 = "INSERT INTO login(user_name, password, name) VALUES ('$uname', '$pass', '$name')";
            $result2 = mysqli_query($conn,$sql2);
            if($result2) {
               header("Location: ../pages/index.php?success=Registration successful. You can now log in!&$user_data");
               exit();
            } 
            else {
               header("Location: ../pages/index.php?error=unknown error occured&$user_data");
               exit();
            }
          }
        
     }

}else {
    header("Location: ../pages/index.php?error");
    exit();
}




