<?php
namespace App\Model;

class UserManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function addUser(User $user)
    {
        $req = $this->db->prepare('INSERT INTO user(identifiant, mail, pass, inscription_date, role)
        VALUES(:identifiant, :mail, :pass, NOW(), 0)');

        $req->bindValue(':identifiant', $user->identifiant());
        $req->bindValue(':mail', $user->mail());
        $req->bindValue(':pass', $user->passWord());

        $req->execute();
    }

    public function verifIdentifiant($identifiant)
    {
        $req = $this->db->prepare('SELECT identifiant FROM user
        WHERE LOWER(identifiant) = :identifiant');

        $req->bindValue(':identifiant', strtolower($identifiant));

        $req->execute();

        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function verifMail($mail)
    {
        $req = $this->db->prepare('SELECT mail FROM user
        WHERE mail = :mail');

        $req->bindValue(':mail', $mail);

        $req->execute();

        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function getIdentifiant($identifiant)
    {
        $req = $this->db->prepare('SELECT id, identifiant, pass FROM user
        WHERE identifiant = :identifiant');

        $req->bindValue(':identifiant', $identifiant);

        $req->execute();

        $user = $req->fetch(\PDO::FETCH_ASSOC);

        return $user;
    }
}
