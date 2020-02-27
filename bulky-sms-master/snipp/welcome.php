<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!-- <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style> -->
</head>
<body>
    
    <?php
    require_once "/opt/lampp/htdocs/Snipp_Bilky/snipp/startbootstrap-sb-admin-2-gh-pages/g.php"?>
    
</body>
</html>