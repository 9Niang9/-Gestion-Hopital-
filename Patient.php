<?php
$personne="root";
$mdp="";
$db="Hospitale";
$server="localhost"; 
$connexion=mysqli_connect($server,$personne,$mdp,$db);//Ordre à respecter;
if($connexion) {
    echo "connexion etablie <br>";
}
else{
    die(mysqli_connect_error());
}
?>