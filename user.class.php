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
        $result = "";
        $sql="SELECT * FROM USERS WHERE LOGIN='$current'";
        foreach  ($base->query($sql) as $row) {
            $result = $result . 'Pays: '. $row['PAYS'] . "\t" . 'date de naissance: ' . $row['BIRTH_DATE'];
        }
        return $result;
    }

}

$user = new User();
$user->setLogin("lyes");
$infos = $user->display_infos();
echo($infos);

?>
