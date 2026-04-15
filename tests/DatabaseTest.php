<?php

use PHPUnit\Framework\TestCase;
use Core\Database;

class DatabaseTest extends TestCase
{
    // public function testGetPDOInstance()
    // {
    //     $pdo = Database::getPDO();

    //     $this->assertInstanceOf(PDO::class, $pdo);
    // }

    // public function testQueryExecution()
    // {
    //     $result = Database::query("SELECT 1 as test");

    //     $this->assertNotFalse($result);

    //     $data = $result->fetch(PDO::FETCH_ASSOC);

    //     $this->assertEquals(1, $data['test']);
    // }

    public function testInsertQuery()
    {
        //  Table de Test = phpunit_table =>id (Auto_incrémenté , bigInt),  user (text), age (int)
        $id = Database::insertQuery(
            "INSERT INTO phpunit_table (user) VALUES (:user)",
            [":user" => "MyPHPUnit"]
        );

        $this->assertNotFalse($id);
    }

    // public function testCountQuery()
    // {
    //     $count = Database::countQuery("SELECT COUNT(*) FROM user");
    //     $this->assertIsNumeric($count);
    // }

    // public function testFindBySqlAvecArrayResult()
    // {
    //     $results = Database::findBySql(
    //         "SELECT * FROM user",
    //         [],
    //         true
    //     );

    //     $this->assertIsArray($results);
    // }

    // public function testFindById()
    // {
    //     //  suppose qu’un id existe
    //     $result = Database::findById("user", 1);

    //     $this->assertTrue(
    //         $result === false || is_object($result)
    //     );
    // }




    // public function testFindByAttribute()
    // {
    //     $results = Database::findByAttribute(
    //         "test_table",
    //         "name",
    //         "PHPUnit"
    //     );

    //     $this->assertTrue(
    //         $results === false || is_array($results)
    //     );
    // }
}
