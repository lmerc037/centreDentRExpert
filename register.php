<?php
use DentRexpert\Member;
if (! empty($_POST["signup-btn"])) {
require_once './Model/Member.php';
$member = new Member();
$registrationResponse = $member->registerMember();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Centre Dent'R Expert - S'enregistrer</title>

	

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
					<div class="col-lg-7">
						<div class="p-5">
							<div class="text-center">
								<div class="logo"><img src="img/logo.png" class="img-fluid"></div>
								<br>


								<h1 class="h4 text-gray-900 mb-4 CreateAcc">Créer un compte!</h1>
							</div>

							<?php
							if (! empty($registrationResponse["status"])) {
							?>
							<?php
							if ($registrationResponse["status"] == "error") {
							?>
							<div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?>
								<br>
							</div>
							<?php
						} else if ($registrationResponse["status"] == "success") {
						?>
						<div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?> 
							<br>

							<style>
								form.user, .CreateAcc {
									display: none;
								}

							</style>


						</div>
						<?php
					}
					?>
					<?php
				}
				?>

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

			<hr>
                           <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                            	<a class="small" href="login.php">Vous avez déjà un compte? Connectez-vous ici!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <script>
    	function signupValidation() {
    		var valid = true;

    		$("#username").removeClass("error-field");
    		$("#email").removeClass("error-field");
    		$("#password").removeClass("error-field");
    		$("#confirm-password").removeClass("error-field");
            $("#firstname").removeClass("error-field");
            $("#lastname").removeClass("error-field");


            var fName = $("#firstname").val();
            var lName = $("#lastname").val();
    		var UserName = $("#username").val();
    		var email = $("#email").val();
    		var Password = $('#signup-password').val();
    		var ConfirmPassword = $('#confirm-password').val();
    		var emailRegex =
    		/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    		$("#username-info").html("").hide();
    		$("#email-info").html("").hide();

    		if (UserName.trim() == "") {
    			$("#username-info").html("pseudo obligatoire").css("color", "#ee0000").show();
    			$("#username").addClass("error-field");
    			valid = false;
    		}
            if (fName.trim() == "") {
    			$("#firstname-info").html("Prénom obligatoire").css("color", "#ee0000").show();
    			$("#firstname").addClass("error-field");
    			valid = false;
    		}

            if (fName.trim() == "") {
    			$("#lastname-info").html("Nom obligatoire").css("color", "#ee0000").show();
    			$("#lastname").addClass("error-field");
    			valid = false;
    		}
           
    		if (email == "") {
    			$("#email-info").html("courriel obligatoire").css("color", "#ee0000").show();
    			$("#email").addClass("error-field");
    			valid = false;
    		} else if (email.trim() == "") {
    			$("#email-info").html("courriel invalide").css("color", "#ee0000").show();
    			$("#email").addClass("error-field");
    			valid = false;
    		} else if (!emailRegex.test(email)) {
    			$("#email-info").html("courriel invalide").css("color", "#ee0000")
    			.show();
    			$("#email").addClass("error-field");
    			valid = false;
    		}
    		if (Password.trim() == "") {
    			$("#signup-password-info").html("Mot de passe obligatoire.").css("color", "#ee0000").show();
    			$("#signup-password").addClass("error-field");
    			valid = false;
    		}
    		if (ConfirmPassword.trim() == "") {
    			$("#confirm-password-info").html("Veuillez confirmer le mot de passe").css("color", "#ee0000").show();
    			$("#confirm-password").addClass("error-field");
    			valid = false;
    		}
    		if (Password != ConfirmPassword) {
    			$("#error-msg2").html("Les deux mot de passe doivent etre le même").show();
    			valid = false;
    		}
    		if (valid == false) {
    			$('.error-field').first().focus();
    			valid = false;
    		}
    		return valid;
    	}
    </script>

</body>

</html>