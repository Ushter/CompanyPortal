<?php

include 'login_user.php';
session_start();
$id =  $_SESSION['lname'];
?>
<html>
   <head>
      <title> Dependents</title>
   </head>
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
      input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      }
      button[type=submit]:hover {
      background-color: #857ca2;
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
      <h1><a href="landing.php" style="color:white"> Company Records</a> </h1>
      <div class="wrapper">
         <div class="sidebar">
            <h2><?php echo $_SESSION['lname'];  ?></h2>
            <h2>Dependents</h2>
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
            echo $_SESSION['id'];
            $id = $_SESSION['id'];
            //$result = mysqli_query($conn,"SELECT dependents.f_name, dependents.l_name,dependents.b_date, dependents.email, dependents.relation, employee.emp_id FROM dependents
            //inner join employee on dependents.emp_id = employee.emp_id
            //where dependents.emp_id = $id");
            
            ?>
         <div class="main_content">
            <table class="myTable">
               <tr>
                  <th>Dependent ID </th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Date of Birth</th>
                  <th>Email</th>
                  <th>Relationship</th>
               </tr>
               <?php
                  $query = "SELECT dep_id,relation, f_name, l_name, b_date, email
                  from dependent
                  where emp_id = $id "; //You don't need a ; like you do in SQL
                  $result = mysqli_query($conn,$query);
                  
                  if (mysqli_num_rows($result) > 0) {
                  
                  $i=0;
                  while($row = mysqli_fetch_array($result)){
                  ?>
              
                  <div class="container">
                     <div class="row">
                        <div class="col mb-3">
                           <tr>
                              <td><?php echo $row['dep_id']; ?></td>
                              <td><?php echo $row['f_name']; ?></td>
                              <td><?php echo $row['l_name']; ?></td>
                              <td><?php echo $row['b_date']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['relation']; ?></td>
                           </tr>
                           <?php }
                              ?>
                        </div>
                     </div>
                  </div>
            </table>
            <?php
               mysqli_free_result($result);
               }
               else{
               echo "No result found";
               }
               ?>
            <?php
               $query = "SELECT dep_id, l_name
               from dependent  
               where emp_id = '$id' ";
               $res = mysqli_query($conn,$query);
               if (mysqli_num_rows($res) > 0) {
               
               ?>
            <form action="" method="POST">
            <p>Delete Dependents </p>
            <select name ="drop" class = "custom-select" style = "width:200px;">
            <option>Select Dependent</option>
            <?php
               $i=0;
               while($rows = mysqli_fetch_array($res)){
               ?>
            <option value ='<?= $rows['dep_id']; ?>'><?= $rows['dep_id']; ?> <p> - </p> <?= $rows['l_name']; ?></option>
            <?php
               }
               }
               ?>
            </select>
            <br />
            <input type="submit" name = "drop_table" value="Drop"><input type="reset" value="Clear">
            </form>
            
            <?php
               if(isset($_POST['drop_table'])) {
                  
               
                   $course = $_POST['drop'];
                   echo $course ,' Has been Dropped';
                   $sql = "DELETE FROM dependent where dep_id = '$course'";
                   echo "<meta http-equiv='refresh' content='0'>";
               
                       mysqli_query($conn, $sql);
                       
               }
               ?>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
           
            <form action="" method="post">
            <div class="container">
            <div class="row">
            <div class="col mb-3">
            <label for="last_name">Employee ID:</label>
            <input type="text" class="form-control" name="emp_id" value="<?= $id ?>" >
            </div>
            <div class="col mb-3">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="fname">
            </div>
            <div class=" col mb-3">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="lname" >
            </div>
            <div class=" col mb-3">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" >
            </div>
          
            <div class=" col mb-3">
            <label for="relation">Relation</label>
            <input type="text" class="form-control" name="relation">
            </div>
			  <div class=" col mb-3">
            <label for="b_date">Date Of Birth:</label>
            <input type="DATE" class="form-control" name="bdate">
            </div>
            <button type = "submit" name="update" class ="btn" >Update</button>
            </div>
            </div>
            </form>
            <?php
               $fname = "";
               $lname = "";
               $errors = array();
               
               
               if(isset($_POST['update'])) {
               
                   $emp_id = $id;
                   $fname = $_POST['fname'];
                   $lname = $_POST['lname'];
                   $email = $_POST['email'];
                   $bdate = $_POST['bdate'];
                   $relation = $_POST['relation'];
                   
                       $sql = "INSERT INTO dependent (emp_id, relation,f_name, l_name, b_date, email) 
                       Values ('$emp_id','$relation','$fname', '$lname',  '$bdate','$email')";
               
                       mysqli_query($conn, $sql);
                       
               
                       echo 'Inserted Dependents';
                       echo "<meta http-equiv='refresh' content='0'>";
                       
                   
                 }
               
               
               ?>
        
      </div>
      </div>  
   </body>
</html>