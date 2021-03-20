
<?php
 define('TITLE', 'Submit Request');
 define('PAGE', 'SubmitRequest');

 include('includes/header.php');
 include('../dbconnection.php');
 session_start();
 if($_SESSION['is_login']){
     $rEmail= $_SESSION['rEmail'];
 }
 else{
     echo "<script> location.href='requesterLogin.php'</script>";
 }

 if(isset($_REQUEST['submit'])){
         //checking for empty fields
    if(($_REQUEST['illness']=="") || ($_REQUEST['name']=="") || ($_REQUEST['speciality']=="") || ($_REQUEST['shift']=="") ||
        ($_REQUEST['gender']=="") || ($_REQUEST['age']=="") || ($_REQUEST['phone']=="") || 
        ($_REQUEST['address']=="") || ($_REQUEST['date']=="")){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'> All fields are Required </div>";} 
       
        else{
            $rillness = $_REQUEST['illness'];
            $rspeciality  = $_REQUEST['speciality'];
            $rshift = $_REQUEST['shift'];
            $rname    = $_REQUEST['name'];
            $rgender  = $_REQUEST['gender'];        
            $rage     = $_REQUEST['age'];
            $rphone   = $_REQUEST['phone'];
            $raddress = $_REQUEST['address'];
            $rdate  = $_REQUEST['date'];
            
        $sql = "INSERT INTO submitrequest_db(r_illness, r_speciality,r_shift, r_name, r_gender, r_age, r_phone, r_add, r_date)
                    VALUES('$rillness','$rspeciality ','$rshift', '$rname', '$rgender','$rage', '$rphone', ' $raddress', 
                    '$rdate')";
        if($conn-> query($sql) == TRUE ){
        $genid= mysqli_insert_id($conn);
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Request Submitted Successfully</div>";
        $_SESSION['myid']= $genid;
        echo "<script> location.href='subreqsuccess.php'</script>";
        } else{
            $msg =  "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Unable to Submit Request</div>";
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

<div class ="col-sm-9 col-md-10 mt-5">  <!--Start Submit Request form 2nd column-->
<form class="mx-5" action="" method="POST">
    <?php 
        if(isset($msg)){echo $msg;}
    ?>
    <div class="form-group">
        <label for="Illness">Disease</label>
        <input type="text" class="form-control" id="Illness" placeholder="Write about patient's suffering" name="illness">
    </div>

    <div class="row">
        <div class="form-group col-md-6">
		<label for="speciality">Doctor Speciality</label>
		<select name="speciality" id="speciality">
                <?php foreach($data as $value){ ?>
                <option><?php echo $value['speciality_name'] ?></option>
                <?php } ?>
            </select>
		</div>    
    </div>

    <div class="group">
	    <label for="shift">Select Shift:</label>
		<input type="radio" name="shift" value="10am-1pm" id="shift">10am-1pm
		<input type="radio" name="shift" value= "3pm-5pm" id="shift1">3pm-5pm
	</div>
   
    
    <div class="form-group">
        <label for="Name">Patient's Name</label>
        <input type="text" class="form-control" id="Name" placeholder="Patient's Name" name="name">
    </div>
    

    <div class="group">
	    <label for="gender">Gender</label>
		<input type="radio" name="gender" value="Male" id="gender">Male
		<input type="radio" name="gender" value= "Female" id="gender1">Female
	</div>
   

    <div class="row">
        <div class="form-group col-md-6">
            <label for="Age">Patient's Age</label>
            <input type="number" class="form-control" id="Age" name="age">
        </div>
        <div class="form-group col-md-6">
            <label for="Phone">Phone</label>
            <input type="number" class="form-control" id="Phone" name="phone" onkeypress="isInputNumber(event)">
            <span class="error"></span>
        </div>
        
    </div>

    <div class="row">
        <div class="form-group col-md-8">
            <label for="Address">Permanent Address</label>
            <input type="text" class="form-control" id="Address" placeholder="Write Permanent Address" name="address">
        </div>
        

        <div class="col-md-4">
            <label for="Date">Date</label>
            <input type="date" class="form-control" id="Date" name="date">
        </div>
    </div>
               
    <button type="submit" class="btn btn-danger" name="submit">Submit</button>  
    <button type="reset" class="btn btn-primary" name="reset">Reset</button> 
</form>


</div> <!--End Submit Request form 2nd column-->

<?php
 include('includes/footer.php');
?>
