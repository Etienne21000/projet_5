<?php
namespace App\Model;

class Comment extends Entity
{
    private $id;
    // private $pseudo;
    private $user_id;
    private $comment;
    private $comment_date;
    private $edition_date;
    private $serie_id;
    private $num_com;
    private $identifiant;

    public function __construct(array $data)
    {
        $this->hydrate = $this->hydrate($data);
    }

    /*-----------------------------
    Setters
    ------------------------------*/

    public function setId($id)
    {
        $this->id = (int)$id;
    }

    public function setUserid($user_id)
    {
        $this->user_id = (int)$user_id;
    }

    public function setComment($comment)
    {
        if(is_string($comment))
        {
            $this->comment = $comment;
        }
    }

    public function setCommentdate($comment_date)
    {
        if(is_string($comment_date))
        {
            $this->comment_date = $comment_date;
        }
    }

    public function setEditiondate($edition_date)
    {
        if(is_string($edition_date))
        {
            $this->edition_date = $edition_date;
        }
    }

    public function setSerieid($serie_id)
    {
            $this->serie_id = (int)$serie_id;
    }

    public function setNumcom($num_com)
    {
        $this->num_com = $num_com;
    }

    public function setIdentifiant($identifiant)
    {
        if(is_string($identifiant))
        {
            $this->identifiant = $identifiant;
        }
    }

    /*-----------------------------
    Getters
    ------------------------------*/

    public function id()
    {
        return $this->id;
    }

    public function user_id()
    {
        return $this->user_id;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function comment_date()
    {
        return $this->comment_date;
    }

    public function edition_date()
    {
        return $this->edition_date;
    }

    public function serie_id()
    {
        return $this->serie_id;
    }

    public function num_com()
    {
        return $this->num_com;
    }

    public function identifiant()
    {
        return $this->identifiant;
    }
}
