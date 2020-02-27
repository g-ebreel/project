<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $phonenumber = $gender = $dob = $weight = $married = $timein = "";
$name_err = $email_err = $phonenumber_err = $gender_err = $dob_err = $weight_err = $married_err = $timein_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a valid E-mail.";     
    } else{
        $email = $input_email;
    }
    //validate phone number
    $input_phonenumber = trim($_POST["phonenumber"]);
    if(empty($input_phonenumber)){
        $phonenumber_err = "Please enter a valid phone number.";     
    } else{
        $phonenumber = $input_phonenumber;
    }
    //validate gender
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter a valid gender .";     
    } else{
        $gender = $input_gender;
    }
    //Validate sdob
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter the D.O.B.";     
    } elseif(!ctype_digit($input_dob)){
        $dob_err = "Please enter a  valid D.O.B.";
    } else{
        $dob = $input_dob;
    }
    //validate weight
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter a valid weight .";     
    } else{
        $weight = $input_weight;
    }
    //validate married
    $input_married = trim($_POST["married"]);
    if(empty($input_married)){
        $married_err = "Please fill.";     
    } else{
        $married = $input_married;
    }
    //validate time in
    $input_timein = trim($_POST["timein"]);
    if(empty($input_timein)){
        $timein_err = "Please enter the time in .";     
    } else{
        $timein = $input_timein;
    }
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($dob_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET name=?, email=?, dob=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phonenumber = $phonenumber;
            $param_gender = $gender;
            $param_dob = $dob;
            $param_weight = $weight;
            $param_married = $married;
            $param_timein = $timein;
            $param_id = $id;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $email = $row["email"];
                    $phonenumber = $row["phonenumber"];
                    $gender = $row["gender"];
                    $dob = $row["dob"];
                    $weight = $row["weight"];
                    $married = $row["married"];
                    $timein = $row["timein"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>E-mail</label>
                            <textarea name="address" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($phonenumber_err)) ? 'has-error' : ''; ?>">
                            <label>Phonenumber</label>
                            <textarea name="address" class="form-control"><?php echo $phonenumber; ?></textarea>
                            <span class="help-block"><?php echo $phonenumber_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <textarea name="address" class="form-control"><?php echo $gender; ?></textarea>
                            <span class="help-block"><?php echo $gender_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>D.O.B</label>
                            <textarea name="address" class="form-control"><?php echo $dob; ?></textarea>
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>Weight</label>
                            <textarea name="address" class="form-control"><?php echo $weight; ?></textarea>
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($married_err)) ? 'has-error' : ''; ?>">
                        <label>Married</label>
                            <textarea name="address" class="form-control"><?php echo $married; ?></textarea>
                            <span class="help-block"><?php echo $married_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($timein_err)) ? 'has-error' : ''; ?>">
                            <label>Timein</label>
                            <textarea name="address" class="form-control"><?php echo $timein; ?></textarea>
                            <span class="help-block"><?php echo $timein_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
