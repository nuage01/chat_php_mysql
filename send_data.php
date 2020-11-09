
<?php
include_once('DBConnexion.class.php');
function fill_data(){
  $base = DBConnexion::getInstance();
  session_start();
  // if(isset($_POST['author']) && isset($_POST['message'])){
    if(isset($_SESSION['pseudo']) && isset($_POST['message'])){
    // $auteur = $_POST['author'];
    $auteur = $_SESSION['pseudo'];
    $message = $_POST['message'];
    $empty = '';
    if ($message != $empty){
    $sql = $base ->prepare("INSERT INTO chat (author, chat) VALUES (?,?)");
    $sql->execute(
        array($auteur,$message));
    }}
else{
  echo('NO MESSAGE SENT');
}
}

    fill_data();
?>

