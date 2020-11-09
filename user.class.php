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
            $result = $result . 'infos de ' . $current . ' Pays: '. $row['PAYS'] . "\t" . 'date de naissance: ' . $row['BIRTH_DATE'];
        }
        return $result;
    }


    public function gen_pass(){
        $base = DBConnexion::getInstance();
        $current = $this->login;
        $result = "";
        $sql="SELECT email FROM USERS WHERE LOGIN='$current'";
        foreach  ($base->query($sql) as $row) {
            $result = $row['email'];
        }
        if (!isset($result)){
            echo('username ou mail incorrect');
        }
        else{
            $base = DBConnexion::getInstance(); 
            $password = "new1234#";
            $sql="UPDATE TABLE USERS SET password='$password'";
            $base = $base->query($sql);
            mail($result, 'nouveau password', $password);
        }
        // return $result;

    }

}

$user = new User();
$user->setLogin("lyes03");
$infos = $user->display_infos();
echo($infos);
$infos = $user->gen_pass();

?>
