<?php session_start(); ?>
<?php
if (isset($email)){
  include 'xpfunction/get_id_from_email_@home.php';}?>

<link rel="stylesheet" href="css/main.css" type="text/css">
<!DOCTYPE HTML>
<html>

<title>E-commerse</title>
<body>
  <header class="index">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="message.php">Message</a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Account</a>
        <div class="dropdown-content">
          <a href="update_profile.php">Update Profile</a>
          <a href="#">Setting</a>
          <a href="logout.php">Log Out</a>
        </div>
      </li>
      <form  name="search" method="post">
        <input type="text" name="search" placeholder="Search.."></form>
      </ul>
    </header>
    <div id="registered">

<?php
      include 'xpfunction/search.php';;
      if (search()) {
      }
?>



 <?php

function profile(){
  $mysqli = new mysqli("localhost","root","password","accounts");

      $pid = $_SESSION['id'];
      $sql = "SELECT * FROM `profile` WHERE pid = '$pid'";
      $result = $mysqli->query($sql);
      while ($profile = $result->fetch_assoc()) {
        $_SESSION['education'] = $profile['education'];
        $_SESSION['phone'] = $profile['phoneno'];
        $_SESSION['bio'] = $profile['bio'];
        $_SESSION['occupation'] = $profile['occupation'];
      }

}



$mysqli = new mysqli("localhost","root","password","accounts");

    profile();
    $pid = $_SESSION['id'];

 	if( isset($_POST['update_education']) )
 	{ $updateeducation = $_POST['updateeducation'];
 		$sql  = "UPDATE profile SET `education`='$updateeducation' WHERE pid='$pid'";
 		$result = $mysqli->query($sql);
    profile();
 	}
  if( isset($_POST['update_phone']) )
  { $updatephone = $_POST['updatephone'];
    $sql  = "UPDATE profile SET `phoneno`='$updatephone' WHERE pid='$pid'";
    $result = $mysqli->query($sql);
    profile();
  }
  if( isset($_POST['update_bio']) )
  { $updatebio = $_POST['updatebio'];
    $sql  = "UPDATE profile SET `bio`='$updatebio' WHERE pid='$pid'";
    $result = $mysqli->query($sql);
    profile();
  }
  if( isset($_POST['update_occupation']) )
  { $updateoccupation = $_POST['updateoccupation'];
    $sql  = "UPDATE profile SET `occupation`='$updateoccupation' WHERE pid='$pid'";
    $result = $mysqli->query($sql);
    profile();
  }

 ?>
 <form class="form" action="update_profile.php" method="POST">
 Education: <input type="normaltext" name="updateeducation" value="<?php echo "$_SESSION[education]"; ?>"> <input name="update_education" type="submit" value=" Update "/><br>
</form>
<form class="form" action="update_profile.php" method="POST">
</form>
<form class="form" action="update_profile.php" method="POST">
 Phone no: <input type="normaltext" name="updatephone" value="<?php echo "$_SESSION[phone]"; ?>"> <input name="update_phone" type="submit" value=" Update "/><br>
</form>
<form class="form" action="update_profile.php" method="POST">
 Bio: <input type="normaltext" name="updatebio" value="<?php echo "$_SESSION[bio]"; ?>"> <input name="update_bio" type="submit" value=" Update "/><br>
</form>
<form class="form" action="update_profile.php" method="POST">
 Occupation: <input type="normaltext" name="updateoccupation" value="<?php echo "$_SESSION[occupation]"; ?>"> <input name="update_occupation" type="submit" value=" Update "/><br>

 </form>








































</article>

          </body>
          </html>
