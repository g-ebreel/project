
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Phone book form</title>
<style type="text/css">
body {
    margin: 0 12%;
    width: 990px;   

}
form {
      width: 30em;
} 
fieldset {
    margin: 1em 0; 
    padding: 1em;
    border-width : .1em ;
    border-style: solid;
} 
form div {
    padding: 0.4em 0;
} 

label {
    display:block;
} 
input {
  width: 20em;
}

input.submit {
  width: auto;
}

</style>
</head>

<body>
<p>Phone Book - Enter your contact's details</p>
<form method="post" action="index.php">
<p><label for="name">Name:</label><input type="text" name="username" maxlength="20" title="Enter Name"></p>
<p><label for="phonenumber">Phone Number</label><input type="text" maxlength="12" name="phone" title="Enter phone number"></p>
<p><label for="town">Town</label><input type="text" maxlength="25" title="Enter name of town" name="town"></p>
<input type="submit" name="save" value="Save Data">
</form>
</body>

<!-- </html><!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Phone book form</title>
<style type="text/css">
body {
    margin: 0 12%;
    width: 990px;   

}
form {
      width: 30em;
} 
fieldset {
    margin: 1em 0; 
    padding: 1em;
    border-width : .1em ;
    border-style: solid;
} 
form div {
    padding: 0.4em 0;
} 

label {
    display:block;
} 
input {
  width: 20em;
}

input.submit {
  width: auto;
}

</style>
</head>

<body>
<p>Phone Book - Enter your contact's details</p>
<form method="post" action="index.php">
<p><label for="name">Name:</label><input type="text" name="username" maxlength="20" title="Enter Name"></p>
<p><label for="phonenumber">Phone Number</label><input type="text" maxlength="12" name="phone" title="Enter phone number"></p>
<p><label for="town">Town</label><input type="text" maxlength="25" title="Enter name of town" name="town"></p>
<input type="submit" name="save" value="Save Data">
</form>
</body>

</html>
index.php -->