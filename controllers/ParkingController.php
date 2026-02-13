<?php


class ParkingController
{
    public function index()
    {
        $this->list();
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
            $parking->name = $_POST['name'];
            $parking->lat = $_POST['lat'];
            $parking->lng = $_POST['lng'];
            $parking->adress = $_POST['adress'];
            $parking->spot = $_POST['spot'];
            $parking->save();

            header("Location: " . ROOT . "/parking");
        }
    }
    public function list()
    {
        $user = new User(USER_ID);
        $list = $user->getParkings();


        require_once("./views/parking/list.view.php");
    }
}
