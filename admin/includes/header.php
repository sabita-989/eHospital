<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
     <!-- Bootstrap css -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- font awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">    

    <!-- custom css -->
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">BirSewa</a></nav>
<!-- start container -->
<div class="conatiner-fluid" style="margin-top:40px;">
    <!-- start row -->
    <div class="row">
        <!-- side bar 1st column-->
        <nav class="col-sm-2 bg-light sidebar py-5">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link <?php if(PAGE == 'patientrequest') {echo 'active';} ?>" href="patientrequest.php"><i class="fas fa-chalkboard-teacher"></i>Patient Requests</a></li></ul>
                <li class="nav-item"><a class="nav-link <?php if(PAGE == 'appointmentorder') {echo 'active';} ?>" href="AppointmentOrder.php"><i class="fas fa-globe"></i>Appointments Chart</a></li></ul>  
                <li class="nav-item"><a class="nav-link <?php if(PAGE == 'speciality') {echo 'active';} ?>" href="speciality.php"><i class="fas fa-user-md"></i>Speciality</a></li></ul>              
                <li class="nav-item"><a class="nav-link <?php if(PAGE == 'doctors') {echo 'active';} ?>" href="doctors.php"><i class="fas fa-user-md"></i>Doctors</a></li></ul>
                <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li></ul>
            </div>       
        </nav>
        <!-- end sidebar 1st column-->