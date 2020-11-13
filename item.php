<?php session_start();
?>
<link rel="stylesheet" href="css/main.css" type="text/css">

<?php
  function DisplayItemDetails(){
  $sid = $_GET['item_sid'];
  $mysqli=new mysqli('localhost','root','password','accounts');
  $sql= " SELECT * FROM `status` WHERE sid=$sid";
  $result = $mysqli->query($sql);
  while ($item = $result->fetch_assoc()) {
    $_SESSION['item_status'] = $item['status'];
    $_SESSION['item_img'] = $item['image'];
    $_SESSION['item_id'] = $item['id'];
    $_SESSION['item_sid'] = $item['sid'];
    $_SESSION['item_bid'] = $item['bid'];
    $_SESSION['item_location'] = $item['location'];
    $_SESSION['item_category'] = $item['category'];
    $_SESSION['item_post_time'] = $item['time_date'];
  }
}

  function PostComment(){
  $mysqli = new mysqli('localhost','root','password','accounts');
if (isset($_POST['i_comment'])) {
  $comment_data = $_POST['comment_data'];
  $bid_value = $_POST['bid'];
  $timeofcomment = date("Y-m-d");
  $uid = $_SESSION['id'];
  $sid = $_SESSION['item_sid'];
  $sql = "INSERT INTO `comment` (`uid`, `sid`, `date`, `comment`, `bid`) "
         . "VALUES ('$uid', '$sid', '$timeofcomment', '$comment_data', '$bid_value')";
  if($mysqli->query($sql) === true){
    header("location:item.php");
  }

}
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['item_sid'])) {
    DisplayItemDetails();
  }
  else {
    $_GET['item_sid'] = $_SESSION['item_sid'];
    DisplayItemDetails();
  }

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  PostComment();
}





 ?>


<!DOCTYPE HTML>
<html>

<title>E-commerse</title>
<body>
  <header class="index">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="message.php">Messae</a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Account</a>
        <div class="dropdown-content">
          <a href="update_profile.php">Update Setting</a>
          <a href="#">Setting</a>
          <a href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
    </header>



<nav>
<ul>
<li><a href="#">Recent deals</a></li>
<li><a href="#">Top viewed</a></li>
<li><a href="#">Contact_us</a></li>
<li><a href="#">Categories</a></li>
<li><a href="#">test</a></li>
<li><a href="#">test</a></li>
</ul>
</nav>


    <nav class="right">
    <h2>Top deals</h2>
    <iframe src="form.css" width="200" height="100%" scrolling="yes">

    </iframe>
    </nav>





<article class="main">


<div id="registered">
   <link rel="stylesheet" href="form.css">


<div id ="profile-pic" >
   <br><div class="userlist">
<div class="profile_pic">
  <?php echo "<img src='$_SESSION[item_img]'>"."<br>"; ?>
</div></div>

</div>
</div>
<br>
<h1>Item details</h1>
<?php
      echo "Item name:"."$_SESSION[item_status]"."<br>";
      echo "Item ID:"."$_SESSION[item_id]"."<br>";
      echo "Item SID:"."$_SESSION[item_sid]"."<br>";
      echo "BID range:"."$_SESSION[item_bid]"."<br>";
      echo "Location:"."$_SESSION[item_location]"."<br>";
      echo "Category:"."$_SESSION[item_category]"."<br>";
      echo "Posted date:"."$_SESSION[item_post_time]"."<br>";
 ?>

 <br \><br \><br \><br \>
<h1>Item provider details</h1>
<?php
  $id =$_SESSION['item_id'];
  $mysqli=new mysqli('localhost','root','password','accounts');
  $sql= " SELECT * FROM `users` WHERE id=$id";
  $result = $mysqli->query($sql);
  while ($user = $result->fetch_assoc()) {
      echo "User ID:"."$user[id]"."<br>";
      echo "Seller Name:";
      echo "<a target='_parent' href=user_profile.php?su_id=",$user['id'],">";
      echo "$user[firstname] $user[surname]"."<br></a>";
      echo "Email:"."$user[email]"."<br>";
  }
 ?>



<h1>Bid or Comment</h1>

  <form class="form" name="comment" action="item.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <input type="comment" name="comment_data" placeholder="I want this deal">
  <input type="bid" name="bid" placeholder="$***">
  <input type="submit" name="i_comment" value="Comment"><br>
  <iframe src="comments.php" width="300px" height="250px" scrolling="yes">
</form>

















</article>




<footer>Designed by 1nh15cs018</footer>

</body>
</html>
