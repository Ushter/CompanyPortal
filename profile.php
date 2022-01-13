<?php
include_once 'controller_login.php';
session_start();
$id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM employee where emp_id = $id");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type= "text/css" href="main.css">
<style>
  
</style>

<div class="wrapper">
  <div class="sidebar">
    <h2><?php echo $_SESSION['lname'];  ?></h2>
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
    <div class="header">Employee Profile</div>
 <head>
 <title> Employee Profile </title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<?php
$i=0;
$row = mysqli_fetch_array($result)
?>
<form>
<div class="container">
<div class="row">
<div class="col mb-3">
    <label for="last_name">ID:</label>
     <input type="text" class="form-control" name="s_id" value="<?= $row['emp_id']; ?>"  disabled>
    </div>
  <div class="col mb-3">
    <label for="last_name">Last Name:</label>
     <input type="text" class="form-control" name="last_name" value="<?= $row['l_name']; ?>"  disabled>
    </div>
    <div class=" col mb-3">
     <label for="first_name">First Name:</label>
     <input type="text" class="form-control" name="first_name" value="<?= $row['f_name']; ?>" disabled>
     </div>
     <div class=" col mb-3">
     <label for="email">Email:</label>
     <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>" disabled>
    </div>
    <div class=" col mb-3">
     <label for="Address">Address:</label>
     <input type="text" class="form-control" name="addr" value="<?= $row['address']; ?>" disabled>
    </div>
     <div class=" col mb-3">
     <label for="b_date">Date Of Birth:</label>
     <input type="DATE" class="form-control" name="b_date" value="<?= $row['b_date']; ?>" disabled>
     </div>
     <div class=" col mb-3">
     <label for="b_date">Department</label>
     <input type="text" class="form-control" name="program" value="<?= $row['department']; ?>" disabled>
     </div>
     <a href="update.php?id=<?php echo $row['emp_id'] ?>">UPDATE</a>
     
</div>
</div>
</form>



 <?php
}
else{
    echo "No result found";
}
?>


 </body>
</html>