<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Centre Dent'R Expert - Blank Page</title>
    <?php include "script.php"; ?>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
        
        include "sidebar.php";
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

             


                <div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Rendez-vous test</h1>
					



					<!-- Processing form data when form is submitted -->
					<?php

					if($_SERVER["REQUEST_METHOD"] == "POST"){

						$conn = OpenCon();

 						// Taking all  values from the form data(input)
						$username =  $_REQUEST['username'];
						$firstname =  $_REQUEST['firstname'];
						$lastname = $_REQUEST['lastname'];
						$email = $_REQUEST['email'];


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

						if (! empty($_POST["signup-password"])) {
						// PHP's password_hash is the best choice to use to store passwords
							$password = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
						}
						
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
						// here our table name is utilisateur
						$sql2 = "INSERT INTO utilisateur (username, password, email, nom, prenom)   VALUES ('$username', 
						'$password','$email','$lastname','$firstname')";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql2) === TRUE){
							$last_user_id = mysqli_insert_id($conn) ;					
							//echo "<h3 class='success-msg'>le client a été ajoutés dans le système avec succès.</h3>" ;
						} else{
							echo "ERROR: Hush! Sorry $sql. " 
							. mysqli_error($conn);
						}

						// Performing insert query execution
						// here our table name is employe
						$sql3 = "INSERT INTO patient (id_utilisateur,id_adresse,id_succursale,datenaissance,sexe,telephone,assurance,parent)   
						VALUES ($last_user_id,$last_address_id,$succursale,'$datenaissance','$sexe',$telephone,'$assurance','$parent')";
						
						// check if insertion was succesfully done
						if(mysqli_query($conn, $sql3) === TRUE){
							echo "<h3 class='success-msg'>Le client a été ajouté dans le système avec succès.</h3>" ;  ?> 

								<style>
								.user{display:none!important;}
								</style>

								<div class=" row">
								<div class="col-sm-6 mb-3 mb-sm-0">
								<a href="client.php" class="btn btn-primary btn-user btn-block">Voir la liste des clients</a> 
								</div>
								<div class="col-sm-6">
								<a href="addclient.php" class="btn btn-secondary btn-user btn-block">Ajouter un nouveau client</a> 
									
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

					<form name="sign-up" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="user"
						onsubmit="return signupValidation()">
						

						

						<fieldset class="border p-2">
							<legend  class="w-auto">Information sur le rendez-vous</legend>

							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error" id="dob-info"></span>
									</div>
									<input type="date" class="form-control form-control-user" name="date" id="date"
									placeholder="Date et Heure" >
								</div>
								<div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error " id="pays-info"></span>
									</div>
									<select class="form-select" aria-label="Choisir un type" name="type" id="type" >
										<option selected disabled>Consultation orthodontie</option>
										<option value="Consultation orthodontie">Consultation orthodontie</option>
										<option value="Consultation blanchiment">Consultation blanchiment</option>
                                        <option value="Examen nettoyage">Examen nettoyage</option>
                                        <option value="Consultation spécifique">Consultation spécifique</option>
                                        <option value="Urgence">Urgence</option>
									</select>
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

                                <div class="col-sm-6 mb-3 mb-sm-0">
									<div class="form-label">
										<span class="required error" id="commentaire-info"></span>
                                    </div>
                                    <textarea class="form-control " id="commentaire" name="commentaire" rows="3" placeholder="Commentaires"></textarea>
									
								</div>
							</div>

						</fieldset>


						

						<div class="form-group row">
							<div class="col-sm-12">
								<input class="btn btn-primary btn-user btn-block" type="submit" name="signup-btn"
								id="signup-btn" value="Soumettre">
							</div>
						</div>
					</form>

					
				</div>

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

</body>

</html>