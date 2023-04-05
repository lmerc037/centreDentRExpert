<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Ajouter un utilisateur</title>

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
					<h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
					

					

					<form name="sign-up" action="" method="post" class="user"
				onsubmit="return signupValidation()">
				
				
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
<div class="error-msg" id="error-msg2"></div>
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<div class="form-label">
							<span class="required error" id="signup-password-info"></span>
						</div>
						<input class="input-box-330 form-control form-control-user" type="password"
						name="signup-password" id="signup-password" placeholder="Mot de Passe">
					</div>
					<div class="col-sm-6">
						<div class="form-label">
							<span class="required error"
							id="confirm-password-info"></span>
						</div>
						<input class="input-box-330 form-control form-control-user" type="password"
						name="confirm-password" id="confirm-password" placeholder="Confirmer le Mot de Passe">

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

</body>

</html>