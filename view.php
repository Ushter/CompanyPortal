<?php
session_start();
$id =  $_SESSION['lname'];

?>
<html>
   <!DOCTYPE html>
   <title>view Project</title>
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link rel="stylesheet" type= "text/css" href="main.css">
   <style>
      h1{
      background-color: #4b4276;
      text-align: center;
      color: #fff;
      margin: 0;
      }
      main_content {
      max-width: 1000px;
      margin-right:auto;
      margin-left:auto;
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:100vh;
      }
      myTable {
      width:100%;
      border:1px solid ;
      }
      th {
      width:30%;
      background:#4b4276;
      padding:25px;
      color:#fff;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      }
      td {
      width:30%;
      padding:25px;
      background : #EEEEEE;
      }
   </style>
   <h1>Current Projects </h1>
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
         <div class="main_content">
            <?php
               include 'database.php';
               ?>
            <table class="myTable">
               <tr>
                  <th>Project ID</th>
                  <th>Name</th>
                  <th>Start date</th>
               </tr>
               <?php
                  $query = "SELECT p_id, project_name, start_date FROM project" ;
                  $result = mysqli_query($conn,$query);
                  
                  if (mysqli_num_rows($result) > 0) {
                  
                  $i=0;
                  while($row = mysqli_fetch_array($result)){
                  ?>
               <div class="container">
                  <div class="row">
                     <div class="col mb-3">
                        <tr>
                           <td><?php echo $row['p_id']; ?></td>
                           <td><?php echo $row['project_name']; ?></td>
                           <td><?php echo $row['start_date']; ?></td>
                        </tr>
                        <?php 
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </table>
         </div>
         <?php
            mysqli_free_result($result);
            }
            else{
            echo "No result found";
            }
            ?>
      </div>
   </body>
</html>