<?php
    function search(){
    if (isset($_POST['search'])) {
      $sts=1;
      $_SESSION["message"]='';
      $mysqli=new mysqli('localhost','root','password','accounts');
      $search=$_POST['search'];
      $sql = "SELECT * FROM `status` WHERE `status` LIKE '%$search%'";
      $result = $mysqli->query($sql);
         if ($result) {
           while ($row = $result->fetch_assoc()) {
             echo "<div class='userlist'><span>$row[status]</span><br>";
             echo "<a href=item.php?item_sid=",$row['sid'],">";
             echo "<img src ='$row[image]'></a><br>";
             echo "Bid Amount:$row[bid]</div>";

           }
         }
    }
}?>

<div id ="registered_search" >
<?php
function search_social_user(){
    echo "<span>Result for searched users</span><br>";
if (isset($_POST['search'])) {
  $_SESSION["message"]='';
  $mysqli=new mysqli('localhost','root','password','accounts');
  $search=$_POST['search'];
  $sql = "SELECT * FROM `users` WHERE `firstname` LIKE '%$search%' OR `surname` LIKE '%$search%'";
  $result = $mysqli->query($sql);
     if ($result) {
       while ($row = $result->fetch_assoc()) {
        $_SESSION['su_id'] = $row['id'];
         echo "<a target='_parent' href=user_profile.php?su_id=",$row['id'],">";
         echo "<div class='userlist'>$row[email]<br>";
         echo "<span>$row[firstname] $row[surname]</span>";
         echo "<img src='$row[avatar]'></div></a>  ";
       }
     }
}
}
?>
