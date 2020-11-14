<?php

require_once  'lib/base.php';
require_once  'services/requests.php';
class Register extends Base {
    var $loginRequired = false;
    var $myDb = null;
    function __construct() {
        parent::__construct($this->myDb);
    }

    function index() {
        $view = 'register';
        $params = [];
        return [
            $view, $params
        ];
    }

    function regist() {
        $req = Request::get();
    //password matches conformation
    if($req['password'] == $req['confirmpassword']) {
        $firstname = $this->myDb->real_escape_string($req['firstname']);
        $surname = $this->myDb->real_escape_string($req['surname']);
        $email = $this->myDb->real_escape_string($req['email']);
        $password = md5($req['password']); // md5 hash encription
        $gender = $this->myDb->real_escape_string($req['gender']);
        $avatar_path = $this->myDb-> real_escape_string('images/'.$_FILES['avatar']['name']);
    
        //match if file is images
        if  (preg_match("!image!",$_FILES['avatar']['type'])) {
            //copy image to image folder
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
                $_SESSION['firstname'] = $firstname;
                $_SESSION['surname'] = $surname;
                $_SESSION['avatar'] = $avatar_path;
                $_SESSION['email'] = $email;
                $_SESSION['gender'] = $gender;
                $sql = "INSERT INTO users (firstname, surname, email, password, gender, avatar)"
                        . "VALUES ('$firstname','$surname','$email','$password','$gender','$avatar_path')";
                $sql1= " SELECT * FROM users where email='$email'";//extract id for further edit
        
        
                //if querry is sucessful, redirect to welcome.php
                if($this->myDb->query($sql) === true) {
                    $_SESSION['message'] = "!!Registration Sucessful! Added $firstname $surname to database ! ";
                    $result=$this->myDb->query($sql1);
                    while ($ro = $result->fetch_assoc()) {
                        $temp_id=$ro['id'];
                        $_SESSION['id']=$temp_id;
                    }
                    //insert into profile nulls  !!pid primary key error
                    $iprofile="INSERT INTO `profile` (`pid`, `education`, `phoneno`, `bio`, `occupation`) VALUES ('$temp_id', '.....', '......', '......', '......')";
                    $result=$this->myDb->query($iprofile);
                    header("location:/");
                    echo "$_SESSION[message]";
                }
                else {
                $_SESSION['message'] = "!!Users couldnot be added to database";
                }
        
            }
            else {
                $_SESSION['message'] = "!!File upload failed!";
            }
        }
        else
            $_SESSION['message'] = "!!Please only Upload GIF, JPG, JPEG or PNG images";
        }
        $view = 'register';
        $params = [];
        return [
            $view, $params
        ];
    }



}