<?php
include_once 'database.php';
if(isset($_POST['edit_group'])){
    $group_id = $_GET['group_id'];
    $group_name = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['group_name'])));
    $query = "UPDATE groups SET group_name='{$group_name}' WHERE id={$group_id}";
    $result = mysqli_query($link, $query);
    header("Location: index.php");
}else{
    header('index.php');
}