<?php
namespace model;

class Image extends Entity
{
    private $id;
    private $title;
    private $image;
    private $description;
    private $id_serie;
    private $id_expo;
    private $image_date;

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

    public function setImage($image)
    {
        if(is_string($image))
        {
            $this->image = $image;
        }
    }

    public function setDescription($description)
    {
        if(is_string($description))
        {
            $this->description = $description;
        }
    }

    public function setIdSerie($id_serie)
    {
        $this->id_serie = (int)$id_serie;
    }

    public function setIdExpo($id_expo)
    {
        $this->id_expo = (int)$id_expo;
    }

    public function set_image_date($image_date)
    {
        if(is_string($image_date))
        {
            $this->image_date = $image_date;
        }
    }

    /*-----------------------------
                Getters
    ------------------------------*/

    public function image_id($id)
    {
        return $this->id;
    }

    public function image_title($title)
    {
        return $this->title;
    }

    public function image_image($image)
    {
        return $this->image;
    }

    public function image_description($description)
    {
        return $this->description;
    }

    public function image_id_serie($id_serie)
    {
        return $this->id_serie;
    }

    public function image_id_expo($id_expo)
    {
        return $this->id_expo;
    }

    public function image_date($image_date)
    {
        return $this->image_date;
    }
}
