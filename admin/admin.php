<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="admin.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<h1 class="display-4">Bienvenue Admin </h1>
<br>
</div>
</div>


<?php


try {
  $base = new PDO('mysql:host=localhost; dbname=bts1; charset=UTF8', 'root', '');
}
catch(exception $e) {
  die('Erreur '.$e->getMessage());
}
// candidats
$lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2";
$resultUti=$base->query($lineUti);
$rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);
// resultat 
$lineRes ="SELECT  idCand, idEpr, note FROM resultat";
  $resultRes=$base->query($lineRes);
  $rowRes = $resultRes->fetchAll(PDO::FETCH_ASSOC);
  //epreuve
  $lineEpr ="SELECT  idEpr, designation, Coef, Note_eliminat FROM epreuve";
  $resultEpr=$base->query($lineEpr);
  $rowEpr = $resultEpr->fetchAll(PDO::FETCH_ASSOC);
  $j = 0;
  $NRes = count($rowRes) - 1 ;
  $k = 0;
  $NEpr = count($rowEpr) - 1 ;
  $NUti = count($rowUti) - 1 ;
  foreach($rowEpr as $NEpr){
    $matiere[$k] = $rowEpr[$k];
    $k = $k + 1;
  }

?>
<nav>
  <ul>
    <li class="deroulant"><a href="#">Candidat &ensp;</a>
      <ul class="sous">
      <li><a href="Candidat/listCandidat.php">Liste des candidats</a></li>
      <li><a href="Candidat/ajCandidat.php">Ajouts candidat</a></li>
      <li><a href="Candidat/modifCandidat.php">modification candidat</a></li>
      <li><a href="Candidat/supprCandidat.php">Suppression candidat</a></li>
        <li><a><?php 
     //   echo("<table>");
     /*
          foreach($rowUti as $NUti){
            echo("<table>");
            echo("<tr>");
            echo("<td> Nom :".$rowUti[$j]['nom']."</td>");
            echo("<td> Prénom :".$rowUti[$j]['Prenom']."</td>");
            echo("<td> Courriel :".$rowUti[$j]['courriel']."</td>");
            echo("<td> Identifiant :".$rowUti[$j]['idSpec']."</td>");
            echo("</tr>");
            echo("</table>");
            echo("<br>");
            $j = $j + 1;
          }
        //  echo("</table>");
       */ ?></a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="#">Resultats &ensp;</a>
      <ul class="sous">
        <li><a href="Resultats/noteParCand.php">Notes par candidat</a></li>
        <li><a href="Resultats/noteDesCands.php">Notes des candidats</a></li>
        <li><a href="Resultats/modifNotes">Modification des notes</a></li>
        <li><a href="#">Calcul des moyennes</a></li>
        <li><a href="#">Affichages des résultats</a></li>
      </ul>
    </li>
  </ul>
</nav>



</body>
</html>
