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
<form action="supprCandidatRecap.php" method="post">
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
    echo("Liste des Candidats pour suppression ");
}
else{
    echo("Vous n'etes pas un admin, veuillez vous reconnecter");
}?>
</h1>
<br>
</div>
</div>
<?php
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
<?php 
 echo("<table>");
          foreach($rowUti as $NUti){
           
            echo("<tr>");
            echo("<td> Nom :".$rowUti[$j]['nom']."</td>");
            echo("<td> Prénom :".$rowUti[$j]['Prenom']."</td>");
            echo("<td> Courriel :".$rowUti[$j]['courriel']."</td>");
            echo("<td> Identifiant :".$rowUti[$j]['idSpec']."</td>");
            echo("<td><label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"check_list[]\" value=".$rowUti[$j]['idCand']." </label></td>");
            echo("</tr>");
        
            $j = $j + 1;
          }
          echo("</table>");
 ?>
 <input type="submit" class="btn btn-outline-success" value="submit" name="submit">
</form>
<a href="../admin.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</body>
</html>