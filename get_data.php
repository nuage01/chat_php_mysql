<?php
// Dans ce fichier on a créer la fonction qui récupere les messages 
// à partir de la base de donnée

function get_data(){
  try{
    $base = new PDO(
        'mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
  } catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
  }
//   on va récuperer les 10 messages les plus récenets et envoyer la réponse 
//   au format json en type string
  $reponse = $base->query(
      'SELECT * FROM  chat ORDER BY created_at DESC limit 10' );  
  $row_list = $reponse->fetchAll(PDO::FETCH_ASSOC);
  $json_str=json_encode($row_list);
  echo($json_str);
  }
    get_data();
?>
