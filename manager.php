<?php

session_start();

$id =  $_SESSION['lname'];
include 'database.php';

?>
<html>
   <!DOCTYPE html>
   <title>Manager Controls</title>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link rel="stylesheet" type= "text/css" href="main.css">
   <style>
      h2 {
      text-align: center;
      vertical-align: middle;
      }
      h1{
      background-color: #4b4276;
      text-align: center;
      color: #fff;
      margin: 0;}
      input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      input[type=date], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      input[type=submit]:hover {
      background-color: #45a049;
      }
      button[type=submit] {
      width: 100%;
      background-color: #4b4276;
      color: #fff;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }
      form {
      border-radius: 55px;
      padding: 10px;
      }
   </style>
   <h1>  Enter the salary </h1>
   <body>
      <div class="wrapper">
         <div class="sidebar">
            <h2><?php echo $_SESSION['lname'];  ?></h2>
            <h2><a href="landing.php" style="color:white"> Company Records</a></h2>
            <ul>
               <li><a href="profile.php"><i class="fas fa-user"></i>Profile</a></li>
               <li>
                  <a href="#"><i class="fas fa-address-card"></i>Project</a>
                  <ul>
                     <li><a href="view.php">View Project</a></li>
                     <li><a href="add.php">Add Project</a></li>
                     <li><a href="remove.php">Remove Project</a></li>
                  </ul>
               </li>
               <li><a href="#"><i class="fas fa-project-diagram"></i>Salary</a></li>
               <li><a href="manager.php">Manager Access only </a></li>
               <li><a href="salary_view.php">Salary Information </a></li>
               <li><a href="dependents.php"><i class="fas fa-project-diagram"></i>Dependents</a></li>
               <li><a href="acc.php"><i class="fas fa-blog"></i>Log out</a></li>
            </ul>
         </div>
         <?php  
            include 'database.php';
            
               ?>
         <div class="main_content">
            <form action=" " method="post">
               <div class="form">
                  <h3> Enter all the information </h3>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <div class="input-container ic1">
                     <label for="empid" class="placeholder ">Employee ID</label>
                     <input name = "empid" id="empid" class="input" type="text" placeholder=""/>
                     <div class="cut"></div>
                  </div>
                  <div class="input-container ic2">
                     <label for="salary" class="placeholder">Salary   </label>
                     <input name = "salary" id="salary" class="input" type="text" placeholder=" " />
                     <div class="cut"></div>
                  </div>
                  <div class="input-container ic2">
                     <label for="bonus" class="placeholder">Bonus percent </label>
                     <input name = "bonus" id="bonus" class="input" type="text" placeholder=" " />
                     <div class="cut"></div>
                  </div>
                  <button type = "submit" name="submit" class ="submit" >Submit</button>
               </div>
            </form>
         </div>
         <?php  
            if(isset($_POST['submit'])) {
              
                  $empid = $_POST['empid'];
                  $salary = $_POST['salary'];
            $bonus = $_POST['bonus'];
            $total = ($bonus * $salary)/100;
                  $sql = "INSERT INTO salary (emp_id, salary, bonus) 
                      Values ('$empid',  '$salary', '$total')";
            
                 
              
                      mysqli_query($conn, $sql);
                      echo 'Inserted the salary';
                  header("location: manager.php");
                  }
               ?>
      </div>
   </body>
</html>