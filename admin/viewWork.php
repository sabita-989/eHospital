<?php
define('TITLE','View Appointment');
define('PAGE','viewWork');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>location.href='login.php'</script>";
}
?>
<!-- start 2nd column -->
<div class="col-sm-6 mt-5 mx-3">
<h3 class="text-center">Appointment Details</h3>
<?php
 if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM awork_db WHERE r_id={$_REQUEST['id']}";
    $result = $conn-> query($sql);
    $row = $result->fetch_assoc(); ?>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php if(isset($row['r_id'])){
                    echo $row['r_id'];} ?></td>                
            </tr>
            <tr>
                <td>Disease</td>
                <td><?php if(isset($row['r_illness'])){
                    echo $row['r_illness'];} ?></td>                
            </tr>
            <tr>
                <td>Doctor Speciality</td>
                <td><?php if(isset($row['r_speciality'])){
                    echo $row['r_speciality'];} ?></td>                
            </tr><tr>
                <td>Disease</td>
                <td><?php if(isset($row['r_shift'])){
                    echo $row['r_shift'];} ?></td>                
            </tr>
            <tr>
                <td>Name</td>
                <td><?php if(isset($row['r_name'])){
                    echo $row['r_name'];} ?></td>                
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php if(isset($row['r_gender'])){
                    echo $row['r_gender'];} ?></td>                
            </tr>

            <tr>
                <td>Age</td>
                <td><?php if(isset($row['r_age'])){
                    echo $row['r_age'];} ?></td>                
            </tr>
            
            <tr>
                <td>Phone</td>
                <td><?php if(isset($row['r_phone'])){
                    echo $row['r_phone'];} ?></td>                
            </tr>
           
            <tr>
                <td>Address</td>
                <td><?php if(isset($row['r_add'])){
                    echo $row['r_add'];} ?></td>                
            </tr>
            <tr>
                <td>Assigned doctor</td>
                <td><?php if(isset($row['r_doc'])){
                    echo $row['r_doc'];} ?></td>                
            </tr>
        </tbody>
    </table>
    <div class="text-right">
        <form action="AppointmentOrder.php">
            <input class="btn btn-primary" type="submit" value="Close">
        </form>
    </div>
 <?php } ?>
</div>

<!-- end 2nd column -->


<?php
 include('includes/footer.php');
?>