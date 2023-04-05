<?php include "header.php"; ?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Centre Dent'R Expert - Tableau de Bord</title>
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
						<h1 class="h3 mb-2 text-gray-800">Profil</h1>
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


							$ssn =  $_REQUEST['ssn'];
							$role =  $_REQUEST['role'];
							$type =  $_REQUEST['type'];
							$salaire =  $_REQUEST['salaire'];
							

						

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
							$sql3 = "UPDATE employe SET ssn = $ssn, role = '$role', type = '$type',  salaire = $salaire  WHERE id = $ide";

							// check if insertion was succesfully done
							if(mysqli_query($conn, $sql3) === TRUE){
								echo "<h3 class='success-msg'>l'employe a été mis à jour  avec succès.</h3>" ;
								echo "<meta http-equiv='refresh' content='0;url=viewemploye.php?id=$id'>";
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
								employe.id AS ide, employe.id_succursale AS ids, employe.role, employe.type,  employe.ssn, employe.salaire,
								adresse.id AS ida, adresse.ville, adresse.province, adresse.pays, adresse.adresse, adresse.code_postal , succursale.nom AS snom
								FROM employe 
								INNER JOIN adresse ON employe.id_adresse = adresse.id INNER JOIN succursale ON employe.id_succursale = succursale.id
								INNER JOIN utilisateur ON employe.id_utilisateur = utilisateur.id  AND utilisateur.id = $param_id" ;

								$result = $conn->query($sql);
							}
						}

						if ($result->num_rows > 0) {
					
									// output data of each row
							while($row = $result->fetch_assoc()) { ?>

								<!-- DataTales Example -->
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Profil de l'employé: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6>
										<?php  $pam = $row["ids"] ?>
									</div>
									<div class="card-body">
										

										<form name="sign-up" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="user edit"
											onsubmit="return signupValidation()">
											

										

											<fieldset class="border p-2">
												<legend  class="w-auto">Information de l'employée</legend>

												
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
												<legend  class="w-auto">Information sur le poste</legend>

												<div class="form-group row">
													<div class="col-sm-6 mb-3 mb-sm-0">
														<div class="form-label"><span class="lab">SSN</span> 
															<span class="required error" id="ssn-info"></span>
														</div>
														<input type="password" class="form-control form-control-user" name="ssn" id="ssn"
														value="<?php  echo $row["ssn"] ?>"   >
													</div>
													<div class="col-sm-6">
														<div class="form-label"><span class="lab">Rôle</span> 
															<span class="required error " id="role-info"></span>
														</div>
														
														<select class="form-select" aria-label="Choisir un role" name="role" id="role"    >
															<option selected  >Choisir un role</option>
															<option value="Dentiste" <?php  if($row["role"] == "Dentiste") { echo "selected"; }?>>Dentiste</option>
															<option value="Receptioniste" <?php  if($row["role"] == "Receptioniste") { echo "selected"; }?>>Receptioniste</option>
															<option value="Assistant dentiste" <?php  if($row["role"] == "Assistant dentiste") { echo "selected"; }?>>Assistant dentiste</option>
															<option value="Administrateur" <?php  if($row["role"] == "Administrateur") { echo "selected"; }?>>Administrateur</option>
															<option value="Directeur" <?php  if($row["role"] == "Directeur") { echo "selected"; }?>>Directeur</option>
															<option value="Hygieniste" <?php  if($row["role"] == "Hygieniste") { echo "selected"; }?>>Hygieniste</option>
															<option value="Preposé" <?php  if($row["role"] == "Preposé") { echo "selected"; }?>>Preposé</option>
														</select>
													</div>
												</div>
												

												<div class="form-group row">
													<div class="col-sm-6 mb-3 mb-sm-0">
														<div class="form-label"><span class="lab">Type</span> 
															<span class="required error " id="type-info"></span>
														</div>
														<select class="form-select" aria-label="Choisir un type" name="type" id="type"     >
															<option selected  >Choisir un type</option>
															<option value="Temps plein" <?php  if($row["type"] == "Temps plein") { echo "selected"; }?>>Temps plein</option>
															<option value="Temps partiel" <?php  if($row["type"] == "Temps partiel") { echo "selected"; }?>>Temps partiel</option>
															<option value="Temps partagé" <?php  if($row["type"] == "Temps partagé") { echo "selected"; }?>>Temps partagé</option>
															
														</select>
													</div>
													<div class="col-sm-6">
														<div class="form-label"><span class="lab">Salaire</span> 
															<span class="required error" id="salaire-info"></span>
														</div>
														<input type="text" class="form-control form-control-user" name="salaire" id="salaire"
														value="<?php  echo $row["salaire"] ?>"   >
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
						//	echo "0 results";
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