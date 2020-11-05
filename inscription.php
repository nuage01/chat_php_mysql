<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php


function inscription(){
  try{
    $base = new PDO('mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
  } catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  
  session_start();
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['date']) && isset($_POST['pays'])){
  $sql = $base ->prepare("INSERT INTO USERS (LOGIN, PASSWORD, BIRTH_DATE, PAYS) VALUES (?,?,?,?)");
  $password=$_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql->execute(
      array($_POST['username'], $hashed_password,$_POST['date'], $_POST['pays']));
    }}
?>


<form action ="<?php 
// session_start();
inscription()
 ?>"  method ="POST">
<input type ="text" name="username" value="username" >
<input type ="password" name="password" value ="password" >
<input type ="date" name="date" value ="date" >
<input type ="pays" name="pays" value ="pays" >
<input type ="submit" value="register">


</form>


</body>
</html>