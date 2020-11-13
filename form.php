<link rel="stylesheet" href="form.css">
<div class="alert alert-error">
  <strong>
    <h2>
<?php
session_start();
$_SESSION['message']='';
$mysqli = new mysqli('localhost','root','password','accounts');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //password matches conformation
  if($_POST['password'] == $_POST['confirmpassword']) {
    $firstname = $mysqli->real_escape_string($_POST['firstname']);
    $surname = $mysqli->real_escape_string($_POST['surname']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); // md5 hash encription
    $gender = $mysqli->real_escape_string($_POST['gender']);
    $avatar_path = $mysqli-> real_escape_string('images/'.$_FILES['avatar']['name']);

    //match if file is images
    if  (preg_match("!image!",$_FILES['avatar']['type'])){
      //copy image to image folder
      if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['avatar'] = $avatar_path;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;


        $sql = "INSERT INTO users (firstname, surname, email, password, gender, avatar)"
                . "VALUES ('$firstname','$surname','$email','$password','$gender','$avatar_path')";


        $sql1="SELECT * FROM users where email='$email'";//extract id for further edit


                //if querry is sucessful, redirect to welcome.php
        if($mysqli->query($sql) === true){
          $_SESSION['message'] = "!!Registration Sucessful! Added $firstname $surname to database ! ";
          $result=$mysqli->query($sql1);
          while ($ro = $result->fetch_assoc()) {
              $temp_id=$ro['id'];
              $_SESSION['id']=$temp_id;
          }
          //insert into profile nulls  !!pid primary key error
          $iprofile="INSERT INTO `profile` (`pid`, `education`, `phoneno`, `bio`, `occupation`) VALUES ('$temp_id', '.....', '......', '......', '......')";
          $result=$mysqli->query($iprofile);
            header("location:home.php");
          echo "$_SESSION[message]";
         }
        else {
          $_SESSION['message'] = "!!Users couldnot be added to database";
        }

      }
      else{
        $_SESSION['message'] = "!!File upload failed!";
      }
    }
    else
      $_SESSION['message'] = "!!Please only Upload GIF, JPG, JPEG or PNG images";
    }

  else {
    $_SESSION['message'] = "!!Both password donot match"."<br>"."Enter same password!";
  }
}
?>


<?php
echo "$_SESSION[message]";

?></div></strong></h2>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      Firstname:
      <input type="text" placeholder="First name" name="firstname" required />
      Surname:
      <input type="text" placeholder="Surname" name="surname"/>
      Email:
      <input type="email" placeholder="Email" name="email" required />
      password:
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      confirm password:
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
          <input type="radio" name="gender" value="male" checked> Male
          <input type="radio" name="gender" value="female"> Female
          <input type="radio" name="gender" value="other"> Prefer not to say <br>
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*"  /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
