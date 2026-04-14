<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetName()
    {
        $user = new User();
        $user->firstname = "john";
        $user->lastname = "doe";

        $this->assertEquals("Doe John", $user->getName());
    }

    public function testLoginSuccess()
    {
        // Mock Database
        $mockResult = [
            (object)[
                'id' => 1,
                'lastname' => 'Doe',
                'firstname' => 'John',
                'email' => 'test@test.com'
            ]
        ];

        Database::shouldReceive('findBySql')
            ->once()
            ->andReturn($mockResult);

        $result = User::login("test@test.com", "password");

        $this->assertEquals(1, $result);
    }

    public function testLoginFail()
    {
        Database::shouldReceive('findBySql')
            ->once()
            ->andReturn([]);

        $result = User::login("wrong@test.com", "wrong");

        $this->assertFalse($result);
    }

    public function testCreateUserPasswordMismatch()
    {
        $result = User::createUser("John", "Doe", "test@test.com", "pass1", "pass2");

        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);
    }

    public function testCreateUserEmailAlreadyExists()
    {
        User::shouldReceive('findByAttribute')
            ->once()
            ->andReturn(true);

        $result = User::createUser("John", "Doe", "test@test.com", "pass", "pass");

        $this->assertEquals("EMAIL ALREADY EXIST", $result);
    }

    public function testHasParkingTrue()
    {
        $user = new User();
        $user->id = 1;

        $parkingMock = $this->createMock(Parking::class);
        $parkingMock->id_owner = 1;

        $this->assertTrue($user->hasParking(1));
    }

    public function testRemoveParkingFalse()
    {
        $user = new User();
        $user->id = 1;

        $this->assertFalse($user->removeParking(99));
    }
}
