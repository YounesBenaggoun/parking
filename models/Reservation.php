<?php

namespace Models;

use Core\PrincipalModel;
use Core\Database;
use \DateTime;


class Reservation extends PrincipalModel
{

    protected static string $table = "reservation";
    public function __construct($id = 0)
    {
        parent::__construct($id);
    }
    static function addReservation($begin = "2026-04-16T01:00", $duration = "30", $id_parking = 1, $id_user = 8): void
    {

        $date = new DateTime($begin);
        $from = $date->getTimestamp();
        $to = $from + ($duration * 60);
        $reservation = new Reservation();
        $reservation->id_user = $id_user;
        $reservation->id_parking = $id_parking;
        $reservation->start_reservation = date('Y-m-d H:i:s', $from);
        $reservation->end_reservation = date('Y-m-d H:i:s', $to);
        $reservation->price = self::getPriceOfReservation($id_parking, $duration);
        $reservation->save();
    }
    static function getPriceOfReservation(int $id_parking, int $duration): float
    {
        $parking = new Parking($id_parking);
        $price = $parking->price * ($duration / 15);
        return $price;
    }
    static function getReservation($id_user)
    {
        $sql = "SELECT * FROM reservation WHERE id_user = :id_user";
        $records = Database::findBySql($sql, [
            ":id_user" => $id_user
        ]);
        if (!$records || !sizeof($records))
        {
            return [];
        }

        foreach ($records as $record)
        {
            $parking = new Parking($record->id_parking);
            // pri($parking);
            $record->address = $parking->address;
            $record->name = $parking->name;
        }
        if (!$records || !sizeof($records))
        {
            return [];
        }
        return $records;
    }
}
