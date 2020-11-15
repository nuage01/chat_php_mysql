<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>connexion</title>
</head>

<body>

<?php
include_once('DBConnexion.class.php');

// fonction qui va vérifir la connexion de l'utilisateur
function login_check(){
  // en utilisant les cookies de l'utilisateur on va lui permettre de se connecter
  // directement au chat
  session_start();
  if (isset($_COOKIE['login']))
  {
    $_SESSION['pseudo'] = $_COOKIE['login'];
    setcookie('login', '');
    $_COOKIE['time'] = date('m/d/Y h:i:s a', time());
    setcookie('time', $_COOKIE['time'] ,time()+7*24*60*60,null,null,false,true);
    header("location: main_chat.php");

  }

  // appel à l'object DBConnection qui est deja instancié une fois ou jamais
  $base = DBConnexion::getInstance();

  // vérification du login et mot de passe sur la base de données
  $reponse = $base->query('SELECT * FROM  USERS');

  $database_users = array();
  while($ligne = $reponse->fetch()){
  
  $database_users[$ligne['LOGIN']] = $ligne['PASSWORD'];
   }

  $reponse->closeCursor();
  
  if(isset($_POST['username']) && isset($_POST['password'])){
    
    $exists = False;
    foreach ($database_users as $key => $value )
    {
     if ($_POST['username'] == $key) {
        if (password_verify($_POST['password'], $value))
           { $exists = True; break;}}
    }
  if ($exists == True)
  {     
    // Identifiants vérifiés
    session_start();
    $_SESSION['pseudo'] = $_POST['username'];
    
    setcookie('login', $_SESSION['pseudo'] ,time()+7*24*60*60,null,null,false,true);
    
    echo 'Vous êtes connecté !';
    header("location: main_chat.php");}
else {
}
  }

}
?>



    <div class=header> 

        <form action ="<?php 
    login_check()
    ?>"  method ="POST">
    <input type ="text" name="username" value="username" >
    <input type ="password" name="password" value ="password" >
    <input class="headers_button" type ="submit" value="LOGIN">



    </form>
    <div id="center_button">
        <button class="headers_button" onclick="location.href='inscription.php'">Nouvel Utilisateur</button>
    </div>

    </div>

    <div class="bg-image"></div>

<div class="bg-text">
  <h1>Welcome</h1>
  <p>To my chat</p>
</div> 

</body>
</html>



