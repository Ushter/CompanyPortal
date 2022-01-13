<?php
include 'database.php';
$fname = "";
$lname = "";
$email = "";
$errors = 0;

$namee = $emaile = $passe = $confirme = $addre ="";
$zipe = $bdatee = $programe = $lnamee = "";

if(isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $addr = $_POST['addr'];
    $zip = $_POST['zip'];
    $bdate = $_POST['bdate'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $namee = $emaile = $passe = $confirme = $addre ="";
    $zipe = $bdatee = $programe = $lnamee = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['fname'])) {
    $namee = "first Name is required";
    $errors = 1;
  } 
  if (empty($_POST['lname'])) {
    $lnamee = " last Name is required";
    $errors = 1;
  } 

  if (empty($_POST['email'])) {
    $emaile = "Email is required";
    $errors = 1;
  } 
  if (empty($_POST['pass'])) {
    $passe = "Password is required";
    $errors = 1;
  } 
  if ($pass != $pass2) {
    $confirme = "does not match";
    $errors = 1;
  } 
  if (empty($_POST['addr'])) {
    $addre = "Address is required";
    $errors = 1;
  } 
  if (empty($_POST['zip'])) {
    $zipe = "Zip is required";
    $errors = 1;
  } 
  if (empty($_POST['bdate'])) {
    $bdatee = "Birth Date  is required";
    $errors = 1;
  } 
  if (empty($_POST['program'])) {
    $programe = "Program is required";
    $errors = 1;
  } 


    if($errors == 0){
        $password = md5($pass);
        $sql = "INSERT INTO employee (f_name, l_name, pass, address, zip, b_date, email, department) 
        Values ('$fname', '$lname', '$pass','$addr', '$zip', '$bdate', '$email', '$program')";

       mysqli_query($conn, $sql);
        echo '<script>alert("Registered")</script>';
    }else{
      echo '<script>alert("Not Registered")</script>';
    }
  }
}


?>
