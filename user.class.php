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
        $reponse = $base->vars_query('SELECT * FROM  USERS where LOGIN = (?)', array($this->login));
        return $response;
    }

}

$user = new User();
$user->setLogin("lyes");
$infos = $user->display_infos();
echo($infos);
?>
