<?php
require_once 'lib/base.php';
require_once 'services/requests.php';


class Auction extends Base{
    var $myDb = null;
    function __construct () {
        parent::__construct($this->myDb);
    }

    public function index() {
        $title = "Buy or List products/services";
        $deals = $this->recentDeals();
        return ['auction', [
            'title' => $title,
            'items' => $deals,
        ]];
    }

    public function post() {
        $title = "Buy or List products/services";
        $deals = $this->recentDeals();
        $id=$_SESSION['id'];
        $time_date=date("Y-m-d");
        $status=$_POST['status'];
        $bid=$_POST['bid'];
        $address=$_POST['address'];
        $category=$_POST['category'];
        $image_path = $this->myDb->real_escape_string('posts/'.$_FILES['image']['name']);
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
        
            if($this->myDb->query($sql) === true){
                $_SESSION['message']="Sucessful";
                header("location: /");
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

        return ['auction', [
            'title' => $title,
            'items' => $deals,
        ]];
    }

    public function query() {
        $title = "Search Result for:" . Request::get('q');
        $_SESSION["message"]='';
        $q = Request::get('q');
        $sql = "SELECT * FROM `status` WHERE `status` LIKE '%$q%'";
        $result = $this->myDb->query($sql);
         

        return ['auction', [
            'title' => $title,
            'items' => $result,
        ]];
    }

    function recentDeals() {
        $sql = 'SELECT * FROM status  ORDER BY `time_date` DESC';
        $q =  $this->myDb->query($sql);
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }
}