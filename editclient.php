<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Modifier le client</title>
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
					<h1 class="h3 mb-2 text-gray-800">Modifier un profil client</h1>

					<?php
$conn = OpenCon();

		// Processing form data when form is submitted
		if(isset($_POST["id"]) && !empty($_POST["id"])){
			// Get hidden input value
		$id = $_REQUEST["id"]; 
		$ide = $_REQUEST["ide"]; 
		$ida = $_REQUEST["ida"]; 

	// Taking all  values from the form data(input)
		$username =  $_REQUEST['username'];
		$firstname =  $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];


		$datenaissance =  $_REQUEST['dob'];
		$sexe =  $_REQUEST['sexe'];
		$telephone =  $_REQUEST['telephone'];
		$assurance =  $_REQUEST['assurance'];

		$adresse =  $_REQUEST['adresse'];
		$ville =  $_REQUEST['ville'];
		$province =  $_REQUEST['province'];
		$code_postal =  $_REQUEST['code_postal'];
		$pays  =  $_REQUEST['pays'];

		if (! empty($_POST["signup-password"])) {
		
			// PHP's password_hash is the best choice to use to store passwords
			$password = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
		}

		// Performing update query execution
		// here our table name is adresse
		$sql = "UPDATE adresse SET adresse = '$adresse', ville = '$ville', province = '$province', code_postal = '$code_postal' , pays = '$pays'  WHERE id = $ida ";

		// check if insertion was succesfully done
		if(mysqli_query($conn, $sql)=== TRUE){

		
								
		//echo "<h3 class='success-msg'>l'adresse a été mis à jour avec succès.</h3>" ;	
		} else{
			echo "ERROR: Hush! Sorry $sql. " 
			. mysqli_error($conn);
		}



		// Performing update query execution
		// here our table name is utilisateur
		$sql2 = "UPDATE utilisateur SET password = COALESCE(NULLIF('$password',''), password),  email = '$email', nom = '$lastname', prenom = '$firstname'  WHERE id = $id ";

			// check if insertion was succesfully done
		if(mysqli_query($conn, $sql2) === TRUE){
			
		//echo "<h3 class='error-msg'>l'utilisateur a été mis à jour  avec succès.</h3>" ;
		} else{
			echo "ERROR: Hush! Sorry $sql. " 
			. mysqli_error($conn);
		}

		// Performing update query execution
		// here our table name is employe
		$sql3 = "UPDATE patient SET datenaissance = '$datenaissance', sexe = '$sexe', telephone = $telephone,  assurance = '$assurance'  WHERE id = $ide";

		// check if insertion was succesfully done
		if(mysqli_query($conn, $sql3) === TRUE){
			echo "<h3 class='success-msg'>le client a été mis à jour  avec succès.</h3>" ;
			echo "<meta http-equiv='refresh' content='0;url=viewclient.php?id=$id'>";
		} else{
			echo "ERROR: Hush! Sorry $sql. " 
			. mysqli_error($conn);
		}

		 // Close connection
		mysqli_close($conn);




} else { 

					if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
						$param_id = trim($_GET["id"]);
										//echo $param_id;

					
					
					$sql = "SELECT utilisateur.id, utilisateur.nom, utilisateur.email, utilisateur.prenom, utilisateur.password, utilisateur.prenom, 
								patient.id AS ide, patient.id_succursale AS ids, patient.telephone, patient.datenaissance,  patient.sexe, patient.assurance,
								adresse.id AS ida, adresse.ville, adresse.province, adresse.pays, adresse.adresse, adresse.code_postal , succursale.nom AS snom
								FROM patient 
								INNER JOIN adresse ON patient.id_adresse = adresse.id INNER JOIN succursale ON patient.id_succursale = succursale.id
								INNER JOIN utilisateur ON patient.id_utilisateur = utilisateur.id  AND utilisateur.id = $param_id" ;

					$result = $conn->query($sql);

				}
			}

					if ($result->num_rows > 0) {
	
										// output data of each row
						while($row = $result->fetch_assoc()) { ?>

							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">

								<div class="row">
  									<div class="col-8"><h6 class="m-0 font-weight-bold text-primary"> 	<h6 class="m-0 font-weight-bold text-primary">Profil de l'employé: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6></h6></div>
 									 <div class="col-4"></div>
								</div>

								<?php  $pam = $row["ids"] ?>
								</div>
								<div class="card-body">


									<form name="sign-up" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="user edit"
										onsubmit="return signupValidation()">
										

										<fieldset class="border p-2">
											<legend  class="w-auto">Information du client</legend>

											
											<div class="error-msg" id="error-msg"></div>


											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"><span class="lab">Prénom </span>
														<span class="required error" id="firstname-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="firstname"  value="<?php  echo $row["prenom"] ?>" id="firstname"
													  >
												</div>
												<div class="col-sm-6">
													<div class="form-label"><span class="lab">Nom</span> 
														<span class="required error" id="lastname-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="lastname" placeholder="courriel" value="<?php  echo $row["nom"] ?>" id="lastname"
													  >
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">

													<div class="form-label"> <span class="lab">Courriel</span> 
														<span class="required error" id="email-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="email" name="email" id="email" value="<?php  echo $row["email"] ?>"   >  
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-12">
													<div class="form-label"> <span class="lab">Adresse</span> 
														<span class="required error" id="adresse-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="text" name="adresse"
													id="adresse" value="<?php  echo $row["adresse"] ?>"   >
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">

													<div class="form-label"><span class="lab">Ville</span> 
														<span class="required error" id="ville-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="text" name="ville" id="ville" value="<?php  echo $row["ville"] ?>"   >  
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"> <span class="lab">Province</span> 
														<span class="required error" id="province-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="province" id="province"
													  value="<?php  echo $row["province"] ?>">
												</div>
												<div class="col-sm-6">
													<div class="form-label"><span class="lab">Code Postal</span> 
														<span class="required error" id="code_postal-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="code_postal" id="code_postal"
													   value="<?php  echo $row["code_postal"] ?>">
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"><span class="lab">Pays</span> 
														<span class="required error " id="pays-info"></span>
													</div>
													<select class="form-select" aria-label="Choisir un role" name="pays" id="pays"   >
														<option selected  >Choisir le pays</option>
														<option value="Canada" <?php  if($row["pays"] == "Canada") { echo "selected"; }?>>Canada</option>
													</select>
												</div>
											</div>

										</fieldset>



										<fieldset class="border p-2">
							<legend  class="w-auto">Information sur le dossier</legend>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label"> <span class="lab">Date de Naissance</span> 
										<span class="required error" id="dob-info"></span>
									</div>
									<input type="date" class="form-control form-control-user" name="dob" id="dob"
									placeholder="Date de naissance" value="<?php  echo $row["datenaissance"] ?>"  >
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label"> <span class="lab">Genre</span> 
										<span class="required error " id="sexe-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un genre" name="sexe" id="sexe"  >
										<option selected  >Genre</option>
										<option value="Masculin"  <?php  if($row["sexe"] == "Masculin") { echo "selected"; }?> >Masculin</option>
										<option value="Masculin"  <?php  if($row["sexe"] == "Masculin") { echo "selected"; }?>>Féminin</option>
										<option value="Préfère ne pas répondre"  <?php  if($row["sexe"] == "Préfère ne pas répondre") { echo "selected"; }?>>Préfère ne pas répondre</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label"> <span class="lab">Téléphone</span> 
										<span class="required error" id="tel-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="telephone" id="telephone"
									placeholder="Téléphone" value="<?php  echo $row["telephone"] ?>"  >
								</div>
								<div class="col-sm-6">
									<div class="form-label">  <span class="lab">Assurance</span> 
										<span class="required error " id="assurance-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="assurance" id="assurance"
									placeholder="Assurance" value="<?php  echo $row["assurance"] ?>"  >
								</div>
							</div>

						


						

						</fieldset>
											<fieldset class="border p-2">
												<legend  class="w-auto">Succursale affilié</legend>
												<?php echo $row["snom"] ?>  <!--  <a href="#" data-toggle="modal" data-target="#changeSucc"> <i class="fas fa-edit"></i></a> -->
												</fieldset>

											<fieldset class="border p-2">
												<legend  class="w-auto">Mot de passe temporaire</legend>

												<div class="error-msg" id="error-msg2"></div>
												<div class="form-group row">
													<div class="col-sm-6 mb-3 mb-sm-0">
														<div class="form-label">
															<span class="required error" id="signup-password-info"></span>
														</div>
														<input class="input-box-330 form-control form-control-user" type="password"
														name="signup-password" id="signup-password" placeholder="Mot de Passe temporaire" >
													</div>
													<div class="col-sm-6">
														<div class="form-label">
															<span class="required error"
															id="confirm-password-info"></span>
														</div>
														<input class="input-box-330 form-control form-control-user" type="password"
														name="confirm-password" id="confirm-password" placeholder="Confirmer le Mot de Passe" >

													</div>
												</div>

											</fieldset>


											<div class="form-group row">
												<div class="col-sm-12">
													<input type="hidden" name="id" value="<?php  echo $row["id"] ?>"/>
													<input type="hidden" name="ide" value="<?php  echo $row["ide"] ?>"/>
													<input type="hidden" name="ida" value="<?php  echo $row["ida"] ?>"/>
													<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
													id="signup-btn" value="Mettre à jour">
												</div>
											</div>
										
									</form>

								</div>
							</div>

						<?php  }
					} else {
						echo "0 results";
					}
					CloseCon($conn);                              
					?>

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