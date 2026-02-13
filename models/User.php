<?php



class User extends PrincipalModel
{

    protected static $table = "user";
    public function __construct($id = 0)
    {
        parent::__construct($id);
    }

    static function login($email, $password)
    {
        $sql = "SELECT id,lastname,firstname,email FROM " . static::$table . " WHERE email = :email AND password = :password";
        $data = [
            "email" => trim($email),
            "password" => trim($password)
        ];
        $res = Database::findBySql($sql, $data);
        if (count($res))
        {
            return $res[0]->id;
        }
        return false;
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
    public function getParkings()
    {
        $sql = "SELECT * FROM parking WHERE id_owner = :id;";
        $list = Database::findBySql($sql, [
            "id" => $this->id
        ]);
        return $list;
    }
}
