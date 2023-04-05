<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Effacer un utilisateur</title>
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
					<h1 class="h3 mb-2 text-gray-800">Effacer un utilisateur</h1>

					<?php

					$conn = OpenCon(); 

					// Processing form data when form is submitted
					if(isset($_POST["id"]) && !empty($_POST["id"])){
						// Get hidden input value
						$id = $_REQUEST["id"]; 
					


						// Performing update query execution
						// here our table name is utilisateur
						$sql2 = "DELETE FROM utilisateur   WHERE id = $id ";

						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql2) === TRUE){
							
							echo "<h3 class='success-msg'>l'utilisateur a été effacé  avec succès.</h3>" ;
							echo "<meta http-equiv='refresh' content='0;url=user.php'> ";

						} else{


							
							//echo "ERROR: Hush! Sorry $sql. " 
							
							//. mysqli_error($conn);

							echo "<h3 class='error-msg'>Attention! Ce compte est associé à un client ou un employé. Impossible de l'effacer </h3>" ;
							echo "<center><a href='user.php'>Retour à la liste des utilisateurs</a></center>";
						}

 						// Close connection
						mysqli_close($conn);



					} else { 
						

						if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
							$param_id = trim($_GET["id"]);
								//echo $param_id;

							
							
							$sql = "SELECT id,nom,prenom FROM utilisateur WHERE id = $param_id" ;

							$result = $conn->query($sql);
						}
					}

					if ($result->num_rows > 0) {

						
								// output data of each row
						while($row = $result->fetch_assoc()) { ?>

							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary"> Etez-vous sûr de vouloir effacer l'utilisateur : <?php  echo $row["prenom"] ?>	<?php  echo $row["nom"] ?></h6>
								</div>
								<div class="card-body">
									

									<form name="sign-up" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="user view"
										onsubmit="return signupValidation()">
										


										<div class="form-group row">
											<div class="col-sm-6 mb-3 mb-sm-0">
												<input type="hidden" name="id" value="<?php  echo $row["id"] ?>"/>
												
												<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
												id="signup-btn" value="Effacer">
											</div>
											<div class="col-sm-6">
												
												<a href="user.php" class="btn btn-secondary btn-user btn-block">Annuler</a>
											</div>
										</div>
	
									</form>

								</div>
							</div>

						<?php  }
					} else {
						//echo "0 results";
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