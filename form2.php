<?php
if(isset($_post["submit"])){
    $fname = $_post["firstname"];
    $lname = $_post["lastname"];
    $phone = $_post["phonenumber"];
    $Gender = $_post["Gender"];
    $date = $_post["date"];
    $Language = $_post["Language"];
    $Hobbies = $_post["Hobbies"];
    $email = $_post["e-mail"];
    $password = $_post["password"];
    $retypepassword = $_post["retypepassword"];  
    $address = $_post["address"];


    if(empty($fname)|| empty($lname) || empty($phone) || empty($Gender)|| empty($Language)||
 empty($email)|| empty($password) || empty($retypepassword) ||

        header("Location:form.php?fields=empty");
        exit();
     }elseif(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname) { 
        header("Location:form.php?fields=names");
        exit();
        check if firstname and lastname is capital       
     }elseif(!ctype_upper($fname[0]) || !ctype_upper($fname[0])) {
        header("Location:form.php?fields=letter");
        exit();
      //phone number must be a number
     }elseif(!preg_match("/^[0-9]*$/",$fname)) {
      header("Location:form.php?fields=numbers");
      exit();
     }elseif (strpos($phone ,+254)!==0) {
      header("Location:form.php?fields=phone");
      exit();
      // check if dob >18
   }elseif($date > 18){
      header("Location:form.php?fields=date");
      exit();
   }elseif($Language >= 3){
      header("Location:form.php?fields=Language");
      exit();
   }elseif(strlen ($password=<10)  & ($password>= 5)){
      header("Location:form.php?fields=password");
      exit();
   }elseif(strlen ($retypepassword =<10) & ($retypepassword >= 5)){
      header("Location:form.php?fields=password");
      exit();
   //if all is met
     else{
        header("Location:form.php?fields=success");
        exit();
     }
?>
