<?php
namespace App\Controller;

use App\Model\SerieManager;
// use App\Controller\ImageController;

use App\Model\Serie;

class SerieController
{
    private $serie;
    // private $images;

    public function __construct()
    {
        $this->serie = new SerieManager();
        // $this->images = new ImageController();
    }

    public function newSerie($title, $description, $tech/*, $slug*/)
    {
        $Serie = new Serie([$data]);

        $Serie->setTitle($title);
        $Serie->setDescription($description);
        $Serie->setTech($tech);
        // $Serie->setSlug($slug);
        // $Serie->setIdimg($id_img);

        $this->serie->addSerie($Serie);
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

    // public function unChoose()
    // {
    //     $this->serie->unchosseSerie();
    // }

    public function getAll()
    {
        $Series = $this->serie->getAllSerie($slug = 1);

        return $Series;
    }

    public function getAllExpos()
    {
        $Expos = $this->serie->getAllSerie($slug = 2);

        return $Expos;
    }

    public function getOne($id)
    {
        $serie = $this->serie->getOneSerie($id);
        // $Images = $this->images->getImagesBySeries($id_serie);

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
