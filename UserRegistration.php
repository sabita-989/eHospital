<?php
include('dbconnection.php');

if(isset($_REQUEST['rSignUp'])){
    $data = [];
    $flag = true;
    $errors = [];
    if(strlen($_REQUEST['rPassword']) <= 8 ) {
        $errors['rPassword'] = "Your password must be greater than 8 characters";
    } 

    $sql="SELECT r_email FROM requesterlogin_db WHERE r_email='".$_REQUEST['rEmail']."'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $errors['rEmail'] = "Email ID Already Exists. ";
        }

    //checking empty fields
    if(count($errors) === 0) {
            //Assigned users values to variables

        $rName = mysqli_real_escape_string($conn,$_REQUEST['rName']);
        $rEmail = mysqli_real_escape_string($conn,$_REQUEST['rEmail']);
        $rPassword = mysqli_real_escape_string($conn,$_REQUEST['rPassword']);

        $rPass = password_hash($rPassword,PASSWORD_BCRYPT);
               
        $sql= "INSERT INTO requesterlogin_db(r_name, r_email, r_password) VALUES('$rName','$rEmail', '$rPass')";
        
        if($conn-> query($sql)==TRUE){
            // session_start();
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail']=$rEmail;
            echo "<script> location.href='requester/requesterProfile.php';</script>";
        }else{
            echo "<div class='alert alert-success mt-2' role='alert'>Account Creation Failed</div>";
        }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BirSewa</title>
</head>
<body>
<div class="container pt-5" id="Registration">
    <h2 class="text-center">Create Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
             
            <form action="" class="shadow-lg p-4" method="POST">
                <?php if(isset($regmsg)) {echo $regmsg;} ?>
                <div class="form-group"> 
                    <i class="fas fa-user"></i>  
                    <label for="name" class="font-weight-bold pl-2">Full Name</label>
                    <input type="text" class= "form-control" placeholder="Enter you Name" name="rName" required>
                </div>

                <div class="form-group"> 
                    <i class="far fa-envelope"></i>
                    <label for="email" class="font-weight-bold pl-2">Email</label>
                    <input type="email" class= "form-control" placeholder="Enter your email" name="rEmail" required>
                    <small class="form-text">Your email won't be shared to anyone</small>
                    <?php echo (isset($errors['rEmail'])) ? '<p class="alert alert-danger">' . $errors['rEmail'] . '</p>' : null; ?>
                    
                </div>

                <div class="form-group"> 
                    <i class="fas fa-key"></i>  
                    <label for="password" class="font-weight-bold pl-2">Password</label>
                    <input type="password" class= "form-control" placeholder="Enter Password" name="rPassword" required maxlength="255">
                    <?php echo (isset($errors['rPassword'])) ? '<p class="alert alert-danger mt-2">' . $errors['rPassword'] . '</p>' : null; ?>
                </div>
                
                <button type="submit" class="btn btn-danger mt-5 btn-block
                shadow-sm font-weight-bold" name="rSignUp" value="Register">Sign Up</button>
                <em style="font-size:16px;">Note-By clicking Sign Up, you agree to our Terms,Data Policy and Cookie policy</em>    
                           
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="form.js"></script>
</body>
</html>