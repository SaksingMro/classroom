<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include "db.php";
$result=mysqli_query($con, "select * from users where username='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//pdf file upload function
$pdf = mysqli_query($con,"SELECT * FROM upload ORDER BY id DESC");
// $assignment = mysqli_query($con,"SELECT * FROM upload1 ORDER BY id DESC LIMIT 3");
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  // $chk = $con->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
    while($c == 0){
        $i++;
        $reversedParts = explode('.', strrev($name), 2);
        $tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
        $chk2 = $con->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
        if($chk2 == 0){
            $c = 1;
            $name = $tname;
        }
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
    $query=$con->query("insert into upload(name,fname)values('$name','$fname')");
    if($query){
    header("location:classroom.php");
    }
    else{
    die(mysql_error());
    }
 }
}
?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Classroom</title>
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
			<i class="mdi mdi-home-variant-outline"></i><span class="badge rounded-pill bg-primary float-end">3</span>
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
            <h4 class="mb-sm-0">Welcome to Interactive Classroom</h4>

            <div class="page-title-right">
            <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Classroom</a></li>
            <li class="breadcrumb-item active" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo"><i class="fas fa-plus-circle text-primary"></i> <a href="#">Upload Pdf</a></li>
            </ol>
            </div>

            </div>
            </div>
            </div>
            <!-- end page title -->

            <div class="row">
            <div class="col-xl-12">
            <div class="card-body">
            <div class="card">
			<h4 class="p-2">Computer Networks</h4>
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
            <i class="far fa-file-pdf text-primary me-1 align-middle"></i> <span class="d-none d-md-inline-block">Class Lecture</span></a></li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
            <i class="far fa-file me-1 text-primary align-middle"></i> <span class="d-none d-md-inline-block">Class Assignment</span></a></li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
            <i class="fas fa-users text-primary me-1 align-middle"></i> <span class="d-none d-md-inline-block">Total Student</span></a> </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3">
            <div class="tab-pane active" id="home" role="tabpanel">
            <table class="table table-bordered">
			<thead>
			<tr>
			<th>Files</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
            while($row=mysqli_fetch_array($pdf)){
            ?>
			<tr>
			<td><i class="far fa-file-pdf text-danger font-size-18"></i> <?php echo $row['name'];?></td>
			<td><i class="fas fa-download text-success"></i> <a href="download.php?filename=<?php echo $row['name'];?>&f=<?php echo $row['fname'] ?>">Download</a></td>
			</tr>
			<?php }?>
			</tbody>
			</table>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
            <table class="table table-bordered">
			<thead>
			<tr>
			<th>Files</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td><i class="far fa-file text-danger font-size-18"></i> Assignment 1.pdf</td>
			<td><a href="#"><i class="fas fa-download text-success"></i> Download</a></td>
			</tr>
			<tr>
			<td><i class="far fa-file text-danger font-size-18"></i> Assignment 2.pdf</td>
			<td><a href="#"><i class="fas fa-download text-success"></i> Download</a></td>
			</tr>
			</tbody>
			</table>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
			<table class="table table-bordered">
			<thead>
			<tr>
			<th>Student's</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td><i class="far fa-user text-danger font-size-16"></i> Handerson</td>
			</tr>
			<tr>
			<td><i class="far fa-user text-danger font-size-16"></i> Saksing Mro</td>
			</tr>
			<tr>
			<td><i class="far fa-user text-danger font-size-16"></i> Articus</td>
			</tr>
			<tr>
			<td><i class="far fa-user text-danger font-size-16"></i> Helen</td>
			</tr>
			<tr>
			<td><i class="far fa-user text-danger font-size-16"></i> Sazzad Hossain</td>
			</tr>
			</tbody>
			</table>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- end row -->
            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="">
            <div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
        	<div class="modal-header">
            <h5 class="modal-title" id="exampleModal">Upload Pdf</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" method="post">
        	<div class="mb-3">
            <label for="recipient-name" class="col-form-label">Upload Pdf:</label>
            <input type="file" name="file" class="form-control" required>
            </div>
			<div class="pb-3">
			<button type="reset" class="btn btn-danger">Cancel</button>
            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
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
            </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
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
