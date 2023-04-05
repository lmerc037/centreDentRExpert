<?php include "header.php"; ?>





<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un utilisateur</title>
	<?php include "script.php"; ?>

	<!-- Custom fonts for this template -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php 
		include "sidebar.php"
		?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php
				include "topbar.php";
				?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Ajouter un utilisateur</h1>
					




					<!-- Processing form data when form is submitted -->
					<?php

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();
						
						

 						// Taking all 5 values from the form data(input)
						$username =  $_REQUEST['username'];
						$firstname =  $_REQUEST['firstname'];
						$lastname = $_REQUEST['lastname'];
						$email = $_REQUEST['email'];
						if (! empty($_POST["signup-password"])) {

						// PHP's password_hash is the best choice to use to store passwords
						// do not attempt to do your own encryption, it is not safe
							$password = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
						}
						
						// Performing insert query execution
						// here our table name is utilisateur
						$sql = "INSERT INTO utilisateur (username, password, email, nom, prenom)   VALUES ('$username', 
						'$password','$email','$lastname','$firstname')";
						
						if(mysqli_query($conn, $sql)){
							echo "<h3 class='success-msg'>l'utilisateur a été ajoutés dans le système avec succès.</h3>" ; ?>

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="user.php" class="btn btn-primary btn-user btn-block">Voir la liste des utilisateur</a> 
								</div>
								<div class="col-sm-6">
								<a href="adduser.php" class="btn btn-secondary btn-user btn-block">Ajouter un nouveau utilisateur</a> 
									
								</div>
							</div>


					<?php		
						} else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}
						
 						// Close connection
						mysqli_close($conn);


					}

					?>
					

					<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user"
						onsubmit="return signupValidation()">
						
						
						<div class="error-msg" id="error-msg"></div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="form-label">
									<span class="required error" id="username-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text" name="username"
								id="username" placeholder="Pseudonyme">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">

								<div class="form-label">
									<span class="required error" id="email-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="email" name="email" id="email" placeholder="courriel">  
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
									<span class="required error" id="firstname-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="firstname" id="firstname"
								placeholder="Prénom">
							</div>
							<div class="col-sm-6">
								<div class="form-label">
									<span class="required error" id="lastname-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="lastname" id="lastname"
								placeholder="Nom">
							</div>
						</div>
						<div class="error-msg" id="error-msg2"></div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
									<span class="required error" id="signup-password-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="password"
								name="signup-password" id="signup-password" placeholder="Mot de Passe">
							</div>
							<div class="col-sm-6">
								<div class="form-label">
									<span class="required error"
									id="confirm-password-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="password"
								name="confirm-password" id="confirm-password" placeholder="Confirmer le Mot de Passe">

							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
								id="signup-btn" value="Soumettre">
							</div>
						</div>
					</form>

					
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Footer -->
	<?php
	include "footer.php";
	
	?>
	<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>



<script>
	function signupValidation() {
		var valid = true;

		$("#username").removeClass("error-field");
		$("#email").removeClass("error-field");
		$("#password").removeClass("error-field");
		$("#confirm-password").removeClass("error-field");
		$("#firstname").removeClass("error-field");
		$("#lastname").removeClass("error-field");


		var fName = $("#firstname").val();
		var lName = $("#lastname").val();
		var UserName = $("#username").val();
		var email = $("#email").val();
		var Password = $('#signup-password').val();
		var ConfirmPassword = $('#confirm-password').val();
		var emailRegex =
		/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		$("#username-info").html("").hide();
		$("#email-info").html("").hide();

		if (UserName.trim() == "") {
			$("#username-info").html("pseudo obligatoire").css("color", "#ee0000").show();
			$("#username").addClass("error-field");
			valid = false;
		}
		if (fName.trim() == "") {
			$("#firstname-info").html("Prénom obligatoire").css("color", "#ee0000").show();
			$("#firstname").addClass("error-field");
			valid = false;
		}

		if (fName.trim() == "") {
			$("#lastname-info").html("Nom obligatoire").css("color", "#ee0000").show();
			$("#lastname").addClass("error-field");
			valid = false;
		}
		
		if (email == "") {
			$("#email-info").html("courriel obligatoire").css("color", "#ee0000").show();
			$("#email").addClass("error-field");
			valid = false;
		} else if (email.trim() == "") {
			$("#email-info").html("courriel invalide").css("color", "#ee0000").show();
			$("#email").addClass("error-field");
			valid = false;
		} else if (!emailRegex.test(email)) {
			$("#email-info").html("courriel invalide").css("color", "#ee0000")
			.show();
			$("#email").addClass("error-field");
			valid = false;
		}
		if (Password.trim() == "") {
			$("#signup-password-info").html("Mot de passe obligatoire.").css("color", "#ee0000").show();
			$("#signup-password").addClass("error-field");
			valid = false;
		}
		if (ConfirmPassword.trim() == "") {
			$("#confirm-password-info").html("Veuillez confirmer le mot de passe").css("color", "#ee0000").show();
			$("#confirm-password").addClass("error-field");
			valid = false;
		}
		if (Password != ConfirmPassword) {
			$("#error-msg2").html("Les deux mot de passe doivent etre le même").show();
			valid = false;
		}
		if (valid == false) {
			$('.error-field').first().focus();
			valid = false;
		}
		return valid;
	}
</script>

</body>

</html>