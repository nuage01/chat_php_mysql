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

<form action ="<?php 

inscription()
 ?>"  method ="POST">
<input type ="text" name="username" value="username" >
<input type ="text" name="email" type ="email" value="email" >
<input type ="password" name="password" value ="password" >
<input type ="date" name="date" value ="date" >
<input type ="pays" name="pays" value ="pays" >
<input class="headers_button" type ="submit" value="register">
</form>

</div>
<div class="bg-image"></div>

<div class="bg-text">
  <h1>Welcome</h1>
  <p>To my chat</p>
</div> 

</body>
</html>