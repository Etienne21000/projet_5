<?php
namespace App\Model;

// use App\Model\Serie;

class SerieManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function addSerie(Serie $serie)
    {
        $req = $this->db->prepare('INSERT INTO Serie(title, description, tech, serie_img, creation_date)
        VALUES(:title, :description, :tech, :serie_img, NOW())');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());
        $req->bindValue(':serie_img', $serie->serie_img());

        $req->execute();
    }

    public function updateSerie(Serie $serie)
    {
        $req = $this->db->prepare('UPDATE Serie SET title = :title, description = :description,
        tech = :tech, id_img = :id_img
        WHERE id = :id');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());
        $req->bindValue(':id_img', $serie->id_img(), \PDO::PARAM_INT);
        $req->bindValue(':id', $serie->id(), \PDO::PARAM_INT);

        $req->execute();

    }

    //Get all series
    public function getAllSerie($start = -1, $limite = -1)
    {
        $Series = [];

        $req = 'SELECT s.id, s.title, s.description, s.tech, s.id_img, i.serie_img,
        DATE_FORMAT(s.creation_date, \'%d/%m/%Y\') AS creation_date
        FROM Serie AS s
        LEFT JOIN
        (SELECT id, image AS serie_img, id_serie
        FROM images) AS i
        ON s.id_img = i.id
        ORDER BY creation_date';

        if($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '. (int) $limite . ' OFFSET ' . (int) $start;
        }

        $result = $this->db->query($req);

        while ($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $serie = new Serie($data);
            $Series[] = $serie;
        }

        return $Series;
    }

    //Get One serie with its images.
    public function getOneSerie($id)
    {
        $req = $this->db->prepare('SELECT id, title, description, tech,
        DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date
        FROM Serie WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $serie = new Serie($data);

        return $serie;
    }
}
