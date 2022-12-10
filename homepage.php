<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include "db.php";

$_GET['delete_id'];
if(isset($_GET['delete_id']))
{
	$del = $_GET['delete_id'];

	if($now_delete){
		$query_delete="DELETE FROM class WHERE id='".$_GET['delete_id']."'";
		$p = mysqli_query($con, $query_delete);
		echo "<script>alert('Deleted Successfully');</script>
		<script>window.location.href = 'homepage.php'</script>";
	}
}
    //fetch recent post
    $class = mysqli_query($con,"SELECT * FROM class ORDER BY id DESC");
    $class1 = mysqli_query($con,"SELECT * FROM class ORDER BY id DESC");

    $result=mysqli_query($con, "select * from users where username='$session_id'")or die('Error In Session');
    $row=mysqli_fetch_array($result);
    $edit="";
    //create class function
    if(isset($_POST['publise'])){

        $classname1 = $_POST['classname'];
        $classname = str_replace("'","\'", $classname1);

        $classdes1 = $_POST['classdes'];
        $classdes = str_replace("'","\'", $classdes1);

        $classcode1 = $_POST['classcode'];
        $classcode = str_replace("'","\'", $classcode1);

        if($edit==''){
        $insertdata = mysqli_query($con,"INSERT INTO class(classname,classdes,classcode)VALUES('$classname','$classdes','$classcode')");
        echo "<script>alert('Posted Successfully');</script>
            <script>window.location.href = 'homepage.php'</script>";
        }
        else{
        }
        }

?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>All | Classes</title>
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

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

  <!-- Begin page -->
  <div id="layout-wrapper">
    <?php require 'header.php';?>
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
                        <?php
                        while ($row=mysqli_fetch_array($class1)){
                        ?>
						<ul class="sub-menu" aria-expanded="false">
							<li><a href="email-inbox.html"><?php echo $row['classname'];?></a></li>
						</ul>
                        <?php } ?>
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
                                    <h4 class="mb-sm-0">Teaching:</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Classroom</a></li>

                                            <li class="breadcrumb-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo"><i class="fas fa-plus-circle text-primary"></i> <a href="#">Create Class</a></li>

                                            <li class="breadcrumb-item" data-bs-toggle="modal" data-bs-target="#sing" data-bs-whatever="@mdo"><i class="fas fa-plus-circle text-primary"></i> <a href="#">Join Class</a></li>
                                        </ol>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                        <?php
                        while ($row=mysqli_fetch_array($class)){
                        ?>
                            <div class="col-md-6 col-lg-4">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/groups-bg-5.jpg" alt="Card image cap">
                                <div class="card-body">
                                <h4 class="card-title "><?php echo $row['classname']; ?></h4>
                                <p class="card-text"><?php echo $row['classdes']; ?></p>
                                <a href="homepage.php?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Are you sure?')">Remove</a>

                                    </div>
                                </div>
                            </div><!-- end col -->
                            <?php } ?>
                        </div>
                        <div class="row">
                            <h4>Enrolled:</h4>
                            <div class="col-md-6 col-lg-4">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/groups-bg-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title ">Computer Networks</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="classroom.php" class="btn btn-primary waves-effect waves-light">Go to Classroom</a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6 col-lg-4">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/groups-bg-3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title ">Computer Networks</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Go to Classroom</a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6 col-lg-4">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/groups-bg-4.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title ">Computer Networks</h4>
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Go to Classroom</a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="">
                        <div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    	<div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                        <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Course Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Your Course Name" name="classname" required>
                        </div>

                        <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Course Description:</label>
                        <textarea class="form-control" rows="1" placeholder="Enter your Education 1" name="classdes" required></textarea>
                        </div>

                        <div class="mb-4">
                        <label for="recipient-name" class="col-form-label">Course Code:</label>
                        <input type="text" class="form-control" placeholder="Enter Your Course Code" name="classcode" required>
                        </div>
						<div class="pb-3">
						<button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" name="publise" class="btn btn-primary">Create Class</button>
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
                        <div class="row">
                        <div class="col-lg-12">
                        <div class="card">
                        <div class="">
                        <div>
                        <div class="modal fade" id="sing" tabindex="-1" aria-labelledby="sing" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="sing">Join Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post">
                        <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" >Course Code:</label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="Enter Course Code">
                        </div>
						<div class="pb-3">
						<button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Join Class</button>
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
                        <!-- end row -->
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.png" class="img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.png" class="img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.png" class="img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/libs/masonry-layout/masonry.pkgd.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
