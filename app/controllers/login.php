<?php
require_once  'lib/base.php';
require_once  'services/requests.php';

class Login extends Base {
    var $loginRequired = false;
    
    function __construct() {
        parent::__construct($this->loginRequired);
    }

    function index() {
        $req = Request::get();
        if ($req) {
            $this->tryLogin($req);
        }
        $view = 'login';
        $params = [];
        return [
            $view, $params
        ];
    }
    public static function logout() {
        session_start();
        session_destroy();
        header("location: /");
    }

    private function tryLogin() {
        $email = $this->myDb->real_escape_string($_POST['email']);
        $password = md5($this->myDb->real_escape_string($_POST['password']));

        //querry for log in if password and username matches
        $email = $this->myDb->escape_string($_POST['email']);
        $result = $this->myDb->query("SELECT * FROM `users` WHERE email='$email' or firstname='$email'");
        if ( $result->num_rows == 0 ){ // User doesn't exist
            $_SESSION['message'] = "User with that email doesn't exist!";
            $this->redirect('/error');
        }
        else { // User exists
            $user = $result->fetch_assoc();
            if ($password == $user['password']) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['avatar'] = $user['avatar'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['gender'] = $user ['gender'];

                // This is how we'll know the user is logged in
                $_SESSION['logged_in'] = true;
                echo " Congrats!";
                $this->redirect('/');
            }
            else {
                $_SESSION['message'] = "You have entered wrong password, try again!";
                $this->redirect('/login');
            }
        }


    }



}