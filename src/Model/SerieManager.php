<?php
namespace App\Model;

class SerieManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function addSerie(Serie $serie)
    {
        $req = $this->db->prepare('INSERT INTO Serie(title, description, tech, slug, creation_date)
        VALUES(:title, :description, :tech, 1, NOW())');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());

        $req->execute();
    }

    public function addExpo(Serie $serie)
    {
        $req = $this->db->prepare('INSERT INTO Serie(title, description, tech, slug, creation_date)
        VALUES(:title, :description, :tech, 2, NOW())');

        $req->bindValue(':title', $serie->title());
        $req->bindValue(':description', $serie->description());
        $req->bindValue(':tech', $serie->tech());

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
    public function getAllSerie($slug, $start = -1, $limite = -1)
    {
        $Series = [];

        $req = 'SELECT s.id, s.title, s.description, s.tech, s.id_img, s.slug, i.serie_img,
        DATE_FORMAT(s.creation_date, \'%d/%m/%Y\') AS creation_date
        FROM Serie AS s
        LEFT JOIN
        (SELECT id, image AS serie_img, id_serie
        FROM images) AS i
        ON s.id_img = i.id
        WHERE s.slug = :slug
        ORDER BY creation_date';

        if($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '. (int) $limite . ' OFFSET ' . (int) $start;
        }

        $result = $this->db->prepare($req);

        $result->bindValue(':slug', $slug, \PDO::PARAM_INT);

        $result->execute();

        while ($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $serie = new Serie($data);
            $Series[] = $serie;
        }

        return $Series;
    }

    //Get One serie.
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

    //Select serie for slideShow
    public function chooseSerie(Serie $serie)
    {
        $req = $this->db->prepare('UPDATE Serie SET slide_on = 1
        WHERE id = :id');

        $req->bindValue(':id', $serie->id(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function unchosseSerie()
    {
        $req = $this->db->prepare('UPDATE Serie SET slide_on = 0');

        $req->execute();
    }

    public function countSeries()
    {
        $countSerie = $this->db->query('SELECT COUNT(*) FROM Serie WHERE slug = 1')->fetchColumn();

        return $countSerie;
    }

    public function countExpos()
    {
        $countExpo = $this->db->query('SELECT COUNT(*) FROM Serie WHERE slug = 2')->fetchColumn();

        return $countExpo;
    }

    public function deleteSerie($id)
    {
        $req = $this->db->prepare('DELETE FROM Serie WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }
}
