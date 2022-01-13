<?php

session_start();
$id =  $_SESSION['lname'];
include 'database.php';

?>
<html>
   <!DOCTYPE html>
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
      margin: 0;
      }
      input[type=droptable], select {
      width: 100%;
      padding: 22px 20px;
      margin: 8px 4px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      input[type=submit] {
      width: 25%;
      background-color: #4b4276;
      color: #fff;
      padding: 22px 20px;
      margin: 8px 4px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }
      input[type=reset] {
      width: 10%;
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
      padding: 100px;
      }
   </style>
   <h1>Remove the completed projects </h1>
   <title>Remove Project</title>
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
                     <li><a href="remove.php">Complete Project</a></li>
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
            <form action="" method="POST">
               <select name ="drop" class = "custom-select" style = "width:200px;">
                  <option>Project List</option>
                  <?php
                     $query = "SELECT p_id, project_name, start_date
                     from project";   //You don't need a ; like you do in SQL
                     $res = mysqli_query($conn,$query);
                     if (mysqli_num_rows($res) > 0) {
                     
                     ?>
                  <?php
                     $i=0;
                     while($rows = mysqli_fetch_array($res)){
                     ?>
                  <option value ='<?= $rows['p_id']; ?>'>
                     <?= $rows['p_id']; ?> 
                     <p> - </p>
                     <?= $rows['project_name']; ?> 
                     <p> - </p>
                     <?= $rows['start_date'];?>
                  </option>
                  <?php
                     }
                     }
                     ?>
               </select>
               <input type="submit" name = "droptable" value="Complete"> 
               <br />
               <input type="reset" value="Clear">
            </form>
            <?php
               if(isset($_POST['droptable'])) {
               
                   $project = $_POST['drop'];
                   echo $project ,' Has been Dropped';
               
                  $sql = "DELETE FROM project where p_id = '$project'";
               
                       mysqli_query($conn, $sql);
                       header("location: remove.php");
               
               
               }
               ?>
         </div>
      </div>
   </body>
</html>