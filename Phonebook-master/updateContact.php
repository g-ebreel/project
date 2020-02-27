<?php
include_once 'database.php';
if(isset($_POST['edit_contact'])){
    $fname = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['fname'])));
    $lname = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['lname'])));
    $pnumber = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['pnumber'])));
    $group = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['group'])));
    $contact_id = $_GET['contact_id'];
    $query = "UPDATE contacts SET first_name='{$fname}' , last_name='{$lname}' , phone_number='{$pnumber}' , group_id={$group} WHERE id={$contact_id}";
    $result = mysqli_query($link, $query);
    header("Location: index.php");
}else{
    header('index.php');
}