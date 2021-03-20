<?php
    define('TITLE', 'Change Password');
    define('PAGE','RequesterChangePas');
    include('includes/header.php');
    include('../dbconnection.php');
    session_start();
    if($_SESSION['is_login']){
        $rEmail= $_SESSION['rEmail'];
    }
    else{
        echo "<script> location.href='requesterLogin.php'</script>";
    }

    $rEmail= $_SESSION['rEmail'];

    if(isset($_REQUEST['passupdate']))
    {
        if($_REQUEST['password']==""){
            $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }else{
            $rpass = $_REQUEST['password'];
            $sql ="UPDATE requesterlogin_db SET r_password = '$rpass' WHERE r_email='$rEmail'";
            if($conn->query($sql)==TRUE){
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
            }else{
                $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Update</div>';
            }
        }
    }
    
?>

<div class="col-sm-9 col-md-10">
    <!-- start user form 2nd column -->
<form class="mt-5 mx-5" action="" method="POST">
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" id="Email" value="<?php echo $rEmail; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" placeholder="New Password" name="password">
    </div>

    <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
</form>

<?php 
    if(isset($passmsg)){echo $passmsg;};
?>

</div>
    <!-- end user form 2nd column -->

<?php
 include('includes/footer.php');
?>