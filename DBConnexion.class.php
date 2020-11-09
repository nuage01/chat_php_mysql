<?php
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

    public function vars_query($requete, $vars){

        $sql = $this->pdo->prepare($query);
        return $sql->execute($vars);
        
    }

}

?>