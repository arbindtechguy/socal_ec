<?php session_start(); ?>

<?php if (!isset($_SESSION['email'])):
 header("location:login.php")?>

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
        <li><a href="message.php">Messgae</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Account</a>
          <div class="dropdown-content">
            <a href="update_profile.php">Update Setting</a>
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









<?php
function social_user(){
  if (isset($_GET['su_id'])) {
    $su_id = $_GET['su_id'];
    $mysqli = new mysqli("localhost","root","password","accounts");
    $sql = "SELECT * FROM `users` WHERE id = '$su_id' ";
    $result = $mysqli->query($sql);
    while ($suser = $result->fetch_assoc()) {
      $_SESSION['su_firstname'] = $suser['firstname'];
      $_SESSION['su_surname'] = $suser['surname'];
      $_SESSION['su_email'] = $suser['email'];
      $_SESSION['su_avatar'] = $suser['avatar'];
      $_SESSION['su_id'] = $suser['id'];
      $_SESSION['su_gender'] = $suser ['gender'];
    }
    }
  }





social_user();

?>







<div class="body content">
  <div class="welcome">
   <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
   <span class="user">Welcome "<?= $_SESSION['su_firstname']?> <?= $_SESSION['su_surname']?>"</span></h2>

    <div id ="profile-pic" >
       <br><div class="userlist">
  <div class="profile_pic"><?php echo "<img src='$_SESSION[su_avatar]'>"."<br>"; ?>
  </div></div>

<?php echo "Email:"."$_SESSION[su_email]"."<br>"?>
<?php echo "Full Name:"."$_SESSION[su_firstname]"." "."$_SESSION[su_surname]"."<br>"?>
<?php echo "Gender : "."$_SESSION[su_gender]"."<br>" ?>
<?php echo "user id : ". "$_SESSION[su_id]" ?>
</div>
<hr>
<ul><li><a target='_parent' href="message.php?temp_id=<?php echo"$_SESSION[su_id]"; ?>">Message <?php echo "$_SESSION[su_firstname]"; ?></a><li>
<li><a href="mailto:<?php echo "$_SESSION[su_email]";?>?subject=feedback">email me</a></li>
<li><a href="#">Connect with <?php echo "$_SESSION[su_firstname]"; ?></a></li>

</ul>






<hr><br>

<?php
include 'xpfunction/status.php';
social_user_status();
 ?>











































</article>



</body>

</html>
