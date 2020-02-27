<?php
session_start();
include_once 'database.php';

/**
 * check user is login or not
 * @return boolean
 */
function is_login() {
    if (isset($_COOKIE['user_identifier']) && isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $user_identifier = $_COOKIE['user_identifier'];
        $dbh = new PDO("mysql:host=" . HOST . ";dbname=" . DB , USER , PASSWORD);
        $query = "SELECT * FROM users WHERE username=:username";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(":username", $username , PDO::PARAM_STR);
        $stmt->execute();
        $row_obj = $stmt->fetchObject();
        if ($row_obj->identifier === $user_identifier) {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $username;
            return TRUE;
        }else{
            return FALSE;
        }
    } else {
        if (isset($_SESSION['login']) && $_SESSION['login'] == 'true') {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/**
 * login user into phonebook
 * @global string $msg
 * @param type $username
 * @param type $password
 * @param type $remember
 */
function do_login($username, $password, $remember) {
    $dbh = new PDO("mysql:host=" . HOST . ";dbname=" . DB , USER , PASSWORD);
    $query = "SELECT * FROM users WHERE username=:username";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
        $row_obj = $stmt->fetchObject();
        if ($row_obj->password === md5($password)) {
            $_SESSION['login'] = 'true';
            $_SESSION['username'] = $row_obj->username;
            if ($remember) {
                $ip = $_SERVER['REMOTE_ADDR'];
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
                $salt = "a1b2c3d4e5f6g7h8i9j9k0lGmGn";
                $identifier = md5($user_agent . $ip . $salt);
                $query = "UPDATE users SET identifier=:identifier WHERE username=:username";
                $stmt = $dbh->prepare($query);
                $stmt->bindParam(":identifier", $identifier);
                $stmt->bindParam(":username", $username);
                $result = $stmt->execute();
                if ($result) {
                    setcookie('user_identifier', $identifier, time() + 3600);
                    setcookie('username', $username, time() + 3600);
                }
            }
            header("Location: index.php");
        } else {
            global $msg;
            $msg = "Username or Password is incorrect";
            header("Location: index.php");
        }
    }
}

if (isset($_POST['login'])) {
    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));
    if(isset($_POST['remember']) and $_POST['remember'] == 'on'){
		$remember = true;
	}else{
		$remember = false;
	}
    do_login($username, $password, $remember);
}
if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') {
    unset($_SESSION['login'], $_SESSION['username']);
    unset($_COOKIE['user_identifier']);
    unset($_COOKIE['username']);
    setcookie('user_identifier', '', -1);
    setcookie('username', '', -1);
    session_destroy();
    header("Location: index.php");
}