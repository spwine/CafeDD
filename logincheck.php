<?php
include ("connect.php");

session_start();
$username = $_REQUEST['email'];  
$password = $_REQUEST['password'];
$error =  $noaccounterror = "";  
  
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "SELECT * FROM customer_profile where Email = '$username' and Password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
    } elseif($count==0){
        $sql = "SELECT * FROM customer_profile where Email = '$username'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $countemail = mysqli_num_rows($result);

        if($countemail==0){
            $_SESSION["email"] = $username;
            $_SESSION["noaccounterror"] = $noaccounterror;
            header("location: login.php");
        }else{  
            $_SESSION["email"] = $username;
            $_SESSION["error"] = $error;
           header("location: login.php");
       }    
    }  
    mysqli_close($conn);
     
?>