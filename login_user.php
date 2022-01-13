<?php
   include 'database.php';
   $errors= 0;
   $passe = $usere = "";
   
   
   if(isset($_POST['submit'])){
   
       $user = $_POST['lname'];
       $passwd = $_POST['pass'];
   
   
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           if (empty($_POST['fname'])) {
             $usere = "Username is required";
             $errors = 1;
           } 
           if (empty($_POST['lname'])) {
             $passe = " Password is required";
             $errors = 1;
           }else{
   
   
   
           $query = "SELECT l_name, pass FROM employee WHERE l_name = '$user' AND pass = '$passwd'";
           $result = mysqli_query($conn, $query);
           if (mysqli_num_rows($result) == 1){
               session_start();
               $_SESSION['lname'] = $user;
               $_SESSION['success'] = "You are Logged in";
               header("location: landing.php");
   
           }
           
           else{
   
               header("location: login.php");
           }
       
       }
   
   }
   }
   ?>