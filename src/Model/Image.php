<?php
namespace App\Model;

class Image extends Entity
{
    private $id;
    private $title;
    private $image;
    private $description;
    private $id_serie;
    private $img_acc;
    private $image_date;

    const IMGACC = [
        0 => 'ne pas définir pour la page d\'accueil',
        1 => 'Définir pour la page d\'accueil'
    ];

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

    public function setIdserie($id_serie)
    {
        $this->id_serie = (int)$id_serie;
    }

    public function setImgAcc($img_acc)
    {
        $this->img_acc = (int)$img_acc;
    }

    /*public function setIdexpo($id_expo)
    {
        $this->id_expo = (int)$id_expo;
    }*/

    public function setImagedate($image_date)
    {
        if(is_string($image_date))
        {
            $this->image_date = $image_date;
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

    public function image()
    {
        return $this->image;
    }

    public function description()
    {
        return $this->description;
    }

    public function id_serie()
    {
        return $this->id_serie;
    }

    public function img_acc()
    {
        return $this->img_acc;
    }

    public function getImgAcc(): string
    {
        return self::IMGACC[$this->img_acc];
    }

    /*public function id_expo()
    {
        return $this->id_expo;
    }*/

    public function image_date()
    {
        return $this->image_date;
    }
}
