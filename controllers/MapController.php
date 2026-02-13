<?php


class MapController
{
    public function index()
    {
        $pageTitle = "index-Home ... Ma Page Title";
        $hideHeader = true;
        $hideFooter = true;



        require_once("./views/map/map.view.php");
    }
}
