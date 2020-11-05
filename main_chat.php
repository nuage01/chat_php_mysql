<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>ellyes's chat</title>
</head>

<body>


    <div class=header>
        <div id="pseudo"></div>
            <?php
            
            if(isset($_POST['button1'])) { 
                session_start();

                // Suppression des variables de session et de la session
                $_SESSION = array();
                session_destroy();
                
                // Suppression des cookies de connexion automatique
                setcookie('login', '');
                setcookie('pass_hache', '');
                header("location: connexion.php");
            } 
        ?> 
      
        <form method="post"> 
            <input id="deco" type="submit" name="button1"
                    value="Se deconnecter"/> 
        </form> 
    </div>

    <div>

        <div id="chat_box" class="chat_box">

        </div>

        <p><b>écrire un message ici:</b></p>
        <form id="form" method="POST">
            <label for="fname">messages</label>
            <input type="text" id="author" name="author">
            <input type="text" id="msg" name="msg">
            <button type="submit"> SEND</button>
        </form>

    </div>

    <script src="js/script.js"></script>
</body>

</html>