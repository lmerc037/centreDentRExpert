<?php include "header.php"; ?>





<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un procedure</title>
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
					<h1 class="h3 mb-2 text-gray-800">Ajouter un procedure</h1>
					




					<!-- Processing form data when form is submitted -->
					<?php

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();
						
						

 						// Taking all 5 values from the form data(input)
						$categorie =  $_REQUEST['categorie'];
						$soins =  $_REQUEST['soins'];
						$code = $_REQUEST['code'];
						$cout = $_REQUEST['cout'];
						$restriction = $_REQUEST['restriction'];
					
						// Performing insert query execution
						// here our table name is utilisateur
						$sql = "INSERT INTO proceduredentaire (categorie,soins,code,cout,restriction)   VALUES ('$categorie','$soins','$code',$cout,'$restriction')";
						
						if(mysqli_query($conn, $sql)){
							echo "<h3 class='success-msg'>l'utilisateur a été ajoutés dans le système avec succès.</h3>" ; ?>

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="procedure.php" class="btn btn-primary btn-user btn-block">Voir la liste des procedure</a> 
								</div>
								<div class="col-sm-6">
								<a href="addprocedure.php" class="btn btn-secondary btn-user btn-block">Ajouter un nouveau procedure</a> 
									
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
									<span class="required error" id="categorie-info"></span>
								</div>
								<select class="form-select" aria-label="Choisir un type" name="categorie" id="categorie" >
										<option selected disabled>Choisir une catégorie</option>
										<option value="Diagnostic">Diagnostic</option>
										<option value="Prévention">Prévention</option>
										<option value="Procédures d’urgence">Procédures d’urgence </option>
										<option value="Carie - trauma et contrôle de la douleur">Carie - trauma et contrôle de la douleur</option>
										<option value="Restauration">Restauration</option>
										<option value="Endodontie">Endodontie</option>
										<option value="Parodontie">Parodontie</option>
										<option value="Chirurgiebuccale">Chirurgiebuccale</option>
										<option value="Anesthésie">Anesthésie</option>
										<option value="Prothèses fixes">Prothèses fixes</option>
										<option value="Prothèses amovibles">Prothèses amovibles</option>
									
									
				
									</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">

								<div class="form-label">
									<span class="required error" id="soins-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text" name="soins" id="soins" placeholder="Soins dentaires">  
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
									<span class="required error" id="code-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="code" id="code"
								placeholder="Code">
							</div>
							<div class="col-sm-6">
								<div class="form-label">
									<span class="required error" id="cout-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="cout" id="cout"
								placeholder="Coût">
							</div>
						</div>
						<div class="error-msg" id="error-msg2"></div>
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="form-label">
									<span class="required error" id="restriction-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text"
								name="restriction" id="restriction" placeholder="Restrictions">
							</div>
							
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
								id="signup-btn" value="Ajouter">
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