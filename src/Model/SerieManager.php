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
        $req = $this->db->prepare('INSERT INTO Serie(title, description, tech, creation_date)
        VALUES(:title, :description, :tech, NOW())');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());

        $req->execute();
    }

    public function updateSerie(Serie $serie)
    {
        $req = $this->db->prepare('UPDATE Serie SET title = :title, description = :description, tech = :tech
        WHERE id = :id');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());
        $req->bindValue(':id', $serie->id(), \PDO::PARAM_INT);

        $req->execute();

    }

    //Get all series
    public function getAllSerie($start = -1, $limite = -1)
    {
        $Series = [];

        $req = 'SELECT id, title, description, tech,
        DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date
        FROM Serie ORDER BY creation_date';

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
