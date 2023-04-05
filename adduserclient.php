<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un client</title>
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





				<div class="container-fluid user">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profil de utilisateur</h1>

<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
	$param_id = trim($_GET["id"]);
					

}
$conn = OpenCon();
$sql = "SELECT id, nom, email, prenom, horodatage FROM utilisateur WHERE id = $param_id" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	
					// output data of each row
	while($row = $result->fetch_assoc()) { ?>


		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
			<div class="row">
			<div class="col-8"><h6 class="m-0 font-weight-bold text-primary">Profil de l'utilisateur: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6></div>
				  <div class="col-4"> </div>
				</div>
			
			
			
			</div>
			<div class="card-body">


				<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user view"
					onsubmit="return signupValidation()">
					

					<fieldset class="border p-2">
						<legend  class="w-auto">Information de l'utilisateur</legend>

						
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
							<div class="col-sm-6 mb-3 mb-sm-0">
							<div class="form-label"> <span class="lab">Courriel</span> 
									<span class="required error" id="email-info"></span>
								</div>
								<input class="input-box-330 form-control form-control-user" type="email" name="email" id="email" value="<?php  echo $row["email"] ?>" disabled >  
							
							</div>
							<div class="col-sm-6">
								<div class="form-label"><span class="lab">Date d'inscription</span> 
									<span class="required error" id="lastname-info"></span>
								</div>
								<input type="text" class="form-control form-control-user" name="lastname" placeholder="courriel" value="<?php  echo $row["horodatage"] ?>" id="horodatage"
								disabled >
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

</div>
<!-- /.container-fluid -->





				<?php

						if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
							$param_id2 = trim($_GET["id"]);
											

						}
						$conn = OpenCon();
						$sql = "SELECT id_utilisateur  FROM patient WHERE id_utilisateur  = $param_id2" ;

						$result = $conn->query($sql);

						if ($result->num_rows > 0) {

							
											// output data of each row
							while($row = $result->fetch_assoc()) { ?>

								
									<style>
									.deja{display:none!important;}
									</style>
									<div class="container-fluid">
									<h3 class="h3 mb-2 text-gray-800 ">Cette utilisateur est deja un  Client</h3>
									<a href="viewclient.php?id=<?php  echo $row['id_utilisateur'] ?>" class="mr-3" title="View Record" data-toggle="tooltip">Voir son profil</a>
							
							<br /><br />
								</div>


							<?php  }
						} else {
							//echo "0 results";
						}
						CloseCon($conn);                              
						?>




				<!-- Begin Page Content -->
				<div class="container-fluid deja">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Ajouter comme client</h1>
					



					<!-- Processing form data when form is submitted -->
					<?php

					$myid = trim($_GET["id"]);

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();

 					

						$datenaissance =  $_REQUEST['dob'];
						$sexe =  $_REQUEST['sexe'];
						$telephone =  $_REQUEST['telephone'];
						$assurance =  $_REQUEST['assurance'];
						$succursale =  $_REQUEST['succursale'];
						$parent =  $_REQUEST['parent'];

						
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
							//echo "<h3 class='success-msg'>l'adresse a été ajoutés dans le système avec succès.</h3>" ;	
						} else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}

						
					
						// Performing insert query execution
						// here our table name is employe
						$sql3 = "INSERT INTO patient (id_utilisateur,id_adresse,id_succursale,datenaissance,sexe,telephone,assurance,parent)   
						VALUES ($myid,$last_address_id,$succursale,'$datenaissance','$sexe',$telephone,'$assurance','$parent')";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql3) === TRUE){
							echo "<h3 class='success-msg'>Cette utilisateur a été ajouté comme client dans le système avec succès.</h3>" ;  ?> 

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="client.php" class="btn btn-primary btn-user btn-block">Voir la liste des clients</a> 
								</div>
								<div class="col-sm-6">
								<a href="user.php" class="btn btn-secondary btn-user btn-block">Retour sur la liste des utilisateur</a> 
									
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

					<form name="sign-up" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="user"
						onsubmit="return signupValidation()">
						

						<fieldset class="border p-2">
							<legend  class="w-auto">Adresse du client</legend>

							
							<div class="error-msg" id="error-msg"></div>
							
						


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
							<legend  class="w-auto">Information sur le dossier</legend>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label" style="margin-bottom:-15px; margin-top:-10px; ">
										<span class="required error" id="dob-info" style="background:#fff; margin-left:20px; padding:0 5px; font-size:12px;">Date de daissance</span>
									</div>
									<input type="date" class="form-control form-control-user" name="dob" id="dob"
									placeholder="Date de naissance" onchange="ageCalculator()">
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error " id="pays-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un genre" name="sexe" id="sexe" >
										<option selected disabled>Genre</option>
										<option value="Masculin">Masculin</option>
										<option value="Masculin">Féminin</option>
										<option value="Préfère ne pas répondre">Préfère ne pas répondre</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error" id="ssn-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="telephone" id="telephone"
									placeholder="Téléphone">
								</div>
								<div class="col-sm-6">
									<div class="form-label">
										<span class="required error " id="role-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="assurance" id="assurance"
									placeholder="Assurance">
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

								<div class="col-sm-6" id="myDIV" style="display:none">
									<div class="form-label">
										<span class="required error " id="role-info"></span>
									</div>
									<input type="text" class="form-control form-control-user" name="parent" id="parent"
									placeholder="Parent">
								</div>
							</div>

						</fieldset>


					

						<div class="form-group row">
							<div class="col-sm-12">
								<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
								id="signup-btn" value="Ajouter comme client">
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