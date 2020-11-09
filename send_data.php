
<?php

function fill_data(){
  // try{
  //   $base = new PDO(
  //       'mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
  // } catch (Exception $e){
  //   die('Erreur : ' . $e->getMessage());
  // }
  session_start();
  // if(isset($_POST['author']) && isset($_POST['message'])){
    if(isset($_SESSION['pseudo']) && isset($_POST['message'])){
    // $auteur = $_POST['author'];
    $auteur = $_SESSION['pseudo'];
    $message = $_POST['message'];
    $empty = '';
    if ($message != $empty){
    // $sql = $base ->prepare("INSERT INTO chat (author, chat) VALUES (?,?)");
    // $sql->execute(
    //     array($auteur,$message));


    $base = DBConnexion::getInstance();
    $sql = $base->vars_query("INSERT INTO chat (author, chat) VALUES (?,?)", array($auteur,$message));
    }
  }
else{
  echo('NO MESSAGE SENT');
}
}

    fill_data();
?>

