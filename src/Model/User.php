<?php
namespace App\Model;

class User extends Entity
{
    private $id;
    private $identifiant;
    private $mail;
    private $pass;
    private $inscription_date;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate = $this->hydrate($data);
    }

    /*---------------------------------------
    User setters
    ----------------------------------------*/

    public function setId($id)
    {
        $this->id = (int)$id;
    }

    public function setIndentifiant($identifiant)
    {
        if (is_string($identifiant))
        {
            $this->identifiant = $identifiant;
        }
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setPassword($pass)
    {
        $this->pass = $pass;
    }

    public function setInscriptiondate($inscription_date)
    {
        if(is_string($inscription_date))
        {
            $this->inscription_date = $inscription_date;
        }
    }

    public function setRole($role)
    {
        $this->role = (bool)$role;
    }

    /*---------------------------------------
    User Getters
    ----------------------------------------*/

    public function id()
    {
        return $this->id;
    }

    public function identifiant()
    {
        return $this->identifiant;
    }

    public function mail()
    {
        return $this->mail;
    }

    public function passWord()
    {
        return $this->pass;
    }

    public function inscription_date()
    {
        return $this->inscription_date;
    }

    public function role()
    {
        return $this->role;
    }
}
