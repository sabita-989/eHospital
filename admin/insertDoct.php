<?php
define('TITLE','Add Doctor');
define('PAGE','addDoctor');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>location.href='login.php'</script>";
}

if(isset($_REQUEST['addDoc'])){
    if(($_REQUEST['d_name']=="") || ($_REQUEST['d_speciality']=="") || ($_REQUEST['d_shift']=="")
    || ($_REQUEST['d_email']=="") || ($_REQUEST['d_phone']=="") || ($_REQUEST['nmc_no']=="")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $dname = $_REQUEST['d_name'];
        $dspeciality =  $_REQUEST['d_speciality'];
        $sqlI = "SELECT speciality_id FROM speciality_db WHERE speciality_name = '$dspeciality'";
       $query = mysqli_query($conn, $sqlI);
       $speciality_id_array = mysqli_fetch_assoc($query);
       $speciality_id = $speciality_id_array['speciality_id'];
        $dshift =  $_REQUEST['d_shift'];
        $demail = $_REQUEST['d_email'];
        $dphone = $_REQUEST['d_phone'];
        $dnmc = $_REQUEST['nmc_no'];
        $sql = "INSERT INTO doctor_db (d_name,d_shift,d_email,d_phone,nmc_no,speciality_id) VALUES ('$dname','$dshift','$demail','$dphone','$dnmc','$speciality_id')";
        if($conn->query($sql)==TRUE){
         $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Added Successfully</div>';
        }else{
         $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add</div>';
        }
    }
}

$sqlS ="SELECT * FROM speciality_db";
    $query = $conn->query($sqlS);
    $data=array();
        while($rows = $query-> fetch_assoc()){
            array_push($data,$rows);
        }
?>
<!-- start 2nd column -->

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Doctor</h3>
    <form action="" class="shadow-lg p-4" method="POST">
    <?php if(isset($msg)) {echo $msg;} ?>
        <div class="form-group"> 
            <i class="fas fa-user"></i>  
            <label for="d_name" class="font-weight-bold pl-2">Name</label>
            <input type="text" class= "form-control" name="d_name" id="d_name">
        </div>

        <div class="form-group"> 
            <i class="fas fa-user"></i>  
            <label for="d_speciality" class="font-weight-bold pl-2">Speciality</label>
            <select name="d_speciality" id="d_speciality">
                <?php foreach($data as $value){ ?>
                <option><?php echo $value['speciality_name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group"> 
            <i class="fas fa-user"></i>  
            <label for="d_shift" class="font-weight-bold pl-2">Shift</label>
            <input type="text" class= "form-control" name="d_shift" id="d_shift">
        </div>

        <div class="form-group"> 
            <i class="far fa-envelope"></i> 
            <label for="d_email" class="font-weight-bold pl-2">Email</label>
            <input type="email" class= "form-control" name="d_email" id="d_email">
        </div>

        <div class="form-group"> 
            <i class="fas fa-phone"></i> 
            <label for="d_phone" class="font-weight-bold pl-2">Phone</label>
            <input type="number" class= "form-control" name="d_phone" id="d_phone">
        </div>


        <div class="form-group"> 
            <i class="fas fa-key"></i>  
            <label for="nmc_no" class="font-weight-bold pl-2">NMC Number</label>
            <input type="number" class= "form-control" name="nmc_no" id="nmc_no">
        </div>

        <button type="submit" class="btn btn-danger" name="addDoc" id="addDoc">Submit</button>
        <a href="doctors.php" class="btn btn-secondary">Close</a>
            
                           
        
    
    </form>
</div>
<!-- end 2nd column -->


<?php
 include('includes/footer.php');
?>