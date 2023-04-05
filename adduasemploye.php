<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un employé</title>
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
					<h1 class="h3 mb-2 text-gray-800">Ajouter un employé</h1>
					



					<!-- Processing form data when form is submitted -->
					<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){

						$conn = OpenCon();
						



						$ssn =  $_REQUEST['ssn'];
						$role =  $_REQUEST['role'];
						$type =  $_REQUEST['type'];
						$salaire =  $_REQUEST['salaire'];
						$succursale =  $_REQUEST['succursale'];
						
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
						// here our table name is utilisateur
						$sql2 = "INSERT INTO utilisateur (username, password, email, nom, prenom)   VALUES ('$username', 
						'$password','$email','$lastname','$firstname')";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql2) === TRUE){
							$last_user_id = mysqli_insert_id($conn) ;					
							//echo "<h3 class='error-msg'>l'utilisateur a été ajoutés dans le système avec succès.</h3>" ;
						} else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}

						// Performing insert query execution
						// here our table name is employe
						$sql3 = "INSERT INTO employe (id_utilisateur,id_adresse,id_succursale,ssn,role,type,salaire)   VALUES ($last_user_id,$last_address_id,$succursale,
						$ssn,'$role','$type',$salaire)";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql3) === TRUE){
							echo "<h3 class='success-msg'>l'employe a été ajoutés dans le système avec succès.</h3>" ;  ?> 

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="employe.php" class="btn btn-primary btn-user btn-block">Voir la liste des employé</a> 
								</div>
								<div class="col-sm-6">
								<a href="addemploye.php" class="btn btn-secondary btn-user btn-block">Ajouter un nouveau employé</a> 
									
								</div>
							</div>




<?php } else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}
	
 						// Close connection
						mysqli_close($conn);

					} else{

							




					} 

					?>

					<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user"
						onsubmit="return signupValidation()">
						

						<fieldset class="border p-2">
							<legend  class="w-auto">Information de l'employée</legend>

							
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
							</div>

						</fieldset>

						<fieldset class="border p-2">
							<legend  class="w-auto">Information sur le poste</legend>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error" id="ssn-info"></span>
									</div>
									<input type="password" class="form-control form-control-user" name="ssn" id="ssn"
									placeholder="SSN">
								</div>
								<div class="col-sm-6">
									<div class="form-label">
										<span class="required error " id="role-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un role" name="role" id="role" >
										<option selected disabled>Choisir un role</option>
										<option value="Dentiste">Dentiste</option>
										<option value="Receptioniste">Receptioniste</option>
										<option value="Assistant dentiste">Assistant dentiste</option>
										<option value="Administrateur">Administrateur</option>
										<option value="Directeur">Directeur</option>
										<option value="Hygieniste">Hygieniste</option>
										<option value="Preposé">Preposé</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error " id="type-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un type" name="type" id="type" >
										<option selected disabled>Choisir un type</option>
										<option value="Temps plein">Temps plein</option>
										<option value="Temps partiel">Temps partiel</option>
										<option value="Temps partagé">Temps partagé</option>
										
									</select>
								</div>
								<div class="col-sm-6">
									<div class="form-label">
										<span class="required error" id="salaire-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="salaire" id="salaire"
									placeholder="Salaire">
								</div>
							</div>



							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error " id="pays-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un role" name="succursale" id="succursale" >
										<option selected disabled>Choisir le succursalle</option>


										<?php $conn = OpenCon();
									$sql4 = "SELECT succursale.id, succursale.nom FROM succursale";
									$result = $conn->query($sql4);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo $row["id"] ?>"><?php echo $row["nom"] ?></option>
										<?php } 
									} else {
										echo "0 results";
									} // Close connection
										mysqli_close($conn);	?>


										
									</select>
								</div>
							</div>


								


						</fieldset>


					

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

</body>

</html>