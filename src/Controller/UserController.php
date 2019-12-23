<?php
namespace App\Controller;

use App\Model\UserManager;
use App\Model\User;

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserManager();
    }

    public function newUser($identifiant, $mail, $pass)
    {
        $User = new User([$data]);

        $User->setIndentifiant($identifiant);
        $User->setMail($mail);
        $User->setPassword($pass);

        $this->user->addUser($User);
    }

    public function checkIdentifiant($identifiant)
    {
        $user = $this->user->verifIdentifiant($identifiant);

        return $user;
    }

    public function checkMail($mail)
    {
        $user = $this->user->verifMail($mail);

        return $user;
    }

    public function userConnect($identifiant)
    {
        $user = $this->user->getIdentifiant($identifiant);

        return $user;
    }

    //Disconnect user
    public function disconnectUser()
    {
        $_SESSION = array();
        session_destroy();

        setcookie('pass', '');
        setcookie('hash_pass', '');
    }

}
