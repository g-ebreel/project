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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Aza Sms.</h1> 
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        <a href="dashboard.php" class="btn btn-success">My Dashboard</a>
    </div>
    <div>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSmI82rDVQ19qHzzqmP3JH8aRsPrYRBf1yadlTSfy-co1UHqQCq">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRGJrTGWO7QXVgjp4joz3bBlGChUdNMhcU03F9piUDRDD1X9q5k">

    <img src="https://www.businesshotel-navi.com/wp-content/uploads/2019/03/bulk-sms.png">
  </div>
</body>
</html>