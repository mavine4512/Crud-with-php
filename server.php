<?php
    session_start();
    $db = new mysqli ('localhost', 'root', '', 'crud');

   // initialize variables
   $name ="";
   $address ="";
   $id = 0;
   $update =false;

   if (isset($_POST['save'])) {
$name = $_POST['name'];
$address = $_POST['address'];
mysqli_query($db, "INSERT INTO info (name,address)values('$name','$address')");

$_SESSION['message'] ="address saved";
header('location:index.php');
   }  
   //update batton
   if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $address = $_POST['address'];
   
      mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
      $_SESSION['message'] = "Address updated!"; 
      header('location: index.php');
   }
   //delete
   if (isset($_GET['del'])) {
      $id = $_GET['del'];
      mysqli_query($db, "DELETE FROM info WHERE id=$id");
      $_SESSION['message'] = "Address deleted!"; 
      header('location: index.php');
   }
?>