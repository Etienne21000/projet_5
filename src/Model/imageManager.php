<?php

namespace App\Model;

class ImageManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    //public function get image $id
    public function getOneImg($id)
    {
        $req = $this->db->prepare('SELECT id, image, title, description, id_serie,
        DATE_FORMAT(image_date, \'%d/%m/%Y\') AS image_date
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

        $req = 'SELECT i.id, i.title, i.image, i.description, i.id_serie,
        DATE_FORMAT(i.image_date, \'%d/%m/%Y à %Hh%i\') AS image_date
        FROM images AS i LEFT JOIN Serie AS s ON i.id_serie = s.id
        WHERE i.id_serie = :id_serie AND img_acc = 1 ORDER BY image_date';

        if ($start != -1 || $limit != -1) {
            $req .= ' LIMIT ' . (int)$limit . ' OFFSET ' . (int)$start;
        }

        $result = $this->db->prepare($req);

        $result->bindValue(':id_serie', $id_serie, \PDO::PARAM_INT);

        $result->execute();

        while ($data = $result->fetch(\PDO::FETCH_ASSOC)) {
            $image = new Image($data);
            $Images[] = $image;
        }

        return $Images;
    }

    public function getImgForSlider()
    {
        $Images = [];

        $req = 'SELECT i.id, i.title, i.image, i.description, i.id_serie,
        DATE_FORMAT(i.image_date, \'%d/%m/%Y à %Hh%i\') AS image_date
        FROM images AS i LEFT JOIN Serie AS s ON i.id_serie = s.id
        WHERE s.slide_on = true ORDER BY image_date';

        $result = $this->db->prepare($req);

        $result->execute();

        while ($data = $result->fetch(\PDO::FETCH_ASSOC)) {
            $image = new Image($data);
            $Images[] = $image;
        }

        return $Images;
    }

    public function getAll($start =-1, $limit =-1)
    {
        $Images = [];

        $req = 'SELECT id, title, image, description,
        DATE_FORMAT(image_date, \'%d/%m/%Y\') AS image_date
        FROM images ORDER BY image_date';

        // if($img_acc != -1)
        // {
        //     $req .= ' WHERE img_acc = ' . (int)$img_acc . ' ORDER BY image_date';
        // }

        if ($start != -1 || $limit != -1)
        {
            $req .= ' LIMIT ' . (int)$limit . ' OFFSET ' . (int)$start;
        }

        $result = $this->db->query($req);

        while ($data = $result->fetch(\PDO::FETCH_ASSOC)) {
            $image = new Image($data);
            $Images[] = $image;
        }

        return $Images;
    }

    public function getImgAcc()
    {
        $ImgAcc = [];

        $req = $this->db->prepare('SELECT id, title, image, description, img_acc,
        DATE_FORMAT(image_date, \'%d/%m/%Y\') AS image_date
        FROM images
        WHERE img_acc = 2
        ORDER BY image_date');

        $req->execute();

        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $image = new Image($data);
            $ImgAcc[] = $image;
        }

        return $ImgAcc;
    }

    public function getImgAccueil()
    {
        $req = $this->db->prepare('SELECT id, title, image, description, id_serie, cover,
        DATE_FORMAT(image_date, \'%d/%m/%Y à %Hh%i\') AS image_date
        FROM images
        WHERE cover = 1');

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $image = new Image($data);

        return $image;
    }

    public function addImage(Image $image)
    {
        $req = $this->db->prepare('INSERT INTO images(title, image, description, id_serie, img_acc, image_date)
        VALUES(:title, :image, :description, :id_serie, :img_acc, NOW())');

        $req->bindValue(':title', $image->title());
        $req->bindValue(':image', $image->image());
        $req->bindValue(':description', $image->description());
        $req->bindValue(':id_serie', $image->id_serie(), \PDO::PARAM_INT);
        $req->bindValue(':img_acc', $image->img_acc(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function countImg()
    {
        $countImg = $this->db->query('SELECT COUNT(*) FROM images')->fetchColumn();

        return $countImg;
    }

    public function deleteImg($id)
    {
        $req = $this->db->prepare('DELETE FROM images WHERE id = :id');
        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }

    public function updateImg(Image $image)
    {
        $req = $this->db->prepare('UPDATE images
        SET title = :title, description = :description, img_acc = :img_acc
        WHERE id = :id');

        $req->bindValue(':title', $image->title());
        // $req->bindValue(':image', $image->image());
        $req->bindValue(':description', $image->description());
        $req->bindValue(':img_acc', $image->img_acc());
        // $req->bindValue(':id_serie', $image->id_serie(), \PDO::PARAM_INT);
        $req->bindValue(':id', $image->id(), \PDO::PARAM_INT);

        $req->execute();
    }

    //choose image for home page
    public function chooseImage(Image $image)
    {
        $req = $this->db->prepare('UPDATE images SET cover = 1
        WHERE id = :id');

        $req->bindValue(':id', $image->id(), \PDO::PARAM_INT);

        $req->execute();
    }

    //unchoose image
    public function unchooseImg()
    {
        $req = $this->db->prepare('UPDATE images SET cover = 0');

        $req->execute();
    }

}
