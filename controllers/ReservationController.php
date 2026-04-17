<?php

use Models\Reservation;
use Models\User;

class ReservationController
{
    public function index()
    {
        require_once("./views/home/index.view.php");
    }
    public function addReservation()
    {
        if (isset($_POST['id_parking']))
        {
            $begin = $_POST['begin'];
            $id_parking = $_POST['id_parking'];
            $duration = $_POST['duration'];
            Reservation::addReservation($begin, $duration, $id_parking, USER_ID);
            header("Location: " . ROOT . "/map");
        }
    }
    public function list()
    {
        $list = Reservation::getReservation(USER_ID);

        require_once("./views/Reservation/list.view.php");
    }
    public function remove($id)
    {
        $user = new User(USER_ID);
        $user->removeReservation($id);
        header("Location: " . ROOT . "/Reservation/list/");
    }
}
