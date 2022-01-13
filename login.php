<?php include 'login_user.php';
   ?>
<html>
   <head>
      <title> Login Page </title>
      <link rel="stylesheet" type= "text/css" href="login_page.css">
   </head>
   <body>
      <form action="" method="post">
         <div class="form">
            <div class="input-container ic1">
               <span style="color:#FF0000"><?php echo $usere; ?></span>
               <input name = "lname" id="lname" class="input" type="text" placeholder=" " />
               <div class="cut"></div>
               <label for="firstname" class="placeholder">User name</label>
            </div>
            <div class="input-container ic2">
               <span style="color:#FF0000"><?php echo $passe; ?></span>
               <input name ="pass" id="pass" class="input" type="text" placeholder=" " />
               <div class="cut"></div>
               <label for="pass" class="placeholder">Password</label>
            </div>
            <p>
               <a href ="acc.php">Register</a>
            </p>
            <button name = "submit" type="submit" class="submit">submit</button>
         </div>
      </form>
   </body>
</html>