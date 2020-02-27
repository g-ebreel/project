<?php
include_once 'database.php';
if(isset($_GET['remove_contact']) && $_GET['remove_contact'] == 'true'){
    $contact_id = $_GET['contact_id'];
    $query = "DELETE FROM contacts WHERE id = {$contact_id}";
    mysqli_query($link, $query);
    echo $contact_id;
    header("Location: index.php");
}else{
    header('Location: index.php');
}