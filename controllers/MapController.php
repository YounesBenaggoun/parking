<?php


class MapController
{
    public function index()
    {
        $pageTitle = "index-Home ... Ma Page Title";
        $hideHeader = true;
        $hideFooter = true;

        $sql = "SELECT * FROM parking;";
        $parkings = Database::findBySql($sql);
        $parkings_json = json_encode($parkings);



        require_once("./views/map/map.view.php");
    }
}
