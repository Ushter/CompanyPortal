<?php 
   include 'controller_login.php';
   session_destroy();
   
   ?>
<html>
   <title> Register Page </title>
   <link rel="stylesheet" type= "text/css" href="style.css">
   </head>
   <body>
      <div class="area" >
         <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
         </ul>
      </div >
      <div class = "title">
         <h2>Welcome! </h2>
         <h2>Company Records </h2>
      </div>
      <form action="" method="post">
         <div class="form">
         <div class="subtitle">New Employee ? Let's create your account!</div>
         <div class="input-container ic1">
            <span style="color:#FF0000"><?php echo $namee; ?></span>
            <input name = "fname" id="fname" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
            <label for="fname" class="placeholder">First name</label>
         </div>
         <div class="input-container ic2">
         <span style="color:#FF0000"><?php echo $lnamee; ?></span>
         <input name = "lname" id="lname" class="input" type="text" placeholder=" " />
         <div class="cut"></div>
         <label for="lname" class="placeholder">Last name</label>
         <div class="input-container ic2">
         <span style="color:#FF0000"><?php echo $passe; ?></span>
         <input name = "pass" id="pass" class="input" type="text" placeholder=" " />
         <div class="cut"></div>
         <label for="Password" class="placeholder">Password </label>
         <div class="input-container ic2">
         <span style="color:#FF0000"><?php echo $confirme; ?></span>
         <input name = "pass2" id="pass2" class="input" type="text" placeholder=" " />
         <div class="cut"></div>
         <label for="Password" class="placeholder"> Confirm Password </label>
         <div class="input-container ic2">
         <span style="color:#FF0000"><?php echo $addre; ?></span>
         <input name = "addr" id="addr" class="input" type="text" placeholder=" " />
         <div class="cut"></div>
         <label for="addr" class="placeholder">Address </label>
         <div class="input-container ic2">
         <span style="color:#FF0000"><?php echo $zipe; ?></span>
         <input name = "zip" id="zip" class="input" type="text" placeholder=" " />
         <div class="cut"></div>
         <label for="zip" class="placeholder">Zip Code </label>
         <div class="input-container ic2">
            <span style="color:#FF0000"><?php echo $bdatee; ?></span>
            <input name = "bdate" id="bdate" class="input" type="Date" placeholder=" " />
            <div class="cut"></div>
            <label for="bdate" class="placeholder">Birth Date</label>
         </div>
         <div class="input-container ic2">
            <span style="color:#FF0000"><?php echo $emaile; ?></span>
            <input name = "email" id="email" class="input" type="text" placeholder=" " />
            <div class="cut cut-short"></div>
            <label for="email" class="placeholder">Email</>
         </div>
         <div class="input-container ic2">
            <span style="color:#FF0000"><?php echo $programe; ?></span>
            <input name = "program" id="program" class="input" type="text" placeholder=" " />
            <div class="cut cut-short"></div>
            <label for="program" class="placeholder">Department<label/>
         </div>
         <p>
            <a href ="login.php">Log In</a>
         </p>
         <button type = "submit" name="submit" class ="submit" > Register</button>
      </form>
   </body>
</html>