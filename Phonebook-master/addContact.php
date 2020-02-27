<?php

include_once 'database.php';
if (isset($_POST['add_contact'])) {
    $fname = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['fname'])));
    $lname = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['lname'])));
    $pnumber = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['pnumber'])));
    $group = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['group'])));
    $query = "INSERT INTO contacts(first_name , last_name , phone_number , group_id) VALUES('{$fname}' , '{$lname}' , '{$pnumber}' , {$group})";
    $result = mysqli_query($link, $query);
    header("Location: index.php");
} else {
    header('Location: index.php');
}