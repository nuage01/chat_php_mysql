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
        // $reponse =  $base->query("SELECT * FROM USERS where LOGIN='$current'");
        $result = ""
        $sql="SELECT * FROM USERS WHERE LOGIN='$current'";
        foreach  ($base->query($sql) as $row) {
            $result = $result . $row['PAYS'] . "\t";

        }
        return $result;
    }

}

$user = new User();
$user->setLogin("lyes");
$infos = $user->display_infos();
echo($infos);

?>
