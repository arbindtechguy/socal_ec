
<?php
session_start();
ob_start();
?>


<?php if (!isset($_SESSION['email'])):
  header("location:login.php")?>
<?php endif; ?>
<?php


function get_message_rec(){
$mysqli = new mysqli('localhost','root','password','accounts');
$id = $_SESSION['id'];
$sender_id=$_SESSION['temp_id'];
$sql = "SELECT firstname,surname,message,message_date from users,message WHERE (message.sender_id = users.id ) AND
 (receiver_id=$id AND sender_id=$sender_id ); ";
$result = $mysqli->query($sql);
while ($message = $result->fetch_assoc()) {
  echo "$message[firstname] $message[surname]: ";
  echo "$message[message]";
  echo "<sub>$message[message_date]</sub><br>";
}
}
function get_message_send(){
$mysqli = new mysqli('localhost','root','password','accounts');
$id = $_SESSION['id'];
$sender_id=$_SESSION['temp_id'];
$sql = "SELECT firstname,surname,message,message_date from users,message WHERE (message.sender_id = users.id ) AND
 (receiver_id=$sender_id AND sender_id=$id ); ";
$result = $mysqli->query($sql);
while ($message = $result->fetch_assoc()) {
  echo "$message[firstname] $message[surname]: ";
  echo "$message[message]";
  echo "<sub>$message[message_date]</sub><br>";
}
}

if (isset($_SESSION['temp_id'])) {
  echo "<b>Inside ONE to ONE message"."<br></b>";
  get_message_rec();
   echo "<br><hr>";
  get_message_send();
}
else {
  echo "<b>All messages</b><br>";
  $mysqli = new mysqli('localhost','root','password','accounts');
  $id = $_SESSION['id'];
  $sql = "SELECT firstname,surname,message,message_date from users,message WHERE message.sender_id = users.id AND 
					(receiver_id= $id or sender_id =$id or sender_id =$_SESSION[id])";
  $result = $mysqli->query($sql);
  while ($message = $result->fetch_assoc()) {
    echo "$message[firstname] $message[surname]: ";
    echo "$message[message]";
    echo "<sub>$message[message_date]</sub><br>";
  }
}


?>
