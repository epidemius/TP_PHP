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
<form action="modifNoteRecap.php" method="post">
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
    echo("Modification Note du Candidat");
}
else{
    echo("Vous n'etes pas un admin");
}?>
</h1>
</div>
</div>
<?php

// resultat 
$lineRes ="SELECT  idCand, idEpr, note FROM resultat";
  $resultRes=$base->query($lineRes);
  $rowRes = $resultRes->fetchAll(PDO::FETCH_ASSOC);


?>
<div  class="alert alert-primary" role="alert">
<div class="text">

   
   
<?php
   $j = 0;
   $string_POST = $_POST['check_list'][0];
   $expl_POST = explode("_", $string_POST);
   $_SESSION['idCandNote'] = $expl_POST[0];
   $_SESSION['idEprNote'] = $expl_POST[1];
   print_r($_SESSION['idEprNote']);
   echo("
   <label for=\"id Candidats\" > Note : -> </label> 
   
   <input type=\"id Candidats\" name=\"id\" id=\"subject\" value=".$expl_POST[2].">
   <br>")
   ?>
   </select>
<br>
<br>
 </div>
<input type="submit" class="btn btn-outline-success" value="submit" name="submit">
</form>

<a href="modifNotes.php" ><input type="button" class="btn btn-secondary" value="Retour" name="Retour"></a>
</body>
</html>