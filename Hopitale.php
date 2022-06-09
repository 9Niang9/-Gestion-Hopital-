<?php  

include "Patient.php";//inclue le fichier idex.php pour vérifier la connexion

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && $_POST['mot de passe'] != null && isset($_POST['confirmer mot de passe'])){
	        $nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$email=$_POST["email"];
			$password=$_POST["password"];
			$password_confirmation=$_POST["confirmer mot de passe"];
			$kida=array($nom,$prenom,$email,$password,$password_confirmation);
			if($password != $password_confirmation){
				echo "erreur :  mots de passe non identiques";
			} 
			else {
				$connexion = mysqli_connect("localhost", "root", "", "Hospitale");
				if($connexion){
					$query = mysqli_query($connexion,"insert into patient (nom, prenom, password,password_confirmation, email) values ('".$nom."','".$prenom."','".$password."','".$password_confirmation."','".$email."')");
						if($query){
							echo "<b>Bienvenu ".$nom." ".$prenom."</b>";
						}
						else{
							echo "Erreur d'insertion";
						}
				}
				else {
					echo "Probleme de connexion";
				}
			
	    	$js=file_get_contents('hospital.json');
			$js=json_decode($js, true);
			$js[]=$kida;
			$js=json_encode($js);
			file_put_contents('hospital.json',$js);
			}
			// mysql_free_resultat($resultat)
			mysqli_close($connexion);
		}
		
?>