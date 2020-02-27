<?php
include_once 'database.php';
if(isset($_POST['add_group'])){
    $group_name = mysqli_real_escape_string($link , strip_tags(htmlspecialchars($_POST['group'])));
    $query = "INSERT INTO groups( group_name ) VALUE('{$group_name}')";
    mysqli_query($link, $query);
    header("Location: index.php");
}else{
    header('Location: index.php');
}
