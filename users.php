<link rel="stylesheet" href="css/form.css">

<?php
  $mysqli = new mysqli('localhost','root','password','accounts');
  $sql= ' SELECT firstname,surname,gender,email,avatar FROM users';
  $result = $mysqli->query($sql);

 ?>

<div id ="registered" >
<br><br><br><br>


  <span>All registered users</span><br>
  <?php
      while($row = $result->fetch_assoc())
      {
        echo "<div class='userlist'><span>$row[firstname] $row[surname]</span><br />";
        echo "<img src='$row[avatar]'></div>  ";
      }
   ?>
