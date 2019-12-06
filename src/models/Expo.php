<?php
namespace model;

class Expo extends Entity
{
    private $id;
    private $title;
    private $description;
    private $tech;
    private $num_img;
    private $date_expo;


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

    public function set_date_expo($date_expo)
    {
        if(is_string($date_expo))
        {
            $this->date_expo = $date_expo;
        }
    }

    /*-----------------------------
                Getters
    ------------------------------*/

    public function expo_id()
    {
        return $this->id;
    }

    public function expo_title()
    {
        return $this->title;
    }

    public function expo_description()
    {
        return $this->description;
    }

    public function expo_tech()
    {
        return $this->tech;
    }

    public function expo_num_img()
    {
        return $this->num_img;
    }

    public function expo_date_expo()
    {
        return $this->date_expo;
    }
}
