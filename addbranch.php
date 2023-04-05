<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un succursale</title>
	<link rel="icon" type="image/png" href="img/fav.png" />

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
					<h1 class="h3 mb-2 text-gray-800">Ajouter un succursale</h1>
					




					
					<!-- Processing form data when form is submitted -->
					<?php

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();
						


 						// Taking all  values from the form data(input)
						$nom =  $_REQUEST['nom'];
						$telephone =  $_REQUEST['telephone'];
						

						
						
						$adresse =  $_REQUEST['adresse'];
						$ville =  $_REQUEST['ville'];
						$province =  $_REQUEST['province'];
						$code_postal =  $_REQUEST['code_postal'];
						$pays  =  $_REQUEST['pays'];

					
						
						// Performing insert query execution
						// here our table name is adresse
						$sql = "INSERT INTO adresse (adresse,ville,province,code_postal,pays)   VALUES ('$adresse', 
						'$ville','$province','$code_postal','$pays')";

						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql)=== TRUE){

						//get the last address id inserted	
							$last_address_id = mysqli_insert_id($conn) ;
							//echo "<h3 class='error-msg'>l'adresse a été ajoutés dans le système avec succès.</h3>" ;	
						} else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}

						
						

						// Performing insert query execution
						// here our table name is employe
						$sql3 = "INSERT INTO succursale (id_adresse, nom, telephone)   VALUES ($last_address_id, '$nom', 
						'$telephone')";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql3) === TRUE){
							echo "<h3 class='success-msg'>le succursale a été ajoutés dans le système avec succès.</h3>" ;  ?> 

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="branch.php" class="btn btn-primary btn-user btn-block">Voir la liste des succursale</a> 
								</div>
								<div class="col-sm-6">
								<a href="addbranch.php" class="btn btn-secondary btn-user btn-block">Ajouter un nouveau succursale</a> 
									
								</div>
							</div>




<?php } else{
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
									<span class="required error" id="adresse-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text" name="nom"
								id="nom" placeholder="Nom">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="form-label">
									<span class="required error" id="adresse-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text" name="adresse"
								id="adresse" placeholder="Adresse">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-12">

								<div class="form-label">
									<span class="required error" id="ville-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="text" name="ville" id="ville" placeholder="Ville">  
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
									<span class="required error" id="province-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="province" id="province"
								placeholder="Province">
							</div>
							<div class="col-sm-6">
								<div class="form-label">
									<span class="required error" id="code_postal-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="code_postal" id="code_postal"
								placeholder="Code Postal">
							</div>
						</div>

						


							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
										<span class="required error " id="pays-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un role" name="pays" id="pays" >
									<option selected disabled>Choisir le pays</option>
									<option value="Canada">Canada</option>
									</select>
								</div>

								<div class="col-sm-6">
								<div class="form-label">
										<span class="required error" id="telephone-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="telephone" id="telephone"
									placeholder="Téléphone">
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