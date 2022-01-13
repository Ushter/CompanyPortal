                      <?php

session_start();
echo $_SESSION['lname'];
$id =  $_SESSION['lname'];
$emp = $_SESSION['id'];
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
   <h1>Assign Projects </h1>
   <title>Assign Project</title>
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
               <select name ="project" class = "custom-select" style = "width:200px;">
                  <option>Project List</option>
                  <?php

                     $query = "SELECT p_id
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
                  </option>
                  <?php
                     }
                     }
                     ?>
               </select>
               <input type="submit" name = "assign" value="Complete"> 
               <br />
               <input type="reset" value="Clear">
            </form>
            <?php
               if(isset($_POST['assign'])) {
               
                   $project = $_POST['project'];
                   echo $project ,' Has been assigned';
               
                  $sql = "INSERT INTO assigned (p_id, emp_id)
                  Values ('$project',  '$emp')";
               
                       mysqli_query($conn, $sql);
                       header("location: assign.php");
               
               
               }
               ?>
            <table class="myTable">
               <tr>
                  <th>Project Name</th>
                  <th>Employee Name</th>
               </tr>
               <?php
                  $query = "SELECT project.project_name, employee.f_name FROM project 
                  inner join assigned on project.p_id = assigned.p_id
                  Inner join employee on employee.emp_id = assigned.emp_id" ;
                  $result = mysqli_query($conn,$query);
                  
                  if (mysqli_num_rows($result) > 0) {
                  
                  $i=0;
                  while($row = mysqli_fetch_array($result)){
                  ?>
               <div class="container">
                  <div class="row">
                     <div class="col mb-3">
                        <tr>
                           <td><?php echo $row['project_name']; ?></td>
                           <td><?php echo $row['f_name']; ?></td>
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
      </div>
   </body>
</html>