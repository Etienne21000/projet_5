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

    public function newSerie($title, $description, $tech, $serie_img)
    {
        $Serie = new Serie([$data]);

        $Serie->setTitle($title);
        $Serie->setDescription($description);
        $Serie->setTech($tech);
        $Serie->setSerieimg($serie_img);

        $this->serie->addSerie($Serie);
    }

    public function update($id, $title, $description, $tech)
    {
        $Serie = new Serie([$data]);

        $Serie->setId($id);
        $Serie->setTitle($title);
        $Serie->setDescription($description);
        $Serie->setTech($tech);

        $this->serie->updateSerie($Serie);
    }

    public function getAll()
    {
        $Series = $this->serie->getAllSerie();

        return $Series;
    }

    public function getOne($id)
    {
        $serie = $this->serie->getOneSerie($id);

        return $serie;
    }
}