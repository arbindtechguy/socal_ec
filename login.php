<?php
session_start();
$_SESSION["message"]="";
$mysqli = new mysqli("localhost","root","password","accounts");
if ($_SERVER["REQUEST_METHOD"]=='POST') {


  $email=$mysqli->real_escape_string($_POST['email']);
  $password=md5($mysqli->real_escape_string($_POST['password']));
  //$password = md5('somerandomtextthatyouknow'.$_POST['password']);
  //querry for log in if password and username matches
  $email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM `users` WHERE email='$email' or firstname='$email'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    include 'update_profile.php';
    profile();
    $user = $result->fetch_assoc();
    if ( $password== $user['password'] ) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['avatar'] = $user['avatar'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['gender'] = $user ['gender'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        echo " Congrats!";
        header("location: home.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }

}


}



?>


<html>
<title>login</title>
<body>
  <link rel="stylesheet" href="form.css" type="text/css">
  <div class="body-content">
    <div class="module">


   <h1>Loigin to your account</h1>
<form action="login.php" method="post" autocomplete="on">
   Username<br>
   <input type="text" placeholder="email or phone no.." name= "email" required>
   <br>
   password:<br>
   <input type="password"placeholder="******" name="password" required>
   <br><br>
   <input type="submit" value="Login" name="login" class="btn btn-block btn-primary">
   <br><br><br>
</form>
</div>
   Its free and always will be <a href="form.php"><h3>Sign Up</a><h3> if you Dont have a account


</div>
</body>
</html>
