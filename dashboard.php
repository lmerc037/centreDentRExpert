<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Centre Dent'R Expert - Tableau de Bord</title>

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
    <?php
    $conn = OpenCon();
    ?>

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h3 mb-0 text-gray-800">Bonjour <?php echo $prenomprofil;?> <?php echo $nomprofil;?></h3>
                        
                       <div> 

</div>

                    </div>

                    <!-- Content Row -->
                   
                  
                    <div class="row" <?php   if(empty($profil)||$profil == "Dentiste" || $profil == "Receptioniste" || $profil == "Assistant dentiste" || $profil == "Hygieniste" || $profil == "Preposé"){echo "style='display:none!important;'";}?>>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Utilisateurs </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
									$sql = "SELECT * FROM utilisateur";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) { echo $result->num_rows;   }
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Employés</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
									$sql = "SELECT * FROM employe";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) { echo $result->num_rows;   }
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Patient
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <?php
									$sql = "SELECT * FROM patient";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) { echo $result->num_rows;   }
                                            ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Rendez-vous</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
                                        $sql = "SELECT * FROM rendezvous";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) { echo $result->num_rows;   }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </div>

                    <!-- Content Row -->




                    <div <?php   if($profil == "Dentiste" || $profil == "Receptioniste" || $profil == "Assistant dentiste" || $profil == "Hygieniste" || $profil == "Preposé"){echo "style='display:block!important;'";}else{ echo "style='display:none!important;'";} ?>>

                    <div class="row">
 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Patient
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <?php
									$sql = "SELECT * FROM patient";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) { echo $result->num_rows;   }
                                            ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Rendez-vous</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
                                        $sql = "SELECT * FROM rendezvous";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) { echo $result->num_rows;   }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



</div>

</div>





                    <div class="row" <?php   if(!empty($profil)){echo "style='display:none!important;'";}?>>

     <!-- Pending Requests Card Example -->
     <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Rendez-vous</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                                <?php
                                        $sql = "SELECT utilisateur.id, patient.id, rendezvous.id FROM 
                                                utilisateur
                                                INNER JOIN patient ON patient.id_utilisateur = utilisateur.id AND utilisateur.username = '$username'
                                                INNER JOIN rendezvous ON rendezvous.id_patient = patient.id";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) { echo $result->num_rows; } 

                                            else{echo "<h6>Vous n'avez pas encore de rendez-vous</h6>";
                                            echo"<h6><a href='rendezvous-client.php'>Cliquez ici pour prendre un rendez vous</a></h6>";
                                            
                                            }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
<?php   CloseCon($conn); ?>
</body>

</html>