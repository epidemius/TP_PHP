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

  $lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2";
  $resultUti=$base->query($lineUti);
  $rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);

  $Uti = 0;
  $NUti = count($rowUti) - 1 ;

  ?>
<h1>
<?php
$i = 0;
foreach($rowUti as $NUti){
 if( $_SESSION['courriel'] ==  $rowUti[$i]['courriel'] && $_SESSION['password'] == $rowUti[$i]['password']){
        echo(" <h3> Bienvenue sur l'application : ".$rowUti[$i]['Prenom']. " ".$rowUti[$i]['nom']. "</h3> ");
}
$i = $i +1;
}

?>
</h1>
</div>
<br>
<div  class="alert alert-primary" role="alert">
<?php
$j = 0;
foreach($rowUti as $NUti){
 if( $_SESSION['courriel'] ==  $rowUti[$j]['courriel'] && $_SESSION['password'] == $rowUti[$j]['password']){
    echo("<table>");
      echo("<tr>");
      echo("<td> Nom :".$rowUti[$j]['nom']."</td>");
      echo("<td> Prénom :".$rowUti[$j]['Prenom']."</td>");
      echo("<td> Courriel :".$rowUti[$j]['courriel']."</td>");
      echo("<td> Identifiant :".$rowUti[$j]['idSpec']."</td>");
      echo("</tr>");
      echo("</table>");
    }
    $j = $j + 1;
}
?>
</div>
<a href="result.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</body>
