<?php
session_start();
$id =  $_SESSION['lname'];

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
      .btn {
      color:white;
      background-color:#3a2b8a;
      cursor:pointer;
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
      width:20%;
      background:#4b4276;
      padding:25px;
      color:#fff;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.03em;
      }
      td {
      width:20%;
      padding:25px;
      background : #EEEEEE;
      }
      input[type=text], select {
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
   </style>
   <body>
      <h1> Company Records </h1>
      <div class="wrapper">
         <div class="sidebar">
            <h2><?php echo $_SESSION['lname'];  ?></h2>
            <h2>Company Records </h2>
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
               include 'login_user.php';
   
               $id = $_SESSION['id'];
               ?>
            <head>
               <title> Salary</title>
            </head>
            <form action="" method="post">
               <div class="container">
                  <div class="row">
                     <div class=" col mb-3">
                        <label for="relation">View Pay</label>
                        <input type="text" class="form-control" name="pays" placeholder ="Enter Password Here">
                     </div>
                     <button type = "submit" name="pay_btn" class ="btn" >view</button>
                  </div>
               </div>
            </form>
            <br />
            <br />
            <br />
            <br />
            <table class="myTable">
               <tr>
                  <th>Employee ID </th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>department</th>
                  <th>Salary</th>
                  <th>Bonus</th>
               </tr>
               <?php
                  $fname = "";
                  $lname = "";
                  $errors = array();
                  
                  if(isset($_POST['pay_btn'])) {
                  
                      $pay = $_POST['pays'];
                      
                          $sql = "SELECT employee.f_name, employee.l_name, employee.department, salary.salary, salary.bonus
                          FROM employee
                          INNER JOIN salary on employee.emp_id = salary.emp_id
                          where salary.emp_id = $id and employee.pass = '$pay'";
                          $result = mysqli_query($conn, $sql);
                  
                          if (mysqli_num_rows($result) > 0) {
                              $i=0;
                              while($row = mysqli_fetch_array($result)){
                  ?>
               <div class="container">
                  <div class="row">
                     <div class="col mb-3">
                        <tr>
                           <td><?php echo $id ?></td>
                           <td><?php echo $row['f_name']; ?></td>
                           <td><?php echo $row['l_name']; ?></td>
                           <td><?php echo $row['department']; ?></td>
                           <td><?php echo $row['salary']; ?></td>
                           <td><?php echo $row['bonus']; ?></td>
                        </tr>
                        <?php }
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
            echo "Incorrect Password";
            }
            }
            ?>
      </div>
   </body>
</html>