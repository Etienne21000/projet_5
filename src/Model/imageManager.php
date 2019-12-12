<?php
namespace App\Model;

// use App\Model\Image;

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
        $req = $this->db->prepare('SELECT id, image, title, description, /*id_serie, id_expo,*/
        DATE_FORMAT(image_date, \'%d/%m/%Y\')
        FROM images WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $image = new Image($data);

        return $image;
    }

    public function getImgBySerie($id_serie, $start = -1, $limit = -1)
    {
        $Images = [];

        $req = 'SELECT i.id, i.title, i.image, i.description, i.id_serie, i.id_expo,
        DATE_FORMAT(i.image_date, \'%d/%m/%Y à %Hh%i\') AS image_date
        FROM images AS i LEFT JOIN Serie AS s ON i.id_serie = s.id
        WHERE i.id_serie = :id_serie ORDER BY image_date';

        if ($start != -1 || $limit != -1)
        {
            $req .= ' LIMIT '. (int) $limit .' OFFSET ' . (int) $start;
        }

        $result = $this->db->prepare($req);

        $result->bindValue(':id_serie', $id_serie, \PDO::PARAM_INT);

        $result->execute();

        while ($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $image = new Image($data);
            $Images[] = $image;
        }

        return $Images;
    }

    public function getAll($start = -1, $limit = -1)
    {
        $Images = [];

        $req = 'SELECT id, title, image, description, /*id_serie, id_expo,*/
        DATE_FORMAT(image_date, \'%d/%m/%Y\') FROM images ORDER BY image_date';

        if ($start != -1 || $limit != -1)
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
        $req = $this->db->prepare('INSERT INTO images(title, image, description, id_serie, image_date)
        VALUES(:title, :image, :description, :id_serie, NOW())');

        $req->bindValue(':title', $image->title());
        $req->bindValue(':image', $image->image());
        $req->bindValue(':description', $image->description());
        $req->bindValue(':id_serie', $image->image_id_serie(), \PDO::PARAM_INT);
        // $req->bindValue(':id_expo', $image->image_id_expo(), \PDO::PARAM_INT);

        $req->execute();
    }

    //public function get serie with associated images

    //public function get expo with associated images
}
