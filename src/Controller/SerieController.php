<?php
namespace App\Controller;

use App\Model\SerieManager;

use App\Model\Serie;

class SerieController
{
    private $serie;

    public function __construct()
    {
        $this->serie = new SerieManager();
    }

    public function newSerie($title, $description, $tech)
    {
        $Serie = new Serie([$data]);

        $Serie->setTitle($title);
        $Serie->setDescription($description);
        $Serie->setTech($tech);

        $this->serie->addSerie($Serie);
    }

    public function newExpo($title, $description, $tech)
    {
        $Expo = new Serie([$data]);

        $Expo->setTitle($title);
        $Expo->setDescription($description);
        $Expo->setTech($tech);

        $this->serie->addExpo($Expo);
    }

    public function update($id, $title, $description, $tech, $id_img)
    {
        $Serie = new Serie([$data]);

        $Serie->setId($id);
        $Serie->setTitle($title);
        $Serie->setDescription($description);
        $Serie->setTech($tech);
        $Serie->setIdimg($id_img);

        $this->serie->updateSerie($Serie);
    }

    public function serieChoose($id)
    {
        $Serie = new Serie([$data]);

        $Serie->setId($id);

        $this->serie->chooseSerie($Serie);
    }

    public function unChoose()
    {
        $this->serie->unchosseSerie();
    }

    public function getSerieAdmin()
    {
        $Series = $this->serie->getAllSerie($slug = 1, $start = 0, $limite = 3);

        return $Series;
    }

    public function getAll()
    {
        $series = $this->serie->getAllSerie($slug = 1);

        return $series;
    }

    public function getAllExpos()
    {
        $Expos = $this->serie->getAllSerie($slug = 2);

        return $Expos;
    }

    public function getExpoAdmin()
    {
        $Expos = $this->serie->getAllSerie($slug = 2, $start = 0, $limite = 3);

        return $Expos;
    }

    public function getOne($id)
    {
        $serie = $this->serie->getOneSerie($id);

        return $serie;
    }

    public function countS()
    {
        $countSerie = $this->serie->countSeries();

        return $countSerie;
    }

    public function countE()
    {
        $countExpo = $this->serie->countExpos();

        return $countExpo;
    }

    public function deleteOneSerie($id)
    {
        $serie = $this->serie->deleteSerie($id);
    }
}
