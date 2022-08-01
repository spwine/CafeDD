<?php

// $name = $_POST["name"];
// $message = $_POST["message"];
// $priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
// $type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
// $terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

// if ( ! $terms) {
//     die("Terms must be accepted");
// }   
session_start();
include ("connect.php");

$first_name = $_REQUEST['name'];
$last_name = $_REQUEST['lastname'];
$bdate = $_REQUEST['bdate'];
$email = $_REQUEST['email'];
$tel = $_REQUEST['tel'];
$password = $_REQUEST['password'];
$repassword = $_REQUEST['retypepassword'];
$emailerror =$passerror = "";  

// Check email
$sql ="SELECT * FROM customer_profile WHERE Email='$email'";

    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  


    if($count != 0){  
        $_SESSION["name"] = $first_name;
        $_SESSION["lastname"] = $last_name;
        $_SESSION["bdate"] = $bdate;
        $_SESSION["tel"] = $tel;
        $_SESSION["emailerror"] = $emailerror;
        header("location: signup.php");  
    } 
    // Check tyoing password
    else{
        if($password!=$repassword){
            $_SESSION["name"] = $first_name;
            $_SESSION["lastname"] = $last_name;
            $_SESSION["bdate"] = $bdate;
            $_SESSION["tel"] = $tel;
            $_SESSION["email"] = $email;
            $_SESSION["passerror"] = $passerror;
            header("location: signup.php");
        } 
        else{
        $sql = "INSERT INTO customer_profile (Name, Lastname, Email, Tel, Password, Bdate)
         VALUES ('$first_name', '$last_name', '$email', '$tel', '$password', '$bdate')";

        if(mysqli_query($conn, $sql)){
            header("location: thankusign.html");  
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
 
        // Close connection
        mysqli_close($conn);
    }
} 

        

?>

