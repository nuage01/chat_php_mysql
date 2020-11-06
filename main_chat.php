<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>ellyes's chat</title>
</head>

<body class="bg-image">

<?php

function on_load(){
session_start();
if (!isset($_SESSION['pseudo'])){
    header("location: index.php");
    
}
$_COOKIE['time'] = date('m/d/Y h:i:s a', time());
setcookie('time', $_COOKIE['time'] ,time()+7*24*60*60,null,null,false,true);
}

on_load();
?>


    <div class=header>
        <div id="pseudo"> <p> <?php echo(" C'est " . $_SESSION['pseudo']); ?></p></div>

        <form action="deconnexion.php" method="post">
    <input type="submit" class="headers_button" name="deco" value="Se deconnecter" />
</form>
      
    </div>

    <div id=conainter>

        <div id="chat_box" class="chat_box">

        </div>
        <div id="messagebox">
        <p><b>Tapez votre message içi:</b></p>
        <form id="form" method="POST">
            <label for="fname">message</label>
            <input type="text" id="msg" name="msg">
            
            <button class="headers_button" type="submit"> Envoyer</button>
        </form>
        <button id="emoji" onclick="emoji()">👍</button>
        </div>
    </div>

    <div> <p> salut <?php echo $_COOKIE['login']; ?>  ta derniere connexion été à
    <?php echo $_COOKIE['time']; ?>
</p></div>

    <script src="js/script.js"></script>
</body>

</html>