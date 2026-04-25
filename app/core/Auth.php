<?php

require_once '../app/config/database.php';

class Auth {

    public static function check(){
        if(!isset($_SESSION['user_id'])){
            header ("Location: index.php?url=login");
            exit;
            }
    }

    public static function isAdmin(){
        return iseet($_SESSION['role']) && $_SESSION['role'] == 'admin';
    }

    public static function isCashier(){
        return isset($_SESSION['role']) && $_SESSION['role'] == 'cashier';
    }
}