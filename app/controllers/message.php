<?php
require_once 'lib/base.php';
require_once 'lib/auth.php';
require_once 'services/requests.php';

class Message extends Base {
    var $user_id = null;
    function __construct () {
        parent::__construct();
        $this->user_id = Auth::checkLogin();
    }

    function index() {
        $view = 'message';
        $users = $this->allUsers();
        $receiver_id = Request::get('id');
        $receiver = null;
        $messages = null;

        $sender = $this->getUser($this->user_id);
        if ($receiver_id) {
            $messages = $this->getMessage($this->user_id, $receiver_id);
            $receiver = $this->getUser($receiver_id);
            if ($message_data = Request::post('message')) {
                $this->send_message($this->user_id, $receiver_id, $message_data);
            }
        }

        $vars = [
            'users' => $users,
            'receiver' => $receiver,
            'sender' => $sender,
            'messages' => $messages,
            'sender_id' => $this->user_id,
        ];
        return [$view, $vars];
    }

    function allUsers() {
        $sql = 'SELECT * FROM users where id != ' . $this->user_id;
        $q   =  $this->myDb->query($sql);
        return  mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    function getUser($id) {
        $sql = "SELECT * FROM `users` WHERE id = '$id' ";
        $q =  $this->myDb->query($sql);
        return $q->fetch_assoc();
    }

    function getMessage($sender_id, $receiver_id) {
        $sql = "SELECT * FROM message, users where (users.id = message.sender_id OR users.id = receiver_id) and users.id = $receiver_id";
        $q = $this->myDb->query($sql);
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    function send_message($sender_id, $receiver_id, $message_data) {
        $mysqli=new mysqli('localhost','root','','accounts');
        $timeofmessage = date("Y-m-d");
        $sql = "INSERT INTO `message` (`sender_id`, `receiver_id`, `message_date`, `message`) VALUES ('$sender_id', '$receiver_id', '$timeofmessage', '$message_data');";
        if($mysqli->query($sql) === true){
            $this->redirect('/message?id=' . $receiver_id);
        }
      }
    
}