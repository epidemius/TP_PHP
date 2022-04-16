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
<form action="modifCandRecap.php" method="post">
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
    echo("Modification Candidat");
}
else{
    echo("Vous n'etes pas un admin");
}?>
</h1>
</div>
</div>
<?php

// candidats
$lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2 WHERE idCand='".$_SESSION['idCand']."'";
$resultUti=$base->query($lineUti);
$rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);

// spécialité
$lineSpe="SELECT  idSpec, Libelle FROM specialite";
$resultSpe=$base->query($lineSpe);
$rowSpe = $resultSpe->fetchAll(PDO::FETCH_ASSOC);
$NSpe = count($rowSpe) - 1;

?>
<div  class="alert alert-primary" role="alert">
<div class="text">
   <?php
    echo("
   <label for=\"id Candidats\">id Candidats : " .$rowUti[0]['idCand']." -> </label> ")
   ?>
   <input type="id Candidats" name="id" id="subject" value="">
   <br>
   <?php
    echo("
   <label for=\"Nom\">Nom : " .$rowUti[0]['nom']." -> </label> ")
   ?>
  <input type="Nom" name="Nom" id="subject" value="">
   <br>
   <?php
      echo("
   <label for=\"Prenom\">Prenom : ".$rowUti[0]['Prenom']." -> </label> ")
   ?>
<input type="Prenom" name="Prenom" id="subject" value=""> 
   <br>
   <?php echo("
   <label for=\"Adresse\">Adresse : ".$rowUti[0]['Adresse']." -> </label> ")
   ?>
   <input type="Adresse" name="Adresse" id="subject" value="">
   <br>
   <?php
   echo("
   <label for=\"Courriel\">Courriel : ".$rowUti[0]['courriel']." -> </label> ")
   ?>
   <input type="Courriel" name="Courriel" id="subject" value="">
   <br>
   <?php
   echo("<label for=\"Mdp\">Mot de passe : ".$rowUti[0]['password']." -> </label>");
   ?>
   <input type="text" name="Mdp" id="subject" value="">
   <br>
   <?php
   echo("<label for=\"Categorie\">Categorie : ".$rowUti[0]['idSpec']." -> </label> ");
   ?>
   <select name="Spe" id="Specialite" value="">")
   <?php
   $j = 0;
   
foreach($rowSpe as $NSpe){
    print($j);
    echo("<option value=".$rowSpe[$j]['idSpec'].">".$rowSpe[$j]['Libelle']."</option>");
    $j= $j + 1;
}

?>
   </select>
<br>
<br>
 </div>
<input type="submit" class="btn btn-outline-success" value="submit" name="submit">
</form>

<a href="result.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</body>
</html>