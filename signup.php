<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/signupstyle.css" />
    <title>Signup</title>
  </head>
  <body>
    <form action="form-process.php" method="post" class="signform">
      <label for="name">Name</label>
      <input type="text"
      value="<?php if(isset($_SESSION["name"])){ echo $_SESSION["name"];}?>"
      placeholder="John" name="name" required />

      <label for="lastname">Last name</label>
      <input type="text" 
      value="<?php if(isset($_SESSION["lastname"])){ echo $_SESSION["lastname"];}?>"
      placeholder="Smith" name="lastname" required />

      <label for="bdate">Date of Birth</label>
      <input type="date" 
      value="<?php if(isset($_SESSION["bdate"])){ echo $_SESSION["bdate"];}?>"
      placeholder="mm/dd/yyyy" name="bdate" required />

      <label for="email">Email</label>
      <input type="email" 
      value="<?php if(isset($_SESSION["email"])){ echo $_SESSION["email"];}?>"
      placeholder="john@mail.com" name="email" required />

      <?php
                    if(isset($_SESSION["emailerror"])){
                        
                        echo"<p class='wrong'>This email is already existed.</p>";
                        unset($_SESSION["emailerror"]);
                    }
      ?>

      <label for="tel">Mobile</label>
      <input type="tel" 
      value="<?php if(isset($_SESSION["tel"])){ echo $_SESSION["tel"];}?>"
      placeholder="0123456789" name="tel" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <label for="retypepassword">Retype Password</label>
      <input
        type="password"
        id="retypepassword"
        name="retypepassword"
        required
      />
      
      <?php
                    if(isset($_SESSION["passerror"])){
                        
                        echo"<p class='wrong'>Password does not match.</p>";
                        unset($_SESSION["passerror"]);
                    }
      ?>

      <div>
        <p>
          By signing up you agree Lorem ipsum dolor sit amet consectetur
          adipisicing elit.
        </p>
      </div>

      <button type="submit">Submit</button>
    </form>
  </body>
</html>
