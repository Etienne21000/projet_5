<?php
namespace App\Model;

class Serie extends Entity
{
    private $id;
    private $title;
    private $description;
    private $tech;
    private $num_img;
    private $creation_date;
    private $id_img;
    private $serie_img;


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

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->title = $title;
        }
    }

    public function setDescription($description)
    {
        if(is_string($description))
        {
            $this->description = $description;
        }
    }

    public function setTech($tech)
    {
        if(is_string($tech))
        {
            $this->tech = $tech;
        }
    }

    public function setNumimg($num_img)
    {
        $this->num_img = (int)$num_img;
    }

    public function setCreationdate($creation_date)
    {
        if(is_string($creation_date))
        {
            $this->creation_date = $creation_date;
        }
    }

    public function setIdimg($id_img)
    {
        $this->id_img = (int)$id_img;
    }

    public function setSerieimg($serie_img)
    {
        if(is_string($serie_img))
        {
            $this->serie_img = $serie_img;
        }
    }

    /*-----------------------------
    Getters
    ------------------------------*/

    public function id()
    {
        return $this->id;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    public function tech()
    {
        return $this->tech;
    }

    public function num_img()
    {
        return $this->num_img;
    }

    public function creation_date()
    {
        return $this->creation_date;
    }

    public function id_img()
    {
        return $this->id_img;
    }

    public function serie_img()
    {
        return $this->serie_img;
    }
}
