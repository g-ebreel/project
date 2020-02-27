<?php
$filename = "config.php";
if(file_exists($filename)){
    include_once 'config.php';
    $dbh = new PDO("mysql:host=" . HOST . ";dbname=" . DB , USER , PASSWORD);
    $groups_query = "CREATE TABLE IF NOT EXISTS groups("
            . "id INT(2) NOT NULL AUTO_INCREMENT,"
            . "group_name VARCHAR(32) NOT NULL DEFAULT 'untitled',"
            . "PRIMARY KEY(id)"
            . ")";
    $dbh->query($groups_query);
    $contacts_query = "CREATE TABLE IF NOT EXISTS contacts("
            . "id INT(3) NOT NULL AUTO_INCREMENT,"
            . "first_name VARCHAR(32) DEFAULT NULL,"
            . "last_name VARCHAR(32) DEFAULT NULL,"
            . "phone_number VARCHAR(32) NOT NULL,"
            . "group_id INT(2) NOT NULL DEFAULT 0,"
            . "PRIMARY KEY(id),"
            . "FOREIGN KEY (group_id) REFERENCES contacts(id) ON DELETE NO ACTION ON UPDATE NO ACTION"
            . ")";
    $dbh->query($contacts_query);
    $user_query = "CREATE TABLE IF NOT EXISTS users("
            . "id INT(1) NOT NULL AUTO_INCREMENT,"
            . "username VARCHAR(32) NOT NULL,"
            . "password VARCHAR(32) NOT NULL,"
            . "identifier VARCHAR(32),"
            . "ip VARCHAR(32),"
            . "last_login DATETIME,"
            . "PRIMARY KEY (id)"
            . ")";
    $dbh->query($user_query);
    header("Location: setup-user.php");
}else{
    echo 'configuration is not successfully';
}