<?php

use PHPUnit\Framework\TestCase;

class ParkingTest extends TestCase
{
    public function testPasswordMismatch()
    {
        $result = Parking::createUser(
            "John",
            "Doe",
            "john@test.com",
            "1234",
            "5678"
        );

        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);
    }

    public function testEmptyPassword()
    {
        $result = Parking::createUser(
            "John",
            "Doe",
            "john@test.com",
            "",
            ""
        );

        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);
    }

    public function testEmailAlreadyExists()
    {
        // Mock Database
        $this->mockDatabaseWithExistingEmail();

        $result = Parking::createUser(
            "John",
            "Doe",
            "john@test.com",
            "1234",
            "1234"
        );

        $this->assertEquals("EMAIL ALREADY EXIST", $result);
    }

    public function testCreateUserSuccess()
    {
        // Mock Database (no existing email)
        $this->mockDatabaseWithoutEmail();

        $result = Parking::createUser(
            "John",
            "Doe",
            "john@test.com",
            "1234",
            "1234"
        );

        // ta fonction ne retourne rien en succès → null
        $this->assertNull($result);
    }

    private function mockDatabaseWithExistingEmail()
    {
        // Exemple simple (à adapter selon ton système)
        Database::shouldReceive('findByAttribute')
            ->andReturn([['id' => 1]]);
    }

    private function mockDatabaseWithoutEmail()
    {
        Database::shouldReceive('findByAttribute')
            ->andReturn([]);
    }
}
