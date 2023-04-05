<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Profil d'un utilisateur</title>
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
					<h1 class="h3 mb-2 text-gray-800">Profil utilisateur</h1>

					<?php

if(!empty($param_id_profil)){
	$param_id = $param_id_profil;
					


										//echo $param_id;

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
								<div class="col-6"><h6 class="m-0 font-weight-bold text-primary">Profil de l'utilisateur: <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6></div>
									  <div class="col-3"> 
						</div> <div class="col-3">
									
									</div>
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