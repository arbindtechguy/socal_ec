<?php

require_once  'lib/base.php';
require_once  'lib/auth.php';
require_once  'services/requests.php';
class Profile extends Base {
    var $loginRequired = false;
    var $myDb = null;
    function __construct() {
        parent::__construct($this->myDb);
        $this->user_id = Auth::checkLogin();
    }

    function index() {
        $view = 'profile';
        $uid = $this->user_id;
        $posts = $this->getUserPosts($uid);
        $profile = $this->getProfile($uid);
        return [
            $view, [
                'profile' => $profile,
                'items' => $posts,
            ]
        ];

    }

    function regist() {
        $req = Request::get();

        return [
            $view, $params
        ];
    }

    function getProfile($id) {
        $sql1 = "SELECT * FROM `users` WHERE id = '$id' ";
        $sql2 = "SELECT * FROM `profile` WHERE pid = '$id'";
        $q1 =  $this->myDb->query($sql1);
        $q2 =  $this->myDb->query($sql2);
        $suser =  $q1->fetch_assoc();
        $ouser =  $q2->fetch_assoc();
        $profile = array_merge($suser, $ouser);
        return $profile;

    }

    function getUserPosts($sid) {
        $sql = 'SELECT * FROM status WHERE id=' . $sid;
        $q   =  $this->myDb->query($sql);
        return  mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    function userProfile() {
        $su_id = Request::get('su_id');
        $sql1 = "SELECT * FROM `users` WHERE id = '$su_id' ";
        $sql2 = "SELECT * FROM `profile` WHERE pid = '$su_id'";
        $q1 =  $this->myDb->query($sql1);
        $q2 =  $this->myDb->query($sql2);
        $suser =  $q1->fetch_assoc();
        $ouser =  $q2->fetch_assoc();
        $profile = array_merge($suser, $ouser);
        $posts = $this->getUserPosts($su_id);

        $view = 'profile';
        return [
            'profile', [
                'profile' => $profile,
                'items' => $posts,

            ]
        ];

    }



}