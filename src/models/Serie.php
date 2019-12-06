<?php
namespace model;

class Serie extends Entity
{
    private $id;
    private $title;
    private $description;
    private $tech;
    private $num_img;
    private $creation_date;


    public function __construc(array $data)
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

    public function setNum_img($num_img)
    {
        $this->num_img = (int)$num_img;
    }

    public function set_creation_date($creation_date)
    {
        if(is_string($creation_date))
        {
            $this->creation_date = $creation_date;
        }
    }

    /*-----------------------------
                Getters
    ------------------------------*/

    public function serie_id()
    {
        return $this->id;
    }

    public function serie_title()
    {
        return $this->title;
    }

    public function serie_description()
    {
        return $this->description;
    }

    public function serie_tech()
    {
        return $this->tech;
    }

    public function serie_num_img()
    {
        return $this->num_img;
    }

    public function serie_creation_date()
    {
        return $this->creation_date;
    }
}
