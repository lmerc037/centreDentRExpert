<link rel="icon" type="image/png" href="img/fav.png" />

  <script type="text/javaScript"> 
function ageCalculator() {  
    var userinput = document.getElementById("dob").value;  
    var dob = new Date(userinput);  
    if(userinput==null || userinput=='') {  
      document.getElementById("message").innerHTML = "**Choose a date please!";    
      return false;   
    } else {  
      
    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();  
      
    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff);   
      
    //extract year from date      
    var year = age_dt.getUTCFullYear();  
      
    //now calculate the age of the user  
    var age = Math.abs(year - 1970);  

    var x = document.getElementById("myDIV");

    if(age>=18) {
        x.style.display = "none";
        return true;
    } else {
        alert("Vous êtes agé de "+age+" ans, \n Vous êtes encore mineur, ajoutez un parent");
        
  if (x.style.display === "none") {
    x.style.display = "block";
  } 

        return false;
    }

    
    }  
}  
</script>  


<?php
    $conn = OpenCon();
   				$sql = "SELECT utilisateur.id,   employe.role
                  FROM utilisateur  
                  INNER JOIN employe ON utilisateur.id = employe.id_utilisateur AND utilisateur.username = '$username'";
										$result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                      while($row = $result->fetch_assoc()) { 
                        
                        $profil = $row["role"];
                      
                      }
                    
                    }
                           CloseCon($conn); ?>


<?php
    $conn = OpenCon();
   				$sql = "SELECT utilisateur.id,  utilisateur.prenom, utilisateur.nom 
                  FROM utilisateur  
                  WHERE  utilisateur.username = '$username'";
										$result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                      while($row = $result->fetch_assoc()) { 
                       
          $param_id_profil = $row["id"];
                        $nomprofil = $row["nom"];
                        $prenomprofil = $row["prenom"];
                      }
                    
                    }
                           CloseCon($conn); ?>



<?php
    $conn = OpenCon();
   				$sql = "SELECT utilisateur.id,  patient.id AS idp2
                  FROM utilisateur  
                  INNER JOIN patient ON utilisateur.id = patient.id_utilisateur AND utilisateur.username = '$username'";
										$result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                      while($row = $result->fetch_assoc()) { 
                        
                       

                       $idp2 = $row["idp2"];
                        
                      }
                    
                    }
                           CloseCon($conn); ?>