<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
</head>
<style>
.body{
  background-color: lightblue;
  text align:center;
}
.red {
  color: #ff0000;
}
.button {
  color: green;
  border color: blue;
  padding: 15px;
}

</style>
<body class="body">
<div class="container">
<?php
 if(empty($_GET)){

}elseif($_GET['fields'] == "empty"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>ERROR:</strong> You should fill in all fields below.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}elseif($_GET["fields"] == "success"){
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> welcome!.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($_GET["fields"] =="names"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The First and Last names should have letters!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
   </button>
    </div>";
}elseif($_GET["fields"]=="letter"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($_GET["fields"] =="numbers"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>"; 
}elseif($_GET["fields"] =="phone"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($_GET["fields"] =="date"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($_GET["fields"] =="Language"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}elseif($_GET["fields"] =="password"){
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>SUCCESS:</strong> The names should start with a capital letter!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  </div>";
}
?>
  <form action="form2.php" method="POST">
    <div class="b">
    <h1>Register</h1>
    <p><span class="red">Please fill in this form to create an account*.</p>
    </div>
    <hr>
    <label>First Name:<span class="red">* </label>
    <input type="text"  name="firstname" placeholder="gebreel"><br><br>
    <label>Last Name: <span class="red" >* </label>
    <input type="text" name="lastname" placeholder="kinger"><br><br>
    <label>phone number: <span class="red">* </label>
    <input type="number" name= "phonenumber"placeholder="+254......." ><br><br>
    <label>Gender: <span class="red">* </label>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female<br><br>
    <label for="">Date of birth: <span class="red">* </label>
    <input type="date" name="date" id=""><br> <br>
    <label >Address<span class="red">*</label><br>
    <input type="tel" name="address" id="" placeholder="p.o box 1111 kileleshwa"><br> <Br>
    <label>Languages: <span class="red">* </label>
    <input type="checkbox" name="languange[]" value="html">html
    <input type="checkbox" name="languange[]" value="css">css
    <input type="checkbox" name="languange[]" value="php">php
    <input type="checkbox" name="languange[]" value="js">Js
    <input type="checkbox" name="languange[]" value="Go">Go
    <input type="checkbox" name="languange[]" value="Jquery">Jquery<br><br>
    <label>Hobbies: <span class="red">* </label>
    <select name="hobbies">
    <option value="--">--</option>
      <option value="swimming">Swimming</option>
      <option value="Travelling">Travelling</option>
      <option value="Dancing">Dancing</option>
      <option value="Singing">Singing</option>
      <option value="Reading">Reading</option>
      <option value="Gaming">Gaming</option>
    </select><br><br>
    <label>E-mail: <span class="red">* </label>
    <input type="email" name="e-mail" placeholder="jamal@gmail.com" ><br><br>
      <label>Password <span class="red">* </label>
      <input type="password" name="password" ><br><br>
      <label>Retype_Password <span class="red">* </label>
      <input type="password" name="retypepassword" ><br><br>
      <label>Additional info:</label><br>
      <textarea id="Additional info" name="info" style="height:200px"></textarea><br><br>
      <input type="radio" name="tc" id="">Terms And Conditions<br>
    <input type="submit" value="Register" name="submit" class="button">  
  </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
      crossorigin="anonymous">
    </script>
    <script>
       $('#info').click(function(){
        $('.btn').removeattr('disabled');
        })
</script>
</div>
</body>
</html>
