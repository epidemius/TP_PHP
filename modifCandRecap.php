<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
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
    echo("Modification Candidats Recap");
}
else{
    echo("Vous n'etes pas un admin");
}
?>
</h1>
</div>
</div>
</div>
<div  class="alert alert-primary" role="alert">
<?php
print_r($_POST);
$idCand = $_POST['id'];
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Adresse = $_POST['Adresse'];
$Courriel = $_POST['Courriel'];
$Specialite = $_POST['Spe'];
$Mdp = $_POST['Mdp'];
$i = 0;
echo("<table>");
echo("<tr>");
echo("<td> id Candidat :".$idCand."</td>");
echo("<td> Nom :".$Nom."</td>");
echo("<td> Prénom :".$Prenom."</td>");
echo("<td> Adresse :".$Adresse."</td>");
echo("<td> Identifiant :".$Courriel."</td>");
echo("<td> Mot de passe :".$Mdp."</td>");
echo("<td> Specialite :".$Specialite."</td>");
echo("</tr>");
echo("</table>");
$sqlModiff = "UPDATE 'candidat2' SET `idCand`= '$idCand', `nom`= '$Nom', `Prenom`= '$Prenom', `Adresse`= '$Adresse', `courriel`=  '$Courriel', `idSpec`= '$Specialite', `password`= '$Mdp') WHERE 'candidat2'.'idCand'= '$idCand'";
$base->query($sqlModiff);
?>
<br>
<a href="modifCandChange.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</div>
 <form action="result.php">
 <input type="submit" value="Valider" name="Retour">
</body>
</html>