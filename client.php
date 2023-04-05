<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - Liste des utilisateurs</title>
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
					<h1 class="h3 mb-2 text-gray-800">Patients</h1>
					

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Liste des patients</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
										$sql = "SELECT utilisateur.id, utilisateur.nom, utilisateur.prenom,utilisateur.email,  patient.telephone, patient.id AS idp, patient.datenaissance,  adresse.ville 
										FROM patient 
											INNER JOIN adresse ON patient.id_adresse = adresse.id 
											INNER JOIN utilisateur ON patient.id_utilisateur = utilisateur.id;";

										$result = $conn->query($sql);
										if ($result->num_rows > 0) {

                                           
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>

										<tr>
											<td><?php echo $row["idp"] ?></td>
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