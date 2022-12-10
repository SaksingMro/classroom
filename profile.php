<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
    include "db.php";
    $result=mysqli_query($con, "select * from users where username='$session_id'")or die('Error In Session');
    $row=mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Profile | <?php echo $row['username'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body data-sidebar="dark">
  <!-- Begin page -->
  <div id="layout-wrapper">

	<header id="page-topbar">
		<div class="navbar-header">
			<div class="d-flex">
			<!-- LOGO -->
			<div class="navbar-brand-box text-center">
			<a href="homepage.php" class="logo logo-sm">
			<span class="logo-sm">
			<img src="assets/images/logo-sm.png" alt="logo-sm-dark" height="22">
			</span>
			<span class="logo-lg">
			<img src="assets/images/logo-sm.png" alt="logo-dark" height="24">
			<h5 class="text-white">Interactive Classroom</h5>
			</span>
			</a>
			</div>

			<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
			<i class="ri-menu-2-line align-middle"></i>
			</button>

			<!-- App Search-->
			<form class="app-search d-none d-lg-block">
			<div class="position-relative">
			<input type="text" class="form-control" placeholder="Search...">
			<span class="ri-search-line"></span>
			</div>
			</form>
			</div>

			<div class="d-flex">
			<div class="dropdown d-inline-block d-lg-none ms-2">
			<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="ri-search-line"></i>
			</button>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
						aria-labelledby="page-header-search-dropdown">

			<form class="p-3">
			<div class="mb-3 m-0">
			<div class="input-group">
			<input type="text" class="form-control" placeholder="Search ...">
			<div class="input-group-append">
			<button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
			</div>
			</div>
			</div>
			</form>
		</div>
	</div>

			<button type="button" class="btn header-item noti-icon waves-effect">
			<a href="homepage.php" class="text-secondary">Home</a>
			</button>
			<button type="button" class="btn header-item noti-icon waves-effect">
			<a href="about.php" class="text-secondary">About</a>
			</button>
			<button type="button" class="btn header-item noti-icon waves-effect">
			<a href="contact.php" class="text-secondary">Contact</a>
			</button>

			<div class="dropdown d-inline-block user-dropdown">
			<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img class="rounded-circle header-profile-user" src="assets/images/img.jpg"
							alt="Header Avatar">
			<span class="d-none d-xl-inline-block ms-1"><?php echo $row['username'];?></span>
			<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
			</button>
			<div class="dropdown-menu dropdown-menu-end">
			<!-- item-->
			<a class="dropdown-item" href="profile.php"><i class="ri-user-line align-middle me-1"></i> Profile</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item text-danger" href="logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
			</div>
			</div>
			</div>
		</div>
	</header>

	<!-- ========== Left Sidebar Start ========== -->
	<div class="vertical-menu">
		<div data-simplebar class="h-100">
			<!--- Sidemenu -->
			<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title">Menu</li>

					<!-- <li>
						<a href="index.html" class="waves-effect">
							<i class="mdi mdi-home-variant-outline"></i><span
								class="badge rounded-pill bg-primary float-end">3</span>
							<span>Dashboard</span>
						</a>
					</li> -->
			<li>
			<a href="javascript: void(0);" class="has-arrow waves-effect">
			<i class="fas fa-users text-primary"></i>
			<span>Teaching</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
			<li><a href="email-inbox.html">Computer Networks</a></li>
			<li><a href="email-read.html">Graph Theory</a></li>
			<li><a href="email-compose.html">Database Management System</a></li>
			</ul>
			</li>
			<li>
			<a href="javascript: void(0);" class="has-arrow waves-effect">
			<i class="mdi mdi-account-circle-outline text-primary"></i>
			<span>Enrolled</span>
			</a>
			<ul class="sub-menu" aria-expanded="false">
			<li><a href="auth-login.html">Software Engineering</a></li>
			<li><a href="auth-register.html">System Analysis and Design</a></li>
			<li><a href="auth-recoverpw.html">Ethical Hacking</a></li>
			</ul>
			</li>
			</ul>
			</div>
			<!-- Sidebar -->
		</div>
	</div>
	<!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

            <div class="page-content">
            <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
            <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Profile</h4>

            <div class="page-title-right">
            <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
            <li class="breadcrumb-item active"><a href="#"data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo"><i class="fas fa-plus-circle text-primary"></i> Update Profile</a></li>
            </ol>
        	</div>
            </div>
            </div>
            </div>
            <!-- end page title -->
            <div class="row mb-4">
            <div class="col-xl-12">

            <div class="card mb-0">
            <div class="card-body">
            <div class="d-flex mb-4">
            <div class="flex-shrink-0 me-3">
            <img class="rounded-circle avatar-sm" src="assets/images/img.jpg" alt="Generic placeholder image">
            </div>
            <div class="flex-grow-1">
            <h4 class="font-size-16"><?php echo $row['username'];?></h4>
            <p class="text-muted font-size-13"><?php echo $row['email'];?></p>
            </div>
            </div>
            <h4 class="font-size-16">This Week's Top Stories</h4>

            <p>Dear Shane,</p>
            <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus convallis.</p>
            <p>Sincerly,</p>
            <hr/>
			<h4 class="font-size-16">B.sc Computer Science and Engineering</h4>
            <p>Bandarban University</p>
            <p>2019-2024</p>
			<hr/>
			<h4 class="font-size-16">M.sc Computer Science and Engineering</h4>
            <p>Bandarban University</p>
            <p>2019-2024</p>
            </div>
            </div>
            <!-- end card -->

            </div>
            </div>
            <!-- end row -->

            </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
			<div class="row">
			<div class="col-lg-12">
			<div class="card">
			<div class="">
			<div>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			<form>
			<div class="row">
            <div class="col-lg-12">
            <div class="mb-3">
            <label class="form-label" for="basicpill-address-input">User Image</label>
			<input type="file" class="form-control">
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label" for="basicpill-firstname-input">User Name</label>
            <input type="text" class="form-control" id="basicpill-firstname-input" placeholder="Enter your First Name">
            </div>
        	</div>
            <div class="col-lg-6">
        	<div class="mb-3">
            <label class="form-label" for="basicpill-lastname-input">Email</label>
            <input type="email" class="form-control" id="basicpill-lastname-input" placeholder="Enter your Email Id">
            </div>
            </div>
            </div>

            <div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label" for="basicpill-phoneno-input">Phone</label>
            <input type="text" class="form-control" id="basicpill-phoneno-input" placeholder="Enter your Phone No.">
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label" for="basicpill-email-input">Address</label>
            <input type="text" class="form-control" id="basicpill-email-input" placeholder="Enter your Address">
            </div>
            </div>
            </div>
			<div class="row">
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label" for="basicpill-phoneno-input">Education 1</label>
            <textarea id="basicpill-address-input" class="form-control" rows="2" placeholder="Enter your Education 1"></textarea>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="mb-3">
            <label class="form-label" for="basicpill-email-input">Education 2</label>
            <textarea id="basicpill-address-input" class="form-control" rows="2" placeholder="Enter your Education 2"></textarea>
            </div>
            </div>
            </div>
			<div class="row">
			<div class="col-lg-12">
			<div class="mb-3">
			<button type="reset" class="btn btn-danger">Cancel</button>
			<button type="submit" class="btn btn-primary">Update Profile</button>
			</div>
			</div>
			</div>

            </form>
			</div>
			</div>
			</div>
			</div>
			</div> <!-- end preview-->

			</div>
			<!-- end card body -->
			</div>
			<!-- end card -->
			</div>
			<!-- end col -->
			</div>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
