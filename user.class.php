<?php
include_once('DBConnexion.class.php');
class User
{
    public function setLogin($nouveau_login){
    $this->login = $nouveau_login;
    }


    public function getLogin(){
        return $this->login;
    }


    public function display_infos(){
        $base = DBConnexion::getInstance();
        $current = $this->login;
        $reponse =  $base->query("SELECT PAYS FROM USERS where LOGIN='.$current.'");
        // -- = '.$current.'");
        $sql="SELECT PAYS FROM USERS where LOGIN='.$current.'";
        foreach  ($base->query($sql) as $row) {
            print $row['name'] . "\t";
            print  $row['color'] . "\t";
            print $row['calories'] . "\n";
        }
        return $reponse;
    }

}

$user = new User();
$user->setLogin("lyes");
$infos = $user->display_infos();
while($ligne = $infos->fetch()){
echo($ligne);}

?>
