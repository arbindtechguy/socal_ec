<?php session_start(); ?>
<link rel="stylesheet" href="css/main.css" type="text/css">
<div id ="registered_search" >

<?php
function message_users(){
    echo "<span>Message</span><br>";
  $_SESSION["message"]='';
  $id = $_SESSION['id'];
  $mysqli=new mysqli('localhost','root','password','accounts');
  $sql = "SELECT distinct firstname,surname,avatar,message,sender_id FROM message,users WHERE (message.sender_id = users.id) AND receiver_id = $id
           group by firstname";
  $result = $mysqli->query($sql);
     if ($result) {
       while ($message = $result->fetch_assoc()) {
        $_SESSION['sender_id'] = $_SESSION['id'];
        echo "<a target='_parent' href=message.php?temp_id=",$message['sender_id'],">";
        echo "<div class='userlist'>";
        echo "<span>$message[firstname] $message[surname]</span>";
        echo "<img src='$message[avatar]'></div></a>  ";

       }
     }
}
message_users();
?>
