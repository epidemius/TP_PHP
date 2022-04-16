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

  $lineAdm="SELECT  idUser, login, password FROM utilisateur";
  $resultAdm=$base->query($lineAdm);
  $rowAdm = $resultAdm->fetchAll(PDO::FETCH_ASSOC);
  $rowwAdm = $rowAdm[0];
  $lineUti="SELECT  idCand, nom, Prenom, Adresse, courriel, idSpec, password FROM candidat2";
  $resultUti=$base->query($lineUti);
  $rowUti = $resultUti->fetchAll(PDO::FETCH_ASSOC);

  $i = 0;
  $connected = 0;
  $Uti = 0;
  $NUti = count($rowUti) - 1 ;
  ?>
<h1>
<?php 

$resultID = $_POST['ID'];
$_SESSION['ID'] =$resultID;
$resultMDP = $_POST['MDP'];
$_SESSION['MDP'] = $resultMDP;
if($resultID ==  $rowwAdm['login'] && $resultMDP == $rowwAdm['password']){
    $_SESSION['login'] = $_POST['ID'];
    $_SESSION['pwd'] = $_POST['MDP'];
    header ('location: http://localhost/TP1/admin/admin.php');
   // echo(" <h2> Vous etes connecté en temps qu'admin du site </h2>");
   // echo(" <img src=\"pngegg.png\">");
    $connected = 1;
}
foreach($rowUti as $NUti){
    if($resultID ==  $rowUti[$i]['courriel'] && $resultMDP == $rowUti[$i]['password']){
        echo(" <h3> Bienvenue sur l'application : ".$rowUti[$i]['Prenom']. " ".$rowUti[$i]['nom']. "</h3> ");
        $_SESSION['idCand'] = $rowUti[$i]['idCand'];
        $_SESSION['courriel'] = $rowUti[$i]['courriel'];
        $_SESSION['password'] = $rowUti[$i]['password'];
       // echo(" <img src=\"pngegg.png\">");
        $connected = 1;
        $_SESSION['connected'] = $connected;
        $Uti = 1;
    }
    $i = $i +1;
}
if($_SESSION['connected'] == 0){
  header('location: https://mstq.io/404');
}
//echo( "<h1> mot de passe :".$resultID."</h1>");
//echo( "<h1> identifiant :".$resultMDP."</h1>");
?>
</h1>
</div>
<br>
<br>
<br>
<br>
  <nav>
  <ul>
    <li class="deroulant"><a href="#">Candidat &ensp;</a>
      <ul class="sous">
      <li><a href="AffCandidat.php">Affichage du candidat</a></li>
      <li><a href="modifCandChange.php">Modification candidat</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="#">Resultats &ensp;</a>
      <ul class="sous">
        <li><a href="NoteEpr.php">Notes par épreuve</a></li>
      </ul>
    </li>
  </ul>
</nav>





</body>