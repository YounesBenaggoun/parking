<?php



use Models\User;
use Core\Database;
use Models\Parking;

use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase
{
    public function testGetParkingbyUser()
    {
        $idUser = 8;
        $result = Parking::getParkings($idUser);
        $this->assertIsArray($result);


        $userWitoutParking = 99999;
        $resultEpmty = Parking::getParkings($userWitoutParking);
        $this->assertEmpty($resultEpmty);
    }
}
