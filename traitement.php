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
					<h1 class="h3 mb-2 text-gray-800">Traitement</h1>

					<?php

					if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
						$param_id = trim($_GET["id"]);
										//echo $param_id;

					}
					$conn = OpenCon();
					$sql = "SELECT utilisateur.id AS idu, utilisateur.nom, utilisateur.email, utilisateur.prenom, utilisateur.password, utilisateur.prenom, 
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
							<div class="card shadow mb-4 user">
								<div class="card-header py-3">

								<div class="row">
  									<div class="col-6">	<h6 class="m-0 font-weight-bold text-primary">Profil du client: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6></div>
 									
									  <div class="col-3"> </div>
									  <div class="col-3"></div>
									</div>

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

											


											
										</fieldset>



										
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

			
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Ajouter un Traitement</h1>
					




					<!-- Processing form data when form is submitted -->
					<?php

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();
						
						$param_id2 = trim($_GET["id"]);

						 // Taking all 5 values from the form data(input)
						 $idp2 =  $_REQUEST['idp'];
						
						$date =  $_REQUEST['date'];
						$dent =  $_REQUEST['dent'];
						$soins = $_REQUEST['soins'];
				
						$commentaire = $_REQUEST['commentaire'];
					
						// Performing insert query execution
						// here our table name is utilisateur
						$sql = "INSERT INTO traitement (id_proceduredentaire,id_patient, date,dents,commentaire)   VALUES ($soins,$idp2,'$date','$dent','$commentaire')";
						
						if(mysqli_query($conn, $sql)){
							echo "<h3 class='success-msg'>Le traitement a été ajoutés dans le système avec succès.</h3>" ; ?>

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<?php echo '<a href="viewclient.php?id='.$param_id2.'" class="mr-3 btn btn-primary btn-user btn-block" title="Update Record" data-toggle="tooltip" style="float:right">Retour sur le profil</span></a>';?> </a>
								</div>
								<div class="col-sm-6">
								<?php echo '<a href="traitement.php?id='.$param_id2.'" class="mr-3 btn btn-primary btn-user btn-block" title="Update Record" data-toggle="tooltip" style="float:right">Ajoutez un nouveau traitement</span></a>';?> </a>
									
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
					

					<form name="sign-up" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"  method="post" class="user"
						onsubmit="return signupValidation()">
						
						
						<div class="error-msg" id="error-msg"></div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="form-label">
									<span class="required error" id="soins-info"></span>
								</div>



								<select class="form-select" aria-label="Choisir un type" name="soins" id="soins" >
										<option selected disabled>Choisir un service dentaire</option>
										<?php $conn = OpenCon();
									$sql4 = "SELECT proceduredentaire.id, proceduredentaire.soins FROM proceduredentaire";
									$result = $conn->query($sql4);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo $row["id"] ?>"><?php echo $row["soins"] ?></option>
										<?php } 
									} else {
										echo "0 results";
									} // Close connection
										mysqli_close($conn);	?>
									
									
				
									</select>
							</div>
						</div>
					
						
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<div class="form-label">
									<span class="required error" id="date-info"></span>
								</div>
								<input type="datetime-local" class="form-control form-control-user" name="date" id="date"
									placeholder="Date et Heure" >
							</div>
							<div class="col-sm-6">
								<div class="form-label">
									<span class="required error" id="cout-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="dent" id="dent"
								placeholder="Dent">
							</div>
						</div>

						<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error" id="commentaire-info"></span>
                                    </div>
                                    <textarea class="form-control " id="commentaire" name="commentaire" rows="3" placeholder="Commentaires"></textarea>
									
								</div>
								</div>

						<div class="form-group row">
						
							<div class="col-sm-12">
							
							<input type="hidden" name="idp" value="<?php  echo $idp ?>"/>
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

</body>

</html>