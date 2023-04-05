<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Profil client</title>
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
					<h1 class="h3 mb-2 text-gray-800">Dossier médical</h1>

					<?php

if(!empty($param_id_profil)){
	$param_id = $param_id_profil;
										//echo $param_id;

					}
					$conn = OpenCon();
					$sql = "SELECT utilisateur.id, utilisateur.nom, utilisateur.email, utilisateur.prenom, utilisateur.password, utilisateur.prenom, 
								patient.id AS idp, patient.id_succursale AS ids, patient.telephone, patient.datenaissance,  patient.sexe, patient.assurance,
								adresse.id AS ida, adresse.ville, adresse.province, adresse.pays, adresse.adresse, adresse.code_postal , succursale.nom AS snom
								FROM patient 
								INNER JOIN adresse ON patient.id_adresse = adresse.id INNER JOIN succursale ON patient.id_succursale = succursale.id
								INNER JOIN utilisateur ON patient.id_utilisateur = utilisateur.id  AND utilisateur.id = $param_id" ;

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
	
										// output data of each row
						while($row = $result->fetch_assoc()) { ?>

							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">

								<div class="row">
  									<div class="col-4">	<h6 class="m-0 font-weight-bold text-primary">Profil du client: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6></div>
 									 <div class="col-3"></div>
									  <div class="col-3"> </div>
									  <div class="col-1"> </div>
									</div>
									<?php  $pam = $row["ids"] ?>
								<?php  $test = $row["prenom"] ?>

								<?php  $idp = $row["idp"] ?>
								</div>
								<div class="card-body">


									<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user view"
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
													disabled >
												</div>
												<div class="col-sm-6">
													<div class="form-label"><span class="lab">Nom</span> 
														<span class="required error" id="lastname-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="lastname" placeholder="courriel" value="<?php  echo $row["nom"] ?>" id="lastname"
													disabled >
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">

													<div class="form-label"> <span class="lab">Courriel</span> 
														<span class="required error" id="email-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="email" name="email" id="email" value="<?php  echo $row["email"] ?>" disabled >  
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-12">
													<div class="form-label"> <span class="lab">Adresse</span> 
														<span class="required error" id="adresse-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="text" name="adresse"
													id="adresse" value="<?php  echo $row["adresse"] ?>" disabled >
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-12">

													<div class="form-label"><span class="lab">Ville</span> 
														<span class="required error" id="ville-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="text" name="ville" id="ville" value="<?php  echo $row["ville"] ?>" disabled >  
												</div>
											</div>

											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"> <span class="lab">Province</span> 
														<span class="required error" id="province-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="province" id="province"
													disabled value="<?php  echo $row["province"] ?>">
												</div>
												<div class="col-sm-6">
													<div class="form-label"><span class="lab">Code Postal</span> 
														<span class="required error" id="code_postal-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="code_postal" id="code_postal"
													disabled  value="<?php  echo $row["code_postal"] ?>">
												</div>
											</div>


											<div class="form-group row">
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"><span class="lab">Pays</span> 
														<span class="required error " id="pays-info"></span>
													</div>
													<select class="form-select" aria-label="Choisir un role" name="pays" id="pays" disabled >
														<option selected disabled>Choisir le pays</option>
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
									<input type="text" class="form-control form-control-user" name="dob" id="dob"
									placeholder="Date de naissance" value="<?php  echo $row["datenaissance"] ?>" disabled>
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label"> <span class="lab">Genre</span> 
										<span class="required error " id="sexe-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un genre" name="sexe" id="sexe" disabled>
										<option selected disabled>Genre</option>
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
									placeholder="Téléphone" value="<?php  echo $row["telephone"] ?>" disabled>
								</div>
								<div class="col-sm-6">
									<div class="form-label">  <span class="lab">Assurance</span> 
										<span class="required error " id="assurance-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="assurance" id="assurance"
									placeholder="Assurance" value="<?php  echo $row["assurance"] ?>" disabled>
								</div>
							</div>

						


							<div class="form-group row">
							
												<div class="col-sm-6 mb-3 mb-sm-0">
													<div class="form-label"><span class="lab">Succursale</span> 
														<span class="required error " id="pays-info"></span>
													</div>
													<select class="form-select" aria-label="Choisir un role" name="succursale" id="succursale" >
														<option selected disabled>Choisir le succursale</option>

														<?php //$conn = OpenCon();
													$sql4 = "SELECT succursale.id AS idss, succursale.nom FROM succursale";
													$result2 = $conn->query($sql4);
													if ($result2->num_rows > 0) {
														// output data of each row
														while($row = $result2->fetch_assoc()) { ?>
															<option value="<?php echo $row["idss"] ?>"  <?php  if($row["idss"] == $pam) { echo "selected"; }?>><?php echo $row["nom"] ?></option>
														<?php } 
													} // Close connection
														//mysqli_close($conn);	?>


														
													</select>
												</div>
											

								<div class="col-sm-6" id="myDIV" style="display:none">
									<div class="form-label"><span class="lab">Parent</span> 
										<span class="required error " id="role-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="parent" id="parent"
									placeholder="Parent" value="<?php  echo $row["datenaissance"] ?>" disabled>
								</div>
							</div>

						</fieldset>



										
									</form>

								</div>
							</div>

						<?php  }
					} else {
						echo "0 results";
					}
					CloseCon($conn);                              
					?>





					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Liste des rendez-vous</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Id</th>
											<th>Date</th>
											<th>Type</th>
											<th>Succursale</th>
										
											<th>Commentaire</th>
							
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>Id</th>
											<th>Date</th>
											<th>Type</th>
											<th>Succursale</th>
											<th>Commentaire</th>
							
										
										</tr>
									</tfoot>
									<tbody>

										<?php
										$conn = OpenCon();
										$sql = "SELECT rendezvous.id, rendezvous.date, rendezvous.type, rendezvous.id_succursale, rendezvous.commentaire , succursale.nom AS snom 
										FROM rendezvous
										INNER JOIN succursale ON rendezvous.id_succursale = succursale.id AND rendezvous.id_patient = $idp2 
										";

										$result = $conn->query($sql);
										if ($result->num_rows > 0) {

                                           
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>

										<tr>
											<td><?php echo $row["id"] ?></td>
											<td><?php  echo $row["date"] ?></td>
											<td><?php  echo $row["type"] ?></td>
											
											<td><?php  echo $row["snom"] ?></td>
											<td><?php  echo $row["commentaire"] ?></td>
											
										
											


									

										</tr>

										

										<?php  }
									} else {
									echo "0 results";
								}
								CloseCon($conn);                              
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>








			<!-- DataTales Example -->
			<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Liste des traitement</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Id</th>
											<th>Date</th>
											<th>Soins</th>
											<th>Dent</th>
											
										
											<th>Commentaire</th>
							
										
										</tr>
									</thead>
									<tfoot>
									<tr>
											<th>Id</th>
											<th>Date</th>
											<th>Soins</th>
											<th>Dent</th>
											
										
											<th>Commentaire</th>
							
										
										</tr>
									</tfoot>
									<tbody>

										<?php
										$conn = OpenCon();
										$sql = "SELECT traitement.id, traitement.date, traitement.dents, traitement.commentaire , proceduredentaire.id, proceduredentaire.soins, proceduredentaire.categorie  
										FROM traitement
										INNER JOIN proceduredentaire ON traitement.id_proceduredentaire = proceduredentaire.id AND traitement.id_patient = $idp2
										";

										$result = $conn->query($sql);
										if ($result->num_rows > 0) {

                                           
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>

										<tr>
											<td><?php echo $row["id"] ?></td>
											<td><?php  echo $row["date"] ?></td>
											<td><?php  echo $row["soins"] ?></td>
											<td><?php  echo $row["dents"] ?></td>
											
											
											<td><?php  echo $row["commentaire"] ?></td>
											
										
											


									

										</tr>

										

										<?php  }
									} else {
									echo "0 results";
								}
								CloseCon($conn);                              
								?>

							</tbody>
						</table>
					</div>
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