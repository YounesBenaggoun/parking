<?php



class Parking extends PrincipalModel
{

    protected static $table = "parking";
    public function __construct($id = 0)
    {
        parent::__construct($id);
    }


    static function createUser($firstname,  $lastname,  $email,  $password,  $password2)
    {
        if (!$password || $password != $password2)
            return "PASSWORD DON'T MATCH OR EMPTY";
        $doubled = Database::findByAttribute(static::$table, "email", $email);
        if (count($doubled))
            return "EMAIL ALREADY EXIST";
        $user = new User();
        $user->firstname = trim($firstname);
        $user->lastname = trim($lastname);
        $user->email = trim($email);
        $user->password = trim($password);
        $user->save();
    }
}
