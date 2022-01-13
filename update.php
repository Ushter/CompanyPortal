
<html>
    <head>
        <title> Update 
             </title>
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
            <h2>Update page </h2>
            <h2>Page</h2>
        </div>
        <form action=" " method="post">
        <div class="form">
      <div class="input-container ic1">
          <?php
          include 'database.php';
          $id = $_GET['id'];
          echo $id;


          
          $shows = "select * from employee where emp_id ={$id}";

          $data = mysqli_query($conn, $shows);
          $select = mysqli_fetch_array($data);

          $fname = "";
          $lname = "";
          $email = "";
          if(isset($_POST['update'])) {
              $emp_id = $_GET['id'];
          
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $pass = $_POST['pass'];
              $pass2 = $_POST['pass2'];
              $addr = $_POST['addr'];
              $zip = $_POST['zip'];
              $bdate = $_POST['bdate'];
              $email = $_POST['email'];
              $program = $_POST['program'];
          

                  /*$sql = "INSERT INTO stu_reg (f_name, l_name, pass, address, zip, b_date, email, program) 
                  Values ('$fname', '$lname', '$pass','$addr', '$zip', '$bdate', '$email', '$prgram')";*/

                  $query = " UPDATE employee set f_name = '$fname', l_name = '$lname' , pass = '$pass', address = '$addr', zip = '$zip', b_date = '$bdate', email = '$email', department = '$program' where emp_id = $emp_id; ";
          
                  $ql= mysqli_query($conn, $query);
              
          }
          ?>
        <input name = "fname" id="fname" class="input" type="text" placeholder="" value= "<?php echo $select['f_name']; ?> "/>
        <div class="cut"></div>
        <label for="fname" class="placeholder ">First name</label>
      </div>
      <div class="input-container ic2">
        <input name = "lname" id="lname" class="input" type="text" placeholder=" " value= "<?php echo $select['l_name']; ?> "/>
        <div class="cut"></div>
        <label for="lname" class="placeholder">Last name</label>

        <div class="input-container ic2">
        <input name = "pass" id="pass" class="input" type="text" placeholder=" "  />
        <div class="cut"></div>
        <label for="Password" class="placeholder">Password </label>
        
        <div class="input-container ic2">
        <input name = "pass2" id="pass2" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="Password" class="placeholder"> Confirm Password </label>

        <div class="input-container ic2">
        <input name = "addr" id="addr" class="input" type="text" placeholder=" " value= "<?php echo $select['address']; ?> " />
        <div class="cut"></div>
        <label for="addr" class="placeholder">Address </label>

        <div class="input-container ic2">
        <input name = "zip" id="zip" class="input" type="text" placeholder=" "  value ="<?php echo $select['zip']; ?> " />
        <div class="cut"></div>
        <label for="zip" class="placeholder">Zip Code </label>

        <div class="input-container ic2">
        <input name = "bdate" id="bdate" class="input" type="Date" placeholder=" " value = " <?php echo $select['b_date']; ?>" />
        <div class="cut"></div>
        <label for="bdate" class="placeholder">Birth Date  </label>
        
      </div>
            <div class="input-container ic2">
        <input name = "email" id="email" class="input" type="text" placeholder=" " value = "<?php echo $select['email']; ?>"  />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>

      <div class="input-container ic2">
        <input name = "program" id="program" class="input" type="text" placeholder=" " value = "<?php echo $select['department']; ?>"  />
        <div class="cut cut-short"></div>
        <label for="program" class="placeholder">department</label>
      </div>
      
        <p>
            <a href ="profile.php">Back to profile</a>

        </p>
                <button type = "submit" name="update" class ="submit" >UPDATE</button>
        </form>
    </body>
</html>