<?php



use Models\User;
use Core\Database;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetName()
    {
        $user = new User();
        $user->firstname = "Younes";
        $user->lastname = "Benaggoun";

        $this->assertEquals("Benaggoun Younes", $user->getName());
    }




    public function testCreateUserPasswordDifferentes()
    {
        $result = User::createUser("John", "Doe", "test@test.com", "pass1", "pass2");
        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);

        $result = User::createUser("John", "Doe", "test@test.com", "", "pass2");
        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);

        $result = User::createUser("John", "Doe", "test@test.com", "pass4", "");
        $this->assertEquals("PASSWORD DON'T MATCH OR EMPTY", $result);
    }
}
