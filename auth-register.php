
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | Interactive Classroom</title>
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

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="index.html" class="">
                                        <img src="assets/images/logo-sm.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                        <img src="assets/images/logo-sm.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                
                                <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>
                                <p class="text-muted text-center mb-4">Get your free classroom account now.</p>
                                <?php
							require('db.php');
							// When form submitted, insert values into the database.
							if (isset($_REQUEST['username'])) {
								// removes backslashes
								$username = stripslashes($_REQUEST['username']);
								//escapes special characters in a string
								$username = mysqli_real_escape_string($con, $username);
								$email    = stripslashes($_REQUEST['email']);
								$email    = mysqli_real_escape_string($con, $email);
								$password = stripslashes($_REQUEST['password']);
								$password = mysqli_real_escape_string($con, $password);
								$create_datetime = date("Y-m-d H:i:s");
								$query    = "INSERT into `users` (username, password, email, create_datetime)
											 VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
								$result   = mysqli_query($con, $query);
								if ($result) {
									echo "<div class='form'>
										  <h3>You are registered successfully.</h3><br/>
										  <p class='link'>Click here to <a href='auth-login.php'>Login</a></p>
										  </div>";
								} else {
									echo "<div class='form'>
										  <h3>Required fields are missing.</h3><br/>
										  <p class='link'>Click here to <a href='auth-register.php'>registration</a> again.</p>
										  </div>";
								}
							} else {
						?>
                                <form class="form-horizontal" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email">        
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="term-conditionCheck">
                                                <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <p class="">Already have an account ?<a href="auth-login.php" class="fw-medium text-primary"> Login </a> </p>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
							}
							?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
