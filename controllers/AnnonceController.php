<?php


class AnnonceController
{
    public function index()
    {


        require_once("./views/annonces/index.view.php");
    }
    public function ajouter()
    {
        echo "la methode ajouter";
    }
    public function oneAnnonce($id)
    {
        $annonce = new Annonces("annonce");
        $res = $annonce->getAnnonceByID($id);
        pri($res);


        require_once("./views/annonces/oneAnnonce.view.php");
    }
    public function registerAnnonce()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST")
        {
            $data = [
                "titre" => $_POST['titre'],
                "prix" => $_POST['prix'],
                "disponible" => $_POST['disponible']
            ];
            $annonce = new Annonces("annonce");
            $annonce->registerAnnonceBdd($data);
            // header("Location: " . ROOT . "/annonce/addAnnonce");
        }
        else
        {
            header("Location: " . ROOT . "/annonce/addAnnonce");
        }
    }
    public function annonceById($id, $id2)
    {
        echo "c'est ici anonce avec id = $id - -- $id2";
    }
    public function addAnnonce()
    {
        require_once("./views/annonces/addAnnonce.view.php");
    }
}
