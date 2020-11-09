<?php
class DBConnexion {
    private static $instance;
    private $pdo;

    private function __construct(
         $host = 'mysql:host=172.28.100.76;dbname=storage',
         $bdd_user = 'lyes_remote',
         $bdd_password = 'frik33dz'

    ){
        try{
            // self::$pdo = new PDO($host, $bdd_user, $bdd_password);
            $this->$pdo = new PDO('mysql:host=172.28.100.76;dbname=storage','lyes_remote','frik33dz');
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


    public function getConnection()
    {
      return $this->conn;
    }
    // public function query($requete){
    //     // $reponse = $this->$pdo->query($requete);
    //     // $pdo->closeCursor();
    //     return $this->$pdo->query($requete);
        
    // }
  }
?>