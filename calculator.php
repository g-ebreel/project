
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calculator</title>
</head>
<body>
<form method ="get">
First number:<br>
<input type="text" name="num1" placeholder="num 1">
<br>
Second number:<br>
<input type="text" name="num2" placeholder="num 2">
<br>
<select name="operator">
    <option value="none">none</option>
    <option value="add">add</option>
    <option value="subtract">subtract</option>
    <option value="multiply">multiply</option>
    <option value="divide">divide</option>

  </select>
  <br><br>
  <button name ="submit" type="submit">calculate</button>
</form>
<p>the ans is :</p>
<?php
    if(isset($_GET['submit'])){
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
        echo $result1 - $result2;
    }if(operator == "add"){
        echo $result1 + $result2;
    }
?>
</body>
</html>
