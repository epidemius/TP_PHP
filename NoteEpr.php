<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<h1 class="display-4">Page utilisateur </h1>
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
  $lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2";
  $resultUti=$base->query($lineUti);
  $rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);
  $NUti = count($rowUti) - 1 ;

  // résultat
  $lineRes="SELECT  idCand, idEpr, note FROM resultat Where idCand='".$_SESSION['idCand']."'";
  $resultRes=$base->query($lineRes);
  $rowRes = $resultRes->fetchAll(PDO::FETCH_ASSOC);
  $NRes = count($rowUti) - 1 ;

  //épreuve
  $lineEpr="SELECT  idEpr, designation, Coef, Note_eliminat FROM epreuve";
  $resultEpr=$base->query($lineEpr);
  $rowEpr = $resultEpr->fetchAll(PDO::FETCH_ASSOC);
  $NEpr = count($rowEpr) - 1;

  ?>
<h1>
<?php
$m = 0;
foreach($rowUti as $NUti){
 if( $_SESSION['courriel'] ==  $rowUti[$m]['courriel'] && $_SESSION['password'] == $rowUti[$m]['password']){
        echo(" <h3> Voici vos notes de votre examen ".$rowUti[$m]['Prenom']. " ".$rowUti[$m]['nom']. "</h3> ");
}
$m = $m +1;
}

?>
</h1>
</div>
<br>
<div  class="alert alert-primary" role="alert">
<div id="matière">
<?php
$i = 0;
$j = 0;
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
<div id="note">
</div>
</div>
<a href="result.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>

</body>
