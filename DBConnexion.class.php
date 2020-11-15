<?php
// class avec le model pattern Singleton afin qu'il n'yait qu'une instance de cette 
// classe qui va permettre de se connecter à la base de donnée 
// et contenir les fonctions pour les requetes 
// afin d'avoir un code plus factorisé et optimiser la création d'objet de connection à la BDD
class DBConnexion {
    private static $instance;
    private $pdo;

    private function __construct(){
        try{
            $this->pdo = new PDO('mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
            } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
            }
    }
    
    public static function getInstance(){
      if (is_null(self::$instance)){
        self::$instance=new DBConnexion();
      }
      return self::$instance;
    }


    public function query($requete){
        return $this->pdo->query($requete);
        
    }
    // ajout d'une fonction qui va combiner les méthodes prepare et execute
    public function vars_query($requete, $vars){

        $sql = $this->pdo->prepare($requete);
        return $sql->execute($vars);
        
    }

}

?>