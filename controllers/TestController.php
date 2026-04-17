<?php

use Core\Database;
use Models\Reservation;
use Models\User;
use Models\Parking;

class TestController
{
    public function index()
    {

        // $reservation = new Parking(1);
        // var_dump($reservation);

        Reservation::addReservation();


        echo "TestController";
    }
}
