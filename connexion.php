<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>ellyes's chat</title>
</head>

<body>

<?php


function login_check(){
  try{
    $base = new PDO('mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
  } catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
  
  $reponse = $base->query('SELECT * FROM  USERS');
  $database_users = array();
  while($ligne = $reponse->fetch()){
  
  $database_users[$ligne['LOGIN']] = $ligne['PASSWORD'];
   }

  $reponse->closeCursor();
  
  if(isset($_POST['username']) && isset($_POST['password'])){
    
    // if (in_array($_POST['username'], $database_users ))
    // if (array_key_exists('amjad', $database_users ))
    $exists = False;
    foreach ($database_users as $key => $value )
    {
     if ($_POST['username'] == $key) {
        if (password_verify($_POST['password'], $value))
           { $exists = True; break;}}
    }
  if ($exists == True)
  {     
    session_start();
    $_SESSION['pseudo'] = $_POST['username'];
    echo 'Vous êtes connecté !';
    header("location: index.html");}
else {
    echo 'wrongs IDS';
}
  }

}
?>


<form action ="<?php 
// session_start();
login_check()
 ?>"  method ="POST">
<input type ="text" name="username" value="username" >
<input type ="password" name="password" value ="password" >
<input type ="submit" value="LOGIN">



</form>
<div id="center_button">
    <button onclick="location.href='inscription.php'">NEW USER</button>


</body>
</html>



