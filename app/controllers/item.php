<?php
require_once 'lib/base.php';
require_once 'lib/auth.php';
require_once 'services/requests.php';

class Item extends Base {
    var $myDb = null;
    function __construct () {
        parent::__construct($this->myDb);
    }

    public function index() {
        $sid = Request::query('id');
        if ($i_comments = Request::post('i_comment')) {
            $comment_data = Request::post('comment_data');
            $bid = Request::post('bid');
            $this->postComments($sid, $i_comments, $comment_data, $bid);
        }
        $title = "Profile";
        $item = $this->itemDetails($sid);
        $uid = $item['id'];
        $posts = $this->getUserPosts($uid);
        $user = $this->userDetails($uid);
        $comments = $this->getComments($sid);
        return ['item', [
            'title' => $title,
            'item' => $item,
            'user' => $user,
            'comments' => $comments,
            'sid' => $sid,
            'items' => $posts,
        ]];
    }
    
    function getComments($sid) {
        $sql = "SELECT uid,firstname,comment,date,bid,surname FROM comment_view WHERE sid = $sid";
        $q   =  $this->myDb->query($sql);
        return  mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    function getUserPosts($sid) {
        $sql = 'SELECT * FROM status WHERE id=' . $sid;
        $q   =  $this->myDb->query($sql);
        return  mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    function userDetails($id) {
        $sql = "SELECT * FROM `users` WHERE id = $id";
        $q =  $this->myDb->query($sql);
        return $q->fetch_assoc();
    }

    function itemDetails($id) {
        $sql = "SELECT * FROM `status` WHERE sid = $id";
        $q =  $this->myDb->query($sql);
        return $q->fetch_assoc();
    }

    

    function postComments($sid, $i_comments, $comment_data, $bid_value) {
        $timeofcomment = date("Y-m-d");
        $uid = Auth::checkLogin();
        $sid = $_SESSION['item_sid'];
        $sql = "INSERT INTO `comment` (`uid`, `sid`, `date`, `comment`, `bid`) "
                . "VALUES ('$uid', '$sid', '$timeofcomment', '$comment_data', '$bid_value')";
        if($this->myDb->query($sql) === true){
            $this->redirect("/item?id=" . $sid);
        }
    }
    
}