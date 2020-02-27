<!-- <?php
$x = 9;
$y = 10;

if ($x >= $y){
    echo $x >= $y;
    echo "by how much";

}elseif($y >=$x){
    echo $y % $x;

}elseif($x < $y){
    echo $x * $y;

}elseif($y <$x){
    echo $y / $x;

}else{
    echo "nothing matches";
} 
?>

<?php

$servername="localhost";
$username="root";
$password="jamal001";
$database="azahub";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database  
);
if (!$conn){
    echo please connect;
}
?>