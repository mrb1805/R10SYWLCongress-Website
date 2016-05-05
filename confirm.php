<?php

session_start();

require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());
$_SESSION['returnBack'] = 1;

// print_r($_POST);
// print_r($_SESSION);
include 'extraFunctions.php';



if(isset($_POST['firstName'])){
	$_SESSION['firstName'] = $_POST['firstName'];
	$_SESSION['lastName'] = $_POST['lastName'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['organisation'] = $_POST['organisation'];
	$_SESSION['membershipType'] = $_POST['membershipType'];
	$_SESSION['membershipNumber'] = $_POST['membershipNumber'];
	$_SESSION['membershipAge'] = $_POST['membershipAge'];
	$_SESSION['section'] = $_POST['section'];
	$_SESSION['Q1'] = $_POST['Q1'];
	$_SESSION['Q2'] = $_POST['Q2'];
	$_SESSION['Q3'] = $_POST['Q3'];
	$_SESSION['Q4'] = $_POST['Q4'];
	$_SESSION['returnBack'] = 0;
}
elseif(isset($_POST['finalSubmit'])){

	$firstName = mysqli_real_escape_string($con,$_SESSION['firstName']);
	$lastName = mysqli_real_escape_string($con,$_SESSION['lastName']);
	$email = mysqli_real_escape_string($con,$_SESSION['email']);
	$organisation = mysqli_real_escape_string($con,$_SESSION['organisation']);
	$membershipType = mysqli_real_escape_string($con,$_SESSION['membershipType']);
	$membershipNumber = mysqli_real_escape_string($con,$_SESSION['membershipNumber']);
	$membershipAge = mysqli_real_escape_string($con,$_SESSION['membershipAge']);
	$section = mysqli_real_escape_string($con,$_SESSION['section']);
	$Q1 = mysqli_real_escape_string($con,$_SESSION['Q1']);
	$Q2 = mysqli_real_escape_string($con,$_SESSION['Q2']);
	$Q3 = mysqli_real_escape_string($con,$_SESSION['Q3']);
	$Q4 = mysqli_real_escape_string($con,$_SESSION['Q4']);

	$myquery = "INSERT INTO `Phase1Registration`(`FullName`, `Organisation`, `MembershipType`, `MembershipNumber`, `MembershipAge`, `Section`, `Email`, `FirstTime`, `VolunteerRoles`, `Expectations`, `Suggestions`) VALUES ('".$firstName . " " . $lastName."','".$organisation."','".$membershipType."','".$membershipNumber."','".$membershipAge."','".$section."','".$email."','".$Q1."','".$Q2."','".$Q3."','".$Q4."')";
	writeToLog("SUBMIT FORM", $myquery); //To Keep Log Report
	if(mysqli_query($con, $myquery)){
		$flag=1;	// Form submission was successful
		$myquery = "SELECT ID FROM Phase1Registration WHERE Email = '".$_SESSION['email']."'";
		$result = mysqli_query($con, $myquery);
		if(mysqli_num_rows($result) == 0){
			writeToLog("ID Fetching Failed - ALERT - ",$to); //To Keep LOG REPORT
		}
		else{
			$name = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
			$row = $result->fetch_assoc();
			sendVerificationLink($name, $_SESSION['name'],$row['ID']);
			$redirectionLink = 'Location: status.php?email='.$_SESSION['email'].'&id='.$row['ID'];
			header($redirectionLink);
		}
	}
	else{
		echo $myquery;
		//writeToLog("SUBMIT FORMF Failed - ALERT - ", $myquery); //To Keep LOG REPORT
		$flag=-3;	// Form submission failed
	}
}
elseif(isset($_POST['goBack'])){
	$_SESSION['returnBack'] = -1;
	header('Location: registration.php');
}
// else{
// 	// User might be trying to open this page directy
// 	// session_destroy();
// 	// header('Location: registration.php');
// }

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
				<h1 class="pull-left">Registration Confirmation</h1>
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
					<form class="reg-page" id="phase1Reg" method="post" action="">
						<div class="reg-header">
							<h2>Registration Confirmation - Phase 1</h2>
							<p>Please verify it. Once you submit you will not be able to change.</p>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<label>First Name <span class="color-red">*</span></label>
								<input type="text" name = "firstName" id = "firstName" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['firstName'];?>">
							</div>
							<div class="col-sm-6">
								<label>Last Name <span class="color-red">*</span></label>
								<input type="text" name = "lastName" id = "lastName" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['lastName'];?>">
							</div>
						</div>

						<label>Email Address <span class="color-red">*</span></label>
						<input type="text" name = "email" id = "email" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['email'];?>">

						<label>Organisation/College <span class="color-red">*</span></label>
						<input type="text" name = "organisation" id = "organisation" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['organisation'];?>">

						<div class="row">
							<div class="col-sm-6">
								<label>Membership Type <span class="color-red">*</span></label>
								<input type="text" class="form-control margin-bottom-20" disabled value="<?php
									$myquery = "SELECT * FROM MembershipType WHERE `ID` = '".$_SESSION['membershipType']."'";
									$result = mysqli_query($con,$myquery);
									if(mysqli_num_rows($result) > 0){
										while($row = $result->fetch_assoc()){
											echo $row["Type"];
										}
									}
								?>">
							</div>
						<div class="col-sm-6">
								<label>Section <span class="color-red">*</span></label>
								<input type="text" class="form-control margin-bottom-20" disabled value="<?php
									$myquery = "SELECT * FROM Section WHERE `SID` = '".$_SESSION['section']."'";
									$result = mysqli_query($con,$myquery);
									if(mysqli_num_rows($result) > 0){
										while($row = $result->fetch_assoc()){
											echo $row["Section"];
										}
									}
								?>">
							</div>	
							
						</div>

						<div class="row">
							<div class="col-sm-6">
								<label>Membership Number <span class="color-red">*</span></label>
								<input type="text" name = "membershipNumber" id = "membershipNumber" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['membershipNumber'];?>">
							</div>
							<div class="col-sm-6">
								<label>IEEE Member since how many years? <span class="color-red">*</span></label>
								<input type="text" name = "membershipAge" id = "membershipAge" class="form-control margin-bottom-20" disabled value="<?php echo $_SESSION['membershipAge'];?>">
							</div>
						</div>

						<div class="row">
							
						</div>

						<label>Had you been  a delegate for any previous IEEE R10 Congress? If yes, when and where ?</label>
						<input type="text" name = "Q1" id = "Q1" class="form-control margin-bottom-20" value="<?php echo $_SESSION['Q1'];?>"  disabled>

						<label>Your Current and Past volunteer roles in IEEE ?<span class="color-red">*</span></label>
						<textarea type="text" name = "Q2" id = "Q2" class="form-control margin-bottom-20" disabled><?php echo $_SESSION['Q2'];?></textarea>

						<label>Expectations from the Congress <span class="color-red">*</span></label>
						<textarea type="text" name = "Q3" id = "Q3" class="form-control margin-bottom-20" disabled><?php echo $_SESSION['Q3'];?></textarea></textarea>

						<label>Suggestions/Comments?</label>
						<textarea type="text" name = "Q4" id = "Q4" class="form-control margin-bottom-20" disabled><?php echo $_SESSION['Q4'];?></textarea>

						<hr>

						<div class="row">
							<div class="col-lg-12 text-right">
								<button class="btn-u" name="goBack" value="Submit" type="submit">Go Back</button>
								<button class="btn-u" name="finalSubmit" value="Submit" type="submit">Register</button>
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
	<script type="text/javascript">
		<?php
			if($flag==1){
				echo "alert('Your registration is sucessful. Please check your mail for more details.');
						window.location = 'registration.php';";
			}
			if($flag==-3){
				echo "alert('Something went wrong. Please try again. If still getting error, please contact admin at registration@ieeer10.org');";
			}
		?>
	</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
