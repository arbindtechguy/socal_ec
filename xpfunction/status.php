<?php
function status(){
     $mysqli = new mysqli('localhost','root','password','accounts');
     $sql = 'SELECT * FROM status';
     $result = $mysqli->query($sql);
 ?>
<div id="registered">



<?php
      while ($ro = $result->fetch_assoc()) {
        echo "<div class='userlist'><span>$ro[status]</span><br>";
        echo "<a href=item.php?item_sid=",$ro['sid'],">";
        echo "<img src ='$ro[image]'></a><br>";
        echo "Bid Amount:$ro[bid]<br>";
        echo "sid="."$ro[sid]</div>";
      }
}
?>

<?php
function recent_deals(){
     $mysqli = new mysqli('localhost','root','password','accounts');
     $sql = 'SELECT * FROM status  ORDER BY `time_date` DESC';
     $result = $mysqli->query($sql);
 ?>
<div id="registered">



<?php
      while ($ro = $result->fetch_assoc()) {
        echo "<div class='userlist'><span>$ro[status]</span><br>";
        echo "<a href=item.php?item_sid=",$ro['sid'],">";
        echo "<img src ='$ro[image]'></a><br>";
        echo "Bid Amount:$ro[bid]<br>";
        echo "sid="."$ro[sid]</div>";
      }
}
?>
<?php
function social_user_status(){
     $su_id=$_SESSION['su_id'];
     $mysqli = new mysqli('localhost','root','password','accounts');
     $sql = "SELECT * FROM status WHERE id='$su_id' ";
     $result = $mysqli->query($sql);
 ?>
<div id="registered">



<?php
      while ($ro = $result->fetch_assoc()) {
        echo "<div class='userlist'><span>$ro[status]</span><br>";
        echo "<a href=item.php?item_sid=",$ro['sid'],">";
        echo "<img src ='$ro[image]'></a><br>";
        echo "Bid Amount:$ro[bid]<br>";
        echo "sid="."$ro[sid]</div>";
      }
}
?>

<?php
function status_services(){
     $mysqli = new mysqli('localhost','root','password','accounts');
     $sql = 'SELECT * FROM status WHERE category="services"';
     $result = $mysqli->query($sql);
 ?>
<div id="registered">



<?php
      while ($ro = $result->fetch_assoc()) {
        echo "<div class='userlist'><span>$ro[status]</span><br>";
        echo "<a href=item.php?item_sid=",$ro['sid'],">";
        echo "<img src ='$ro[image]'></a><br>";
        echo "Bid Amount:$ro[bid]<br>";
        echo "sid="."$ro[sid]</div>";
      }
}
?>
<?php
function status_product(){
     $mysqli = new mysqli('localhost','root','password','accounts');
     $sql = 'SELECT * FROM status WHERE category="product"';
     $result = $mysqli->query($sql);
 ?>
<div id="registered">



<?php
      while ($ro = $result->fetch_assoc()) {
        echo "<div class='userlist'><span>$ro[status]</span><br>";
        echo "<a href=item.php?item_sid=",$ro['sid'],">";
        echo "<img src ='$ro[image]'></a><br>";
        echo "Bid Amount:$ro[bid]<br>";
        echo "sid="."$ro[sid]</div>";
      }
}
?>
