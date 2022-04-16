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
$i = 0;
foreach($_POST['check_list'] as $cle=> $element ){
    $sqlSuppr = "DELETE FROM candidat2 WHERE idCand='".$_POST['check_list'][$i]."'";
    echo("<p>l'élève a bien était supprimé</p><br>");
    $base->query($sqlSuppr);
    $i= $i +1;
}
//$sqlSuppr = "DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';";
//$base->query($sqlSuppr);

?>
<br>
<a href="supprCandidat.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</div>
 <form action="../admin.php">
 <input type="submit" value="Valider" name="Retour">
</body>
</html>