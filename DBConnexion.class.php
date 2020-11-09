<?php
class DBConnexion {
    private static $instance;
    private $pdo;
    private $host = 'mysql:host=172.28.100.76;dbname=storage';
    private $bdd_user = 'lyes_remote';
    private $bdd_password = 'frik33dz';
    private function __construct(){
        try{
            $pdo = new PDO($host, $bdd_user, $bdd_password);
            } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
            }
    }
    public static function get_instance(){
      if (is_null(self::$instance)){
        self::$instance=new DBConnexion();
      }
      return self::$instance;
    }
    public function query($requete){
        // $reponse = $this->$pdo->query($requete);
        // $pdo->closeCursor();
        return $this->$pdo->query($requete);
        
    }
  }
?>