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
// resultat 
$lineRes ="SELECT  idCand, idEpr, note FROM resultat";
  $resultRes=$base->query($lineRes);
  $rowRes = $resultRes->fetchAll(PDO::FETCH_ASSOC);

  $NRes = count($rowRes) - 1 ;

  ?>
<h1>
</h1>
</div>
<br>
<div  class="alert alert-primary" role="alert">
<?php
$j = 0;
echo("<table>");
foreach($rowRes as $NRes){
   
      echo("<tr>");
      echo("<td> idCand : ".$rowRes[$j]['idCand']." </td>");
      echo("<td> idEpr : ".$rowRes[$j]['idEpr']." </td>");
      echo("<td> note : ".$rowRes[$j]['note']." </td>");
      echo("</tr>");
     
    $j = $j + 1;
}
echo("</table>");
?>
</div>
<a href="../admin.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</body>
