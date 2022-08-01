<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=Public+Sans:wght@700&family=Quicksand:wght@300;400;500&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <title>Login</title>
  </head>
  <body>
    <h1>Login/Sign up</h1>

    <form action="logincheck.php" method="post" class="form">
      <label for="email">Email</label>
      <input type="email" 
      value="<?php if(isset($_SESSION["email"])){ echo $_SESSION["email"]; unset($_SESSION["email"]);}?>" 
      name="email" placeholder="john@mail.com"  required/>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required/>

      <style>
        .wrong {
          font-family: 'Public Sans', sans-serif;
          color: red;
          text-align: center;
        }
      </style>
      <?php
                    if(isset($_SESSION["error"])){
                        
                        echo"<p class='wrong'>Wrong </p>";
                        unset($_SESSION["error"]);
                    }

                    elseif(isset($_SESSION["noaccounterror"])){
                        
                        echo"<p class='wrong'>Please create account </p>";
                        unset($_SESSION["noaccounterror"]);
                    }
      ?>

      <button type="submit">Login</button>
      <a href="signup.php">Signup</a>
    </form>
  </body>
</html>

