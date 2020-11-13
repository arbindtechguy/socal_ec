</div>
<?php
include 'connection.php';

session_start();
ob_start();
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
          <a href="update_profile.php">Update Details</a>
          <a href="#">Setting</a>
          <a href="logout.php">Log Out</a>
        </div>
      </li>
      <form  name="search" method="post">
        <input type="text" name="search" placeholder="Search.."></form>
      </ul>
    </header>




    <nav>
      <ul>
        <li><a href="recent_delas.php">Recent deals</a></li>
        <li><a href="#">Top viewed</a></li>
        <li><a href="#">Contact_us</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Category</a>
          <div class="dropdown-content">
            <a href="services.php">Services</a>
            <a href="product.php">Product</a>
          </div>
        </li>
        <br><br>
        <li><a href="#">test</a></li>
        <li><a href="#"> Another test</a></li>

      </ul>
    </nav>


    <nav class="right">
      <h2>Top Users</h2>
      <iframe src="users.php" width="200" height="100%" scrolling="yes">



      </iframe>
    </nav>





    <article class="main">
      <table style="width:100%">
        <tr>
          <th>
            <form class="form" name="pst" action="home.php" method="post" enctype="multipart/form-data" autocomplete="off">
              list something:  <br><input type="radio" name="category" value="product" checked> product
              <input type="radio" name="category" value="services"> services
              <input type="file" name="image" accept="image/*"
              <h1><input type="normaltext" name="status" placeholder="#Name" required></h1>
              <input type="normaltext" placeholder="Address" name= "address" required>
              <input type="normaltext" placeholder="$bid-range" name= "bid" required>
              <input type="submit" value="post" name="pst" class="btn btn-block btn-primary">
            </form>
          </th></tr></table>


          <div id="registered">

            <?php



            include 'xpfunction/status.php';
            include 'xpfunction/search.php';
            echo"<b>";
            if (search()) {
            }echo"</b>";
              status();




              ?>











































            </article>




            <footer>Designed by 1nh15cs018</footer>

          </body>
          </html>
