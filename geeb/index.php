<?php
include_once('config.php'); // call database login details page

if(isset($_POST['save'])) {

    $name = strip_tags($_POST['username']);
    $phone = strip_tags($_POST['phone']);
    $town = strip_tags($_POST['town']);

    $query = "INSERT INTO my_contacts(name,phonenumber,town) VALUES('$name', '$phone', '$town')";
    $result = mysql_query($query);

    if($result) {
       echo "Data successfully stored!";
    }
    else {
       echo "Data was NOT saved!";
       echo "<p> Query: ' $query  ' </p>";
    }
}

$query = "SELECT * from my_contacts";
$result = mysql_query($query);
echo "<h3>My Contact's Data</h3>";
echo '<table border = "1">';
echo "<tr><td>Id</td><td>Name</td><td>Phone Number</td><td>Town</td></tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr><td>".$row['id']."</td><td><a href='index.php?ID=$row[id]'>".$row['name']."</a></td><td>".$row['phonenumber'].
"</td><td>".$row['town']."</td></tr>";

}
echo "</table>"; 
?>