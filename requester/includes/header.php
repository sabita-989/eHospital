<!DOCTYPE html>
<htm lang="en">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/custom.css">

        <title><?php echo TITLE ?></title>
    </head>
    <body>
        <!-- top nav bar -->
        <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="requesterProfile.php">BirSewa</a></nav>

       <!-- start container -->
        <div class="conatiner-fluid" style="margin-top:40px;">
            <!-- start row -->
            <div class="row">
                 <!-- side bar 1st column-->
                <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'requesterProfile') {echo 'active';} ?>" href="requesterProfile.php"><i class="fas fa-user"></i>Profile</a></li></ul>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'SubmitRequest') {echo 'active';} ?>" href="SubmitRequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li></ul>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'RequesterChangePas') {echo 'active';} ?>" href="RequesterChangePas.php"><i class="fas fa-key"></i>Change Password</a></li></ul>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li></ul>
                    </div>       
                </nav>
                <!-- end sidebar 1st column-->
                
            