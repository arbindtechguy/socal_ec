<?php session_start(); ?>

<?php if (!isset($_SESSION['email'])):
 header("location:login.php")?>

<?php endif; ?>

<?php if (!isset($_SESSION['id'])):

echo "hello";
?>

<?php endif; ?>


<head>
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
        <form action="" name="search" method="post">
        <input type="text" name="search" placeholder="Search.."></form>
      </ul>
      </header>

<div id="registered">
<?php
include 'xpfunction/search.php';
search();
 ?>




<div class="body content">
  <div class="welcome">
   <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
   <span class="user">Welcome "<?= $_SESSION['firstname']?> <?= $_SESSION['surname']?>"</span></h2>

    <div id ="profile-pic" >
       <br><div class="userlist">
  <div class="profile_pic"><?php echo "<img src='$_SESSION[avatar]'>"."<br>"; ?>
  </div></div>

<?php echo "Name:"."$_SESSION[firstname]"." "."$_SESSION[surname]"."<br>"?>
<?php echo "Email:"."$_SESSION[email]"."<br>"?>
<?php echo "Gender : "."$_SESSION[gender]"."<br>" ?>
<?php echo "user id : ". "$_SESSION[id]" ?>
</div>



<?php



$mysqli = new mysqli("localhost","root","password","accounts");

    $pid = $_SESSION['id'];
    $_SESSION['su_id']=$pid;
    $sql = "SELECT * FROM `profile` WHERE pid = '$pid'";
    $result = $mysqli->query($sql);
    while ($profile = $result->fetch_assoc()) {
      $_SESSION['education'] = $profile['education'];
      $_SESSION['phone'] = $profile['phoneno'];
      $_SESSION['bio'] = $profile['bio'];
      $_SESSION['occupation'] = $profile['occupation'];
    }
echo "Education Level:"."$_SESSION[education]"."<br>";
echo "Phone:"."$_SESSION[phone]"."<br>";
echo "Biography:"."$_SESSION[bio]"."<br>";
echo "Occupation:"."$_SESSION[occupation]"."<br>";

 ?>


 <?php
 include 'xpfunction/status.php';
 social_user_status();
  ?>



<hr><br>













































</article>



</body>

</html>
