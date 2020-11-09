<?php
class DBConnexion {
    private static $instance;
    private $pdo;

    private function __construct(
         $host = 'mysql:host=172.28.100.76;dbname=storage',
         $bdd_user = 'lyes_remote',
         $bdd_password = 'frik33dz',

    ){
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