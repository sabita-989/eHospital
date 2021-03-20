<?php
define('TITLE','PatientRequest');
define('PAGE','patientrequest');
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
<div class="col-sm-4 mb-5">
    <?php 
        $sql= "SELECT r_id,r_illness,r_speciality,r_shift,r_name,r_gender,r_age,r_phone,r_date FROM submitrequest_db where r_status='0'";
        $result = $conn-> query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                echo '<div class="card mt-5 mx-5">';
                echo '<div class="card-header">';
                    echo 'Patient ID:'.$row['r_id'];
                echo '</div>';

                echo '<div class="card-body">';
                    echo '<h5 class="card-title">Disease: '.$row['r_illness'];
                    echo '</h5>';

                    echo '<p class="card-text">Patient Name: '.$row['r_name'];
                    echo '</p>';

                    echo '<p class="card-text">Gender: '.$row['r_gender'];
                    echo '</p>';

                    echo '<p class="card-title">Doctor Depart: '.$row['r_speciality'];
                    echo '</p>';

                    echo '<p class="card-title">Date: '.$row['r_date'];
                    echo '</p>';

                    echo '<div class="float-right">';
                      echo '<form action="" method="POST">';
                       echo '<input type="hidden" name="id" value='.$row["r_id"].'>' ;
                        echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
                        echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';                        
                      echo '</form>';  
                    echo '</div>';

                echo '</div>';
                echo '</div>';
            }
        }
    ?>
 </div>
<!-- End 2nd column -->

<?php 
if(isset($_REQUEST['view'])){
    $sql="SELECT * FROM submitrequest_db WHERE r_id = {$_REQUEST['id']}"; 
    $result=$conn->query($sql);
    $row =$result->fetch_assoc();
}
if(isset($_REQUEST['close'])){
    $sql = "UPDATE submitrequest_db SET r_status= 2 WHERE r_id ={$_REQUEST['id']}";
    // $sql= "DELETE FROM submitrequest_db WHERE r_id ={$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
    }else{
        echo "Unable to delete";
    }
}

if(isset($_REQUEST['assignDoct'])){
    if(($_REQUEST['request_id']=="") || ($_REQUEST['illness']=="") || ($_REQUEST['speciality']=="")
            || ($_REQUEST['shift']=="") || ($_REQUEST['name']=="") || ($_REQUEST['gender']=="") || ($_REQUEST['age']=="")
            || ($_REQUEST['phone']=="") || ($_REQUEST['address']=="") 
            || ($_REQUEST['assignDoct']=="") || ($_REQUEST['inputDate']=="")){
        $msg ='<div class = "alert alert-warning col-sm-6 ml-5 mt-2 ">Fill all Fields</div>';
    } else{
        $rid = $_REQUEST['request_id'];
        $rillness= $_REQUEST['illness'];
        $rspeciality = $_REQUEST['speciality'];
        $rshift = $_REQUEST['shift'];
        $rname= $_REQUEST['name'];
        $rgender = $_REQUEST['gender']; 
        $rage= $_REQUEST['age'];       
        $rphone = $_REQUEST['phone'];
        $raddress = $_REQUEST['address'];
        $rassignDoct= $_REQUEST['assignDoct'];
        $rdate= $_REQUEST['inputDate'];
       
    
    
        $sql ="INSERT INTO awork_db(r_id,r_illness,r_speciality, r_shift, r_name,r_gender,r_age,r_phone,r_add,r_doc,r_date)
                VALUES ($rid,'$rillness','$rspeciality','$rshift','$rname','$rgender',$rage,$rphone,'$raddress','$rassignDoct','$rdate')";
      
        if($conn->query($sql)==TRUE){
            $sql = "UPDATE submitrequest_db SET r_status= 1 WHERE r_id ={$_REQUEST['request_id']}";
            // $sql= "DELETE FROM submitrequest_db WHERE r_id ={$_REQUEST['id']}";
            if($conn->query($sql)==TRUE){
                $msg ='<div class = "alert alert-warning col-sm-6 ml-5 mt-2 ">Work Assigned Successfully</div>';
                echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
            }else{
                echo "Something went wrong";
            }

            
        } else{
            $msg ='<div class = "alert alert-danger col-sm-6 ml-5 mt-2 ">Unable to Assign Work</div>';
        }
    }
}
?>

<!-- start 3rd requests order column-->
<div class ="col-sm-5 mt-5 jumbotron">  
    <form action="" method="POST">
    <?php 
        if(isset($msg)){echo $msg;}
    ?>
        <h5 class="text-center">Appointment Details</h5>

        <div class="form-group">
            <label for="request_id">Request ID</label>
            <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="Illness">Disease</label>
            <input type="text" class="form-control" id="Illness"  name="illness" value="<?php if(isset($row['r_illness'])) echo $row['r_illness']; ?>">
        </div>

        <div class="form-group">
            <label for="Speciality">Doctor Speciality</label>
            <input type="text" class="form-control" id="Speciality"  name="speciality" value="<?php if(isset($row['r_speciality'])) echo $row['r_speciality']; ?>">
        </div>

        <div class="group">
        <label for="shift">Select Shift</label>            
                <input type="radio" name="shift" value="10am-1pm" <?php if (isset($row['r_shift']) && $row['r_shift'] == '10am-1pm') { ?> checked="checked" <?php } ?> > 10am-1pm
                <input type="radio" name="shift" value="3pm-5pm" <?php if (isset($row['r_shift']) && $row['r_shift'] == '3pm-5pm') { ?> checked="checked" <?php } ?>  > 3pm-5pm
        </div>
        
        <div class="form-group">
            <label for="Name">Patient's Name</label>
            <input type="text" class="form-control" id="Name" name="name" value="<?php if(isset($row['r_name'])) echo $row['r_name']; ?>">
        </div>

        <div class="group">
        <label for="gender">Gender</label>            
                <input type="radio" name="gender" value="male" <?php if (isset($row['r_gender']) && $row['r_gender'] == 'Male') { ?> checked="checked" <?php } ?> > Male
                <input type="radio" name="gender" value="female" <?php if (isset($row['r_gender']) && $row['r_gender'] == 'Female') { ?> checked="checked" <?php } ?>  > Female
        </div>
    

        <div class="row">
            <div class="form-group col-md-6">
                <label for="Age">Patient's Age</label>
                <input type="number" class="form-control" id="Age" name="age" value="<?php if(isset($row['r_age'])) echo $row['r_age']; ?>">
            </div> 

            <div class="form-group col-md-6">
                <label for="Phone">Phone</label>
                <input type="number" class="form-control" id="Phone" name="phone"  onkeypress="isInputNumber(event)" value="<?php if(isset($row['r_phone'])) echo $row['r_phone']; ?>">
            </div>

          
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="Address">Permanent Address</label>
                <input type="text" class="form-control" id="Address" placeholder="Write Permanent Address" name="address" value="<?php if(isset($row['r_add'])) echo $row['r_add']; ?>">
            </div>    
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="assignDoct">Assign to Doctor</label>
                <input type="text" class="form-control" id="assignDoct" name="assignDoct">
            </div>
            

            <div class="col-md-6">
                <label for="inputDate">Assign Date</label>
                <input type="date" class="form-control" id="inputDate" name="inputDate">
            </div>
        </div>
        
        <div class="float-right">   
            <button type="submit" class="btn btn-success" name="assign">Assign</button>  
            <button type="reset" class="btn btn-secondary">Reset</button> 
        </div> 
    </form>

    
</div> 
<!-- End 3rd requests order column-->

<script>
   function isInputNumber(evt){
       var ch = String.fromCharCode(evt.which);
       if (!(/[0-9]/.test(ch))){
           evt.preventDefault();
       }
   }
</script>

<?php
 include('includes/footer.php');
?>