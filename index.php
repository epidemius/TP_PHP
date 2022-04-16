<!doctype html>
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
</head>
<body>

<form action="result.php" method="post">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<h1 class="display-4">Login Page </h1>
<br>
<img src="login-icon.png" >
<br>
<br>
<div class="form-group">
   <label for="NomGroupe">Identifiant :</label> 
   <input type="text" name="ID" id="subject" value="">
   <br>
   <br>
   <label for="NomGroupe">mot de passe</label> 
   <input type="password" name="MDP" id="subject" value="">
  </div>
</br>
  </div>
</div>
<div class="container">
<div class="row">
<input type="reset" value="Effacer">
<input type="submit" value="Submit" name="Submit"> <!--Ce bouton ouvre result.php et permet la vérification du mot de passe -->
</form>
</body>