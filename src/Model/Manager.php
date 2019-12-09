<?php

namespace App\Model;
use PDO;

class Manager
{
    private $db;

    public function dbConnect()
    {
        try
        {
            $db = new \PDO('mysql:host=localhost;dbname=campo dombra', 'root', 'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $db;
        }

        catch (\Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
    }
}
