<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>ellyes's chat</title>
</head>

<body>

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
        <div id="pseudo"> <?php echo($_SESSION['pseudo']); ?></div>

        <form action="deconnexion.php" method="post">
    <input type="submit" class="headers_button" name="deco" value="Se deconnecter" />
</form>
      
    </div>

    <div id=conainter>

        <div id="chat_box" class="chat_box">

        </div>

        <p><b>écrire un message ici:</b></p>
        <form id="form" method="POST">
            <label for="fname">messages</label>
            <input type="text" id="msg" name="msg">
            <button type="submit"> SEND</button>
        </form>

    </div>

    <script src="js/script.js"></script>
</body>

</html>