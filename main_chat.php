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
    header("location: connexion.php");
    
}
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

    <script src="js/script.js"></script>
</body>

</html>