 
<?php
if(isset($_POST['jbl'])){
   $firstname =  $_POST['firstname'];
   $lastname  =  $_POST['lastname'];
   $email = $_POST['email'];
   $phonenumber = $_POST['phone'];
   $gender = $_POST['gender'];
   $language= $_POST['language'];
   $hobbies = $_POST['hobbies'];
   $password = $_POST['password'];
   $retypepassword = $_POST['retypepassword'];
   $date = $_POST['date'];
   $address = $_POST['address'];
   //check if all required fields are filled in
   if(empty($firstname) || empty($lastname) || empty($email)
    || empty($phonenumber) || empty($gender) || empty($language)
    || $hobbies == '--' || empty($password)||
     empty($retypepassword) || empty($date)){
      header("Location:indexphp.php?fields=empty");
      exit();
      //check if firstname and lastname are letters
     }elseif(!preg_match("/^[a-zA-Z]*$/",$firstname)|| 
       !preg_match("/^[a-zA-Z]*$/",$lastname)){
          header("Location:indexphp.php?fields=names");
          exit();
      //check if firstname and lastname is capital
       }elseif(!ctype_upper($firstname [0])|| !ctype_upper($lastname [0])){
         header("Location:indexphp.php?fields=letter");
         exit();   
       
       //phone number must be a number
       }
      elseif(!preg_match("/^[0-9]*$/",$phonenumber)){
        header("Location:indexphp.php?fields=number");
        exit();
      }
      //validate phone number
      elseif (strpos($phonenumber,"+254") !== "0"){
        header("Location:indexphp.php?fields=code");
        exit();
      }
      //if all is met
     else{
      header("Location:indexphp.php?fields=success");
      exit();
     }
    }
    /* ||strpos($phonenumber,"+255")===0
            ||strpos($phonenumber,"+253")===0||strpos($phonenumber,"+256")===0*/