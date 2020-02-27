<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
/*cascading stylesheet*/
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}
* {
  box-sizing: border-box;
}
.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}
.col-25 {
  -ms-flex: 25%;
  flex: 25%;
}
.col-50 {
  -ms-flex: 50%;
  flex: 50%;
}
.col-75 {
  -ms-flex: 75%;
  flex: 75%;
}
.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}
input[type=text], input[type=password] , select, input[type=date]  {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.ttle{
  
  color: DODGERBLUE;
  padding: 12px;
  margin: 10px 0;
  width: 100%;
  text-align: center;
  font-size: 37px;
}
.btn:hover {
  background-color: #45a049;
}
a {
  color: #2196F3;
}
hr {
  border: 1px solid lightgrey;
}
span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

</style>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <?php
      if(empty($_GET)){

      }
        elseif($_GET['fields'] == "empty"){
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>ERROR:</strong> You should fill in all fields below.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }elseif($_GET['fields'] =="success"){
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>SUCCESS:</strong> All fields are filled.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }elseif($_GET['fields'] =="names"){
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>ERROR:</strong> firstname and lastname should be letters.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }elseif($_GET['fields'] =="letter"){
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>ERROR:</strong> firstname and lastname should start with capital.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        
      }elseif($_GET['fields'] =="number"){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERROR:</strong> phonenumber must be a number!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
    
      <form action="validation.php" method="POST">
      <label class="ttle"><u>Registration form</u></label>
        <div class="row">
          <div class="col-50">
            
            <label for="fname"><i class="fa fa-user"></i>Firstname<span style="color: red; font-size:20px;">*</span></label>
            <input type="text" id="fname" name="firstname" placeholder="Enter firstname">
            <label for="lname"><i class="fa fa-user"></i>Lastname<span style="color: red; font-size:20px;">*</span></label>
            <input type="text" id="fname" name="lastname" placeholder="Enter lastname">
            <label for="email"><i class="fa fa-envelope"></i> Email<span style="color: red; font-size:20px;">*</span></label>
            <input type="text" id="email" name="email"  placeholder="xyz@example.com">
            <label for="adr"><i class="fa fa-phone"></i> Phone Number<span style="color: red; font-size:20px;">*</span></label>
            <input type="text" id="adr" name="phone" placeholder="+254....">
            <label for="fname">Gender<span style="color: red; font-size:20px;">*</span></label>
                    
                    <input type = "radio" name ="gender" value ="male">Male
                    <input type = "radio" name ="gender" value ="female">Female<br><br>
          </div>

          <div class="col-50">
        <label for="">Date of Birth<span style="color: red; font-size:20px;">*</span></label>
        <input type="date" name="date" id="">
          

            <label for="cname">Language<span style="color: red; font-size:20px;">*</span></label>
                    <input type ="checkbox" name ="language[]" value = "Html">HTML
                    <input type ="checkbox" name ="language[]" value = "css">CSS
                    <input type = "checkbox" name="language[]" value ="php">PHP
                    <input type = "checkbox" name ="language[]" value ="Js">JS
                    <input type = "checkbox" name ="language[]" value ="GO">GO
                    <input type ="checkbox" name ="language[]" value ="Jquery">Jquery<br><br> 
            <label for="ccnum">Hobbies and Talents<span style="color: red; font-size:20px;">*</span></label>
            <select name="hobbies" id="">
            <option value="--">--</option>
                <option value="swimming">Swimming</option>
                <option value="travelling">Travelling</option>
                <option value="dancing">Dancing</option>
                <option value="singing">Singing</option>
                <option value="reading">Reading</option>
                <option value="gaming">Gaming</option>
            </select>
            <label for="expmonth">Password<span style="color: red; font-size:20px;">*</span></label>
            <input type = "password" required name ="password">
            <label for="expmonth">Retype Password<span style="color: red; font-size:20px;">*</span></label>
            <input type = "password" name ="retypepassword">
          </div>
          
        </div>
        <label>
          <input type="checkbox" id="info" name="sameadr">Terms and Conditions
        </label>
        <button type="submit" disabled name="jbl" class="btn">Register</button>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js" 
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous">
<script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('#info').click(function(){
        $('.btn').removeAttr('disabled');
    })
</script>
</body>
</html>