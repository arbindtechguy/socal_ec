<?php session_start(); ?>
<?php
function get_id(){
  $mysqli=new mysqli('localhost','root','password','accounts');
  $user_email=$_SESSION['email'];
  $sql = "SELECT * FROM `users` WHERE `email` = '$user_email'";
  $result = $mysqli->query($sql);
     if ($result) {
       while ($row = $result->fetch_assoc()) {
         $_SESSION['id'] = $row['id'];
       }
     }
}
get_id();

  ?>
