<?php session_start(); ?>
<?php if (!isset($_SESSION['email'])):
  header("location:login.php")?>
<?php endif; ?>
<?php

$mysqli = new mysqli('localhost','root','password','accounts');
$id = $_SESSION['id'];
$sql = "SELECT * FROM users,message WHERE message.sender_id=users.id AND message.sender_id=$id";
$result = $mysqli->query($sql);
while ($message = $result->fetch_assoc()) {
  echo "$message[firstname] $message[surname]: ";
  echo "$message[message]";
  echo "<h6>$message[message_date]</h6><br>";
}
?>
