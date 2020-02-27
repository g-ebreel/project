<?php
include_once 'database.php';
if(isset($_GET['remove_group']) && $_GET['remove_group'] == 'true'){
    $group_id = $_GET['group_id'];
    $query = "DELETE FROM groups WHERE id = {$group_id}";
    mysqli_query($link, $query);
    header("Location: index.php");
}else{
    header('Location: index.php');
}