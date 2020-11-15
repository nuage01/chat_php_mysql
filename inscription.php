<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>inscription</title>
</head>

<body>

<?php

include_once('DBConnexion.class.php');
function inscription(){
  $base = DBConnexion::getInstance();
  session_start();
  // tous les champs doivent etre renseignés
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['date']) && isset($_POST['pays'])){
  $query = "INSERT INTO USERS (LOGIN, email,PASSWORD, BIRTH_DATE, PAYS) VALUES (?,?,?,?,?)";
  $password=$_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  // utilisation de la méthode vars_query crée dans la class DBConnexion
  $sql = $base->vars_query($query,
          array($_POST['username'], $_POST['email'], $hashed_password,$_POST['date'], $_POST['pays']));

      header("location: index.php");
    }}
    
?>
<div class=header> 



</div>
<div class="bg-image"></div>

<div class="bg-text">
<form action ="<?php 

inscription()
 ?>"  method ="POST">

<div>
<label for="usrname">Pseudo</label>
<input type ="text" name="username" value="username" id="usrname" >
</div>
<div>
<label for="mail"> E-mail</label>
<input type ="text" name="email" type ="email" value="email" id="mail" >
</div>
<div>
<label for="pass">Mot de passe</label>
<input type ="password" name="password" value ="password" id="pass" >
</div>

<div>
<label for="pays">Pays</label>
<input type ="pays" name="pays" value ="pays" id="pays" >
</div>
<div>
<label for="date"> Date de Naissance</label>
<input type ="date" name="date" value ="date" id="date" >
</div>
<input class="headers_button" type ="submit" value="register">
</form>
</div> 


</body>
</html>