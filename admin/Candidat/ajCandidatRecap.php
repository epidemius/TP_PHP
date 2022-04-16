<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<h1 class="display-4"><?php
try {
  $base = new PDO('mysql:host=localhost; dbname=bts1; charset=UTF8', 'root', '');
}
catch(exception $e) {
  die('Erreur '.$e->getMessage());
}
  $lineAdm="SELECT  idUser, login, password FROM utilisateur";
  $resultAdm=$base->query($lineAdm);
  $rowAdm = $resultAdm->fetchAll(PDO::FETCH_ASSOC);
  if($_SESSION['login'] ==  $rowAdm[0]['login'] && $_SESSION['pwd'] == $rowAdm[0]['password']){
    echo("Ajout Candidats Recap");
}
else{
    echo("Vous n'etes pas un admin");
}?>
</h1>
</div>
</div>
<?php
// candidats
$lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2";
$resultUti=$base->query($lineUti);
$rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);
$NUti = count($rowUti) - 1;
// spécialité
$lineSpe="SELECT  idSpec, Libelle FROM specialite";
$resultSpe=$base->query($lineSpe);
$rowSpe = $resultSpe->fetchAll(PDO::FETCH_ASSOC);
$NSpe = count($rowSpe) - 1;
?>
</div>
<div  class="alert alert-primary" role="alert">
<?php
$idCand = $_POST['id'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Adresse = $_POST['Adresse'];
$Courriel = $_POST['Courriel'];
$Specialite = $_POST['Spe'];
$Mdp = $_POST['Mdp'];
$i = 0;
foreach($rowUti as $NUti){
if($idCand == $rowUti[$i]['idCand'] ||$Nom == $rowUti[$i]['nom'] ||$Prenom == $rowUti[$i]['Prenom'] ||$Adresse == $rowUti[$i]['Adresse'] ||$Courriel == $rowUti[$i]['courriel']){
  header ('location: http://localhost/TP1/admin/Candidat/ajCandidat.php');
}
$i = $i +1;
}
if($idCand == "" ||$Nom == "" ||$Prenom == "" ||$Adresse == "" ||$Courriel == ""||$Mdp  == ""){
  header ('location: http://localhost/TP1/admin/Candidat/ajCandidat.php');
}
else{
echo("<table>");
echo("<tr>");
echo("<td> Nom :".$Nom."</td>");
echo("<td> Prénom :".$Prenom."</td>");
echo("<td> Adresse :".$Adresse."</td>");
echo("<td> Identifiant :".$Courriel."</td>");
echo("<td> Mot de passe :".$Mdp."</td>");
echo("<td> Specialite :".$Specialite."</td>");
echo("</tr>");
echo("</table>");
$sqlAdd = "INSERT INTO `candidat2` (`idCand`, `nom`, `Prenom`, `Adresse`, `courriel`, `idSpec`, `password`) VALUES ('$idCand', '$Nom', '$Prenom', '$Adresse', '$Courriel', '$Specialite', '$Mdp')";
$base->query($sqlAdd);
}
?>
<br>
<a href="ajCandidat.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</div>
 <form action="../admin.php">
 <input type="submit" value="Valider" name="Retour">
</body>
</html>