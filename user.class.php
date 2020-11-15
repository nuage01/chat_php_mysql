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

    // méthode d'instance qui va permettre 
    // à un objet utilisateur de disposer de ses infos
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

    // TO DO: Fonction de géneration de MDP en cas d'oubli
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
            $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            $base = DBConnexion::getInstance(); 
            $password = "new1234#";
            mail($result, 'nouveau password', $password, $headers);
            $sql="UPDATE TABLE USERS SET password='$password'";
            $base = $base->query($sql);
            
        }
    }

}

// $user = new User();
// $user->setLogin("lyes04");
// $infos = $user->display_infos();
// echo($infos);
// $user->gen_pass();

?>
