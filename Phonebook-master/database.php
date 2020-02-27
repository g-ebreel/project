<?php
$filename = 'admin-setup/config.php';
if(file_exists($filename)){
    include 'admin-setup/config.php';
}
$link = mysqli_connect(HOST , USER , PASSWORD , DB);
if(mysqli_connect_errno()){
    printf("connection failed %s\n" , mysqli_connect_errno());
    exit();
}
mysqli_select_db($link , DB);