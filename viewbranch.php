<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Succursale</title>
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
					<h1 class="h3 mb-2 text-gray-800">Succursale</h1>

					<?php

					if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
						$param_id = trim($_GET["id"]);
										//echo $param_id;

					}
					$conn = OpenCon();
					$sql = "SELECT succursale.id, succursale.nom, succursale.telephone,   
					adresse.ville, adresse.province, adresse.pays, adresse.adresse, adresse.code_postal  
					FROM succursale 
						INNER JOIN adresse ON succursale.id_adresse = adresse.id AND succursale.id = $param_id" ;

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						
										// output data of each row
						while($row = $result->fetch_assoc()) { ?>


							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">

								<div class="row">
  									<div class="col-8"><h6 class="m-0 font-weight-bold text-primary"> 	<?php  echo $row["nom"] ?></h6></div>
 									 <div class="col-4"> <?php echo '<a href="editbranch.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip" style="float:right"><i class="fas fa-edit"></i></span></a>';?></div>
								</div>
									
								</div>
								<div class="card-body">


									<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user view"
										onsubmit="return signupValidation()">
										

										<fieldset class="border p-2">
											<legend  class="w-auto">Information du succursale</legend>

											
											<div class="error-msg" id="error-msg"></div>


											<div class="form-group row">
												<div class="col-sm-12">
													<div class="form-label"><span class="lab">Nom</span> 
														<span class="required error" id="lastname-info"></span>
													</div>
													<input type="text" class="form-control form-control-user" name="lastname" placeholder="courriel" value="<?php  echo $row["nom"] ?>" id="lastname"
													disabled >
												</div>
												</div>

											<div class="form-group row">
												<div class="col-sm-12">

													<div class="form-label"> <span class="lab">Téléphone</span> 
														<span class="required error" id="telephone-info"></span>
													</div>
													<input class="input-box-330 form-control form-control-user" type="text" name="telephone" id="telephone" value="<?php  echo $row["telephone"] ?>" disabled >  
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


									</form>

								</div>
							</div>




<!-- DataTales Example -->
				<div class="card shadow mb-4">
										<div class="card-header py-3">
											<h6 class="m-0 font-weight-bold text-primary">Liste des patients</h6>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered" id="" class="display" width="100%" cellspacing="0">
													<thead>
														<tr>
														<th>Id</th>
														<th>Prenom</th>
															<th>Nom</th>
															
															<th>Telephone</th>
															<th>Email</th>
															<th>Date Naissance</th>
															
															<th>Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Id</th>
															<th>Prenom</th>
															<th>Nom</th>
															
															<th>Telephone</th>
															<th>Email</th>
															<th>Date Naissance</th>
															
															<th>Action</th>
														</tr>
													</tfoot>
													<tbody>

														<?php
														$conn = OpenCon();
														$sql = "SELECT utilisateur.id, utilisateur.nom, utilisateur.prenom,utilisateur.email,  patient.telephone, patient.datenaissance,  adresse.ville 
														FROM patient 
															INNER JOIN adresse ON patient.id_adresse = adresse.id AND patient.id_succursale = $param_id
															INNER JOIN utilisateur ON patient.id_utilisateur = utilisateur.id;";

														$result = $conn->query($sql);
														if ($result->num_rows > 0) {

														
														// output data of each row
														while($row = $result->fetch_assoc()) { ?>

														<tr>
															<td><?php echo $row["id"] ?></td>
															<td><?php  echo $row["prenom"] ?></td>
															<td><?php  echo $row["nom"] ?></td>
															
															<td><?php  echo $row["telephone"] ?></td>
															<td><?php  echo $row["email"] ?></td>
															<td><?php  echo $row["datenaissance"] ?></td>

														<?php	echo "<td>";
															echo '<a href="viewclient.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
															echo '<a href="editclient.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fas fa-edit"></i></a>';
															echo '<a href="deleteclient.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
														echo "</td>"; ?>


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
											</div></div>



							<div class="card shadow mb-4">
										<div class="card-header py-3">
											<h6 class="m-0 font-weight-bold text-primary">Liste des employés</h6>
										</div>
										<div class="card-body">
											

										<div class="table-responsive">
												<table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
													<thead>
														<tr>
															<th>Id</th>
															<th>Prenom</th>
															<th>Nom</th>
															
															<th>Rôle</th>
															<th>Type</th>
															
															<th>Action</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>Id</th>
															<th>Prenom</th>
															<th>Nom</th>
															<th>Rôle</th>
															<th>Type</th>
															
															<th>Action</th>
														</tr>
													</tfoot>
													<tbody>
														<?php
														$conn = OpenCon();
														$sql = "SELECT utilisateur.id AS idu, utilisateur.nom, utilisateur.prenom,  employe.role, employe.type, employe.id_succursale, adresse.ville
														FROM employe 
															INNER JOIN adresse ON employe.id_adresse = adresse.id  AND employe.id_succursale = $param_id
															INNER JOIN utilisateur ON employe.id_utilisateur = utilisateur.id;";

														$result = $conn->query($sql);
														if ($result->num_rows > 0) {

														
														// output data of each row
														while($row = $result->fetch_assoc()) { ?>

														<tr>
															<td><?php echo $row["idu"] ?></td>
															<td><?php  echo $row["prenom"] ?></td>
															<td><?php  echo $row["nom"] ?></td>
															<td><?php  echo $row["role"] ?></td>
															<td><?php  echo $row["type"] ?></td>
														

															<?php	echo "<td>";
															echo '<a href="viewemploye.php?id='. $row['idu'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
															echo '<a href="editemploye.php?id='. $row['idu'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><i class="fas fa-edit"></i></a>';
															echo '<a href="deleteemploye.php?id='. $row['idu'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
														echo "</td>"; ?>
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