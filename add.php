<?php

session_start();
$id =  $_SESSION['lname'];
include 'database.php';

?>

<html>
   <!DOCTYPE html>
   <title>Add Projects</title>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link rel="stylesheet" type= "text/css" href="main.css">
   <style>
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
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      }
      h1{
      background-color: #4b4276;
      text-align: center;
      color: #fff;
      margin: 0;}
   </style>
   <h1><a href="landing.php" style="color:white"> Company Records</a> </h1>
   <body>
      <div class="wrapper">
         <div class="sidebar">
            <h2><?php echo $_SESSION['lname'];  ?></h2>
            <h2> Company Records </h2>
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
         <div class="main_content">

            <form action=" " method="post">
               <div class="form">
                  <div class="input-container ic1">
                     <label for="pname" class="placeholder ">Project name</label>
                     <input name = "pname" id="pname" class="input" type="text" placeholder=""/>
                     <div class="cut"></div>
                  </div>
                  <div class="input-container ic2">
                     <label for="sdate" class="placeholder">Start Date  </label>
                     <input name = "sdate" id="bdate" class="input" type="Date" placeholder=" " />
                     <div class="cut"></div>
                  </div>
                  <button type = "submit" name="submit" class ="submit" >Submit</button>
               </div>
            </form>
           <a href="assign.php"><i class="fas fa-blog"></i>Assign Project</a>
         </div>
         <?php  
            if(isset($_POST['submit'])) {
              
                  $pname = $_POST['pname'];
                  $sdate = $_POST['sdate'];
                  $sql = "INSERT INTO project (project_name, start_date) 
                      Values ('$pname',  '$sdate')";
            
                 
              
                      mysqli_query($conn, $sql);
                      echo 'Inserted New Project';
                  header("location: add.php");
                  }
               ?>
      </div>
     
   </body>
</html>