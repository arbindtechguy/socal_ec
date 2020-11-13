<?php session_start(); ?>
<?php if (!isset($_SESSION['email'])):
  header("location:login.php")?>
<?php endif; ?>
<?php

$mysqli=new mysqli('localhost','root','password','accounts');
$sid = $_SESSION['item_sid'];
$sql = "SELECT uid,firstname,comment,date,bid,surname FROM comment_view WHERE sid = $sid";
$result = $mysqli->query($sql);
while ($comment = $result->fetch_assoc()) {
  echo "<a target='_parent' href=user_profile.php?su_id=",$comment['uid'],">";
  echo "$comment[firstname] $comment[surname] :</a>";
  echo "$comment[comment]<br>";
  echo "Bid:$comment[bid]<br \>";
}
?>
