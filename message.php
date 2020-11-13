<?php
session_start();
ob_start();
if(!isset($_SESSION['id'])){
header("location: login.php");
}

?>




<?php
if (isset($email)){
  include 'xpfunction/get_id_from_email_@home.php';

}
?>


<?php
$_SESSION["message"]='';
$_SESSION['item_sid']='';
$mysqli=new mysqli('localhost','root','password','accounts');

if (isset($_POST['pst'])) {
  //if ($_SERVER["REQUEST_METHOD"]=='POST') {
  $id=$_SESSION['id'];
  $time_date=date("Y-m-d");
  $status=$_POST['status'];
  $bid=$_POST['bid'];
  $address=$_POST['address'];
  $category=$_POST['category'];
  $image_path = $mysqli-> real_escape_string('posts/'.$_FILES['image']['name']);
  if  (preg_match("!image!",$_FILES['image']['type'])){

    if (copy($_FILES['image']['tmp_name'], $image_path)) {
      $_SESSION['time_date'] = $time_date;
      $_SESSION['status'] = $status;
      $_SESSION['bid'] = $bid;
      $_SESSION['address'] = $address;
      $_SESSION['category'] = $category;
      $_SESSION['image'] = $image_path;

      $sql = "INSERT INTO status (id, time_date,status,bid , location, category, image)"
      . "VALUES ('$id','$time_date', '$status', '$bid', '$address','$category','$image_path')";

      if($mysqli->query($sql) === true){
        $_SESSION['message']="Sucessful";
        header("location: home.php");
      }
      else {
        $_SESSION['message']="!!Failed uploading status";
      }
    }
  }
  else {
    $_SESSION['message']="!Invalid post image!!"."<br>"."!!Please only Upload GIF, JPG, JPEG or PNG images";
  }
  echo "$_SESSION[message]";
}


?>

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
          <a href="update_profile.php">Update Setting</a>
          <a href="#">Setting</a>
          <a href="logout.php">Log Out</a>
        </div>
      </li>
      <form  name="search" method="post">
        <input type="text" name="search" placeholder="Search.."></form>
      </ul>
    </header>




    <nav class="message">
<iframe src="message_senders.php" width="330px" height="100%" scrolling="yes">  </iframe>

    </nav>
    <nav class="right">
      <h2>Online Users</h2>
    <iframe src="users.php" width="200px" height="100%" scrolling="yes">  </iframe>
    </nav>





    <article class="main">
        <?php if (isset($_POST['search'])):
          include 'xpfunction/search.php';
          search_social_user(); ?>

        <?php endif; ?>



        <?php
            if (isset($_GET['temp_id'])) {
                echo "<h2>Send Message to User Id: $_GET[temp_id]</h2>";
                $_SESSION['temp_id'] = $_GET['temp_id'];
            }else{
                echo "<h1>Select User to send Message!!</h1>";
                //unset($_SESSION['temp_id']);
            }
        ?>
          <iframe src="message_view.php" width="500px" height="400px" scrolling="yes"></iframe>

          <form class="form" name="message" action="message.php" method="post" enctype="multipart/form-data" autocomplete="off">
 <input type="message" name="message_data" placeholder=" ">
  <input type="submit" name="i_message" value="Send"><br>
           </form>


        <?php
        function send_message(){
        $mysqli=new mysqli('localhost','root','password','accounts');
      if (isset($_POST['i_message'])) {
        $message_data = $_POST['message_data'];
        $timeofmessage = date("Y-m-d");
        $sender_id = $_SESSION['id'];
        $receiver_id = $_SESSION['temp_id'];
        $sql = "INSERT INTO `message` (`sender_id`, `receiver_id`, `message_date`, `message`)
        VALUES ('$sender_id', '$receiver_id', '$timeofmessage', '$message_data');";
        if($mysqli->query($sql) === true){
         header("location:message.php");
        }

      }
      }





        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          send_message();
        }


         ?>




































            </article>



          </body>
          </html>
