<?php
session_destroy();

require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());

$flag = 0;

if(isset($_GET['email']) && isset($_GET['regID'])){
	$email = mysqli_real_escape_string($con,$_GET['email']);
	$regID = mysqli_real_escape_string($con,$_GET['regID']);
	$myquery = "SELECT 	Selected FROM Phase1Registration WHERE Email = '".$email."' AND ID = ".$regID."";
  $result = mysqli_query($con,$myquery);
	if(mysqli_num_rows($result) > 0){
		$flag = 1;
		$row = $result->fetch_assoc();
		$status = $row['Selected'];
	}
	else{
		$flag = -1;
	}
}

 ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Registration | Unify - Responsive Website Template</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="assets/css/pages/page_log_reg_v1.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
	<div class="wrapper">
		<!--=== Header ===-->
		<?php
		require_once __DIR__ . '/header.php';
		?>
		<!--=== End Header ===-->

		<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Registration Status</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="">Pages</a></li>
					<li class="active">Registration</li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form class="reg-page" id="phase1Reg" method="get" action="">
						<div class="reg-header">
							<h2>Registration Status - Phase 1</h2>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Email ID <span class="color-red">*</span></label>
								<input type="text" name = "email" id = "email" class="form-control margin-bottom-20" <?php if($flag!=0){echo "value = '" . $_GET['email'] . "'";}?>>
							</div>
							<div class="col-sm-6">
								<label>Registration Number <span class="color-red">*</span></label>
								<input type="text" name = "regID" id = "regID" class="form-control margin-bottom-20" <?php if($flag!=0){echo "value = '" . $_GET['regID'] . "'";}?>>
							</div>
							<div class="col-sm-12 text-center">
								<?php
									if($flag==1){
										$regID = $_GET['regID'];
										$status = $row['Selected'];
										if ($status == NULL){
											echo "<h3>Registration Number - ".$regID."<br>EMail ID - ".$_GET['email']."<br><span style='color:#FF8C00;'>Status - Pending</span></h3>";
										}
										elseif ($status == 0){
											echo "<h3>Registration Number - ".$regID."<br>EMail ID - ".$_GET['email']."<br><span style='color:#8B0000;'>Status - Not selected</span></h3>";
										}
										elseif ($status == 1) {
											echo "<h3>Registration Number - ".$regID."<br>EMail ID - ".$_GET['email']."<br><span style='color:#006400;'>Status - Confirmed. Please Proceed to Phase 2 Registration.</span></h3>";
										}
									}
									elseif ($flag==-1) {
										echo "<h3>Email ID / Registration number is invalid. Please <a href='registration.php' target='_blank'>click here</a> if you haven't registered yet.</h3>";
									}
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">
								<button class="btn-u" name="finalSubmit" value="Submit" type="submit">Check Status</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Footer Version 1 ===-->
		<?php
		require_once __DIR__ . '/footer.php';
		?>
		<!--=== End Footer Version 1 ===-->
	</div>

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/gen_validatorv4.js"></script>
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
