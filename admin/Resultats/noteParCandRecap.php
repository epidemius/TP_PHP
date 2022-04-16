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
<h1 class="display-4">Note de l'étudiant </h1>
<br>
</div>
<?php

try {
    $base = new PDO('mysql:host=localhost; dbname=bts1; charset=UTF8', 'root', '');
  }
  catch(exception $e) {
    die('Erreur '.$e->getMessage());
  }
  // utilisateur
  $lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2 Where idCand='".$_POST['check_list'][0]."'";
  $resultUti=$base->query($lineUti);
  $rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);

  // résultat
  $lineRes="SELECT  idCand, idEpr, note FROM resultat Where idCand='".$_POST['check_list'][0]."'";
  $resultRes=$base->query($lineRes);
  $rowRes = $resultRes->fetchAll(PDO::FETCH_ASSOC);
  $NRes = count($rowUti) - 1 ;

  // spécialité
  $lineSpe="SELECT  idSpec, Libelle FROM specialite";
  $resultSpe=$base->query($lineSpe);
  $rowSpe = $resultSpe->fetchAll(PDO::FETCH_ASSOC);
  $NSpe = count($rowSpe) - 1;

  //épreuve
  $lineEpr="SELECT  idEpr, designation, Coef, Note_eliminat FROM epreuve";
  $resultEpr=$base->query($lineEpr);
  $rowEpr = $resultEpr->fetchAll(PDO::FETCH_ASSOC);
  $NEpr = count($rowEpr) - 1;

  ?>
<h1>
</h1>
</div>
<br>
<div  class="alert alert-primary" role="alert">
<div id="matière">
<?php
$j = 0;
$i = 0;
?>
</div>
<div id="note">
<?php
 echo("<table>");
foreach($rowRes as $NRes){
foreach($rowEpr as $NEpr){
 if( $rowEpr[$i]['idEpr'] ==  $rowRes[$j]['idEpr']){
   
    echo("<tr>");
    echo("<td> ".$rowEpr[$i]['designation']." :".$rowRes[$j]['note']."</td>");
    echo("</tr>");
 
}
$i = $i + 1;
if($i > 5){
    $i = 0;
}
}
$j = $j + 1;
}
echo("</table>");
?>
</div>
</div>
<a href="noteParCand.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>

</body>
