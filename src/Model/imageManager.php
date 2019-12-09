<?php
namespace App\Model;

use App\Model\Image;

class ImageManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    //public function get image $id
    //Peut être ajouter variable pour définir s'il s'agit d'une serie ou expo
    public function getOneImg($id)
    {
        $req = $this->db->prepare('SELECT id, image, title, description id_serie, id_expo
        DATE_FORMAT(image_date, \'%d/%m/%Y\')
        FROM images WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $image = new Image($data);

        return $image;
    }

    public function getAll($start = -1, $limit = -1)
    {
        $Images = [];

        $req = 'SELECT id, title, image, description, id_serie, id_expo,
        DATE_FORMAT(image_date, \'%d/%m/%Y\') FROM images ORDER BY image_date';

        if ($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '. (int) $limite .' OFFSET ' . (int) $start;
        }

        $result = $this->db->query($req);

        while($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $image = new Image($data);
            $Images[] = $image;
        }

        return $Images;
    }

    public function addImage(Image $image)
    {
        $req = $this->db->prepare('INSERT INTO images(title, image, description, id_serie, id_expo, image_data)
        VALUES(:title, :image, :description, :id_serie, :id_expo, NOW())');

        $req->bindValue(':title', $image->image_title());
        $req->bindValue(':image', $image->image_image());
        $req->bindValue(':description', $image->image_description());
        $req->bindValue(':id_serie', $image->image_id_serie(), \PDO::PARAM_INT);
        $req->bindValue(':id_expo', $image->image_id_expo(), \PDO::PARAM_INT);

        $req->execute();
    }

    //public function get serie with associated images

    //public function get expo with associated images
}
