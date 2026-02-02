<?php


class TestController
{
    public function index()
    {
        $annonce = new Annonce(80);
        $annonce->titre = "Maroc";
        $annonce->save();
        show($annonce);
    }
}
