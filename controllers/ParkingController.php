<?php


class ParkingController
{
    public function index()
    {
    }
    public function add()
    {


        require_once("./views/parking/addParking.view.php");
    }
    public function addParking()
    {
        if (isset($_POST['adress']))
        {
            $parking = new Parking();
            $parking->id_owner = USER_ID;
            $parking->lat = $_POST['lat'];
            $parking->lng = $_POST['lng'];
            $parking->adress = $_POST['adress'];
            $parking->places = $_POST['places'];
            $parking->save();

            header("Location: " . ROOT . "/parking");
        }
    }
    public function list()
    {
        $list = Parking::findAll();


        require_once("./views/parking/list.view.php");
    }
}
