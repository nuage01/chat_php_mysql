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
        $reponse =  mysqli_query($base,"SELECT * FROM  USERS where LOGIN = '.$this->login.'");
        return $reponse;
    }

}

$user = new User();
$user->setLogin("lyes");
$infos = $user->display_infos();
while($ligne = $infos->fetch()){
echo($ligne);}

?>
