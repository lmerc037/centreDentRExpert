<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon ">
    <img src="img/logo-white.png" class="img-fluid">
    </div>
    <div class="sidebar-brand-text mx-3"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">




<!-- Navigation client -->
<li class="nav-item" <?php   if(!empty($profil)){echo "style='display:none!important;'";}?>>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utilisateur2"
        aria-expanded="true" aria-controls="utilisateur2">
        <i class="fas fa-user"></i>
        <span>Utilisateur</span>
    </a>
    <div id="utilisateur2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="viewuser2.php">Profil utilisateur</a>
            <a class="collapse-item" href="viewclient2.php">Dossier Medical</a>
            
            
        
           
        </div>
    </div>
</li>



<li class="nav-item" <?php   if(!empty($profil)){echo "style='display:none!important;'";}?>>

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rendez-vous2"
        aria-expanded="true" aria-controls="rendez-vous2">
        <i class="fas fa-calendar-alt"></i>
        <span>Rendez-vous</span>
    </a>
    <div id="rendez-vous2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="rendezvous-client.php">Prendre un rendez-vous</a>
            <a class="collapse-item" href="mesrendezvous.php">Mes rendez-vous</a>
           

           
        </div>
    </div>

</li>





<div <?php   if($profil == "Dentiste" || $profil == "Receptioniste" || $profil == "Assistant dentiste" || $profil == "Hygieniste" || $profil == "Preposé"){echo "style='display:block!important;'";}else{ echo "style='display:none!important;'";} ?>>


<li class="nav-item">


<!-- Navigation client -->


    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utilisateur2"
        aria-expanded="true" aria-controls="utilisateur2">
        <i class="fas fa-user"></i>
        <span>Utilisateur</span>
    </a>
    <div id="utilisateur2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="viewuser2.php">Mon profil utilisateur</a>
            <a class="collapse-item" href="viewemploye2.php">Mon dossier employé</a>
            
            
        
           
        </div>
    </div>






 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Patient"
        aria-expanded="true" aria-controls="Patient">
        <i class="fas fa-tooth"></i>
        <span>Patient</span>
    </a>
    <div id="Patient" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des patients</h6>
            <a class="collapse-item" href="client.php">Liste des patients</a>
            <a class="collapse-item" href="addclient.php">Ajouter un patient</a>
           
        </div>
    </div>


</li>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rendez-vous"
        aria-expanded="true" aria-controls="rendez-vous">
        <i class="fas fa-calendar-alt"></i>
        <span>Rendez-vous</span>
    </a>
    <div id="rendez-vous" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des rendez-vous</h6>
            <a class="collapse-item" href="rendezvous.php">Liste des rendez-vous</a>
           

           
        </div>
    </div>

</li>









</div>





<div <?php   if(empty($profil)||$profil == "Dentiste" || $profil == "Receptioniste" || $profil == "Assistant dentiste" || $profil == "Hygieniste" || $profil == "Preposé"){echo "style='display:none!important;'";}?>>


<!-- Heading -->
<div class="sidebar-heading" >
    RESSOURCES
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utilisateur"
        aria-expanded="true" aria-controls="utilisateur">
        <i class="fas fa-users"></i>
        <span>Utilisateur</span>
    </a>
    <div id="utilisateur" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des utilisateurs</h6>
            <a class="collapse-item" href="user.php">Liste des utilisateurs</a>
            <a class="collapse-item" href="adduser.php">Ajouter un utilisateur</a>
            
           
           
        </div>
    </div>

    
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Employe"
        aria-expanded="true" aria-controls="Employe">
        <i class="fas fa-user-md"></i>
        <span>Employé</span>
    </a>
    <div id="Employe" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des employés</h6>
            <a class="collapse-item" href="employe.php">Liste des employés</a>
            <a class="collapse-item" href="addemploye.php">Ajouter un employé</a>
           
           
        </div>
    </div>


    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Patient"
        aria-expanded="true" aria-controls="Patient">
        <i class="fas fa-tooth"></i>
        <span>Patient</span>
    </a>
    <div id="Patient" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des patients</h6>
            <a class="collapse-item" href="client.php">Liste des patients</a>
            <a class="collapse-item" href="addclient.php">Ajouter un patient</a>
           
        </div>
    </div>



    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-clinic-medical"></i>
        <span>Succursales</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des succursales</h6>
            <a class="collapse-item" href="branch.php">Liste des succursales</a>
            <a class="collapse-item" href="addbranch.php">Ajouter un succursale</a>
           
           
        </div>
    </div>



</li>





<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    RENDEZ-VOUS
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rendez-vous"
        aria-expanded="true" aria-controls="rendez-vous">
        <i class="fas fa-calendar-alt"></i>
        <span>Rendez-vous</span>
    </a>
    <div id="rendez-vous" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des rendez-vous</h6>
            <a class="collapse-item" href="rendezvous.php">Liste des rendez-vous</a>
           

           
        </div>
    </div>

</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
   SERVICE
</div>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">

    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Procedure"
        aria-expanded="true" aria-controls="Procedure">
        <i class="fas fa-briefcase-medical"></i>
        <span>Procedure</span>
    </a>
    <div id="Procedure" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des procedure</h6>
            <a class="collapse-item" href="procedure.php">Liste des procedures</a>
            <a class="collapse-item" href="addprocedure.php">Ajouter un procedure</a>

           
        </div>
    </div>

</li>

</div>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>
<!-- End of Sidebar -->