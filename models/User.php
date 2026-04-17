<?php

declare(strict_types=1);

namespace Models;



use Core\PrincipalModel;
use Core\Database;
use Models\Parking;



class User extends PrincipalModel
{
    protected static string $table = 'user';

    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;


    public function __construct($id = 0)
    {
        parent::__construct($id);
    }

    public static function login($email, $password)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE email = :email ";
        $data = [
            ":email" => trim($email)
        ];
        $res = Database::findBySql($sql, $data);
        if ($res &&  count($res))
        {
            if (password_verify($password, $res[0]->password))
            {
                return $res[0]->id;
            }
        }
        return false;
    }

    public static function createUser($firstname,  $lastname,  $email,  $password,  $password2)
    {
        if (!$password || $password != $password2)
            return "PASSWORD DON'T MATCH OR EMPTY";
        $doubled = User::findByAttribute("email", $email);

        if ($doubled)
        {
            return "EMAIL ALREADY EXIST";
        }
        $user = new User();
        $user->firstname = trim($firstname);
        $user->lastname = trim($lastname);
        $user->email = trim($email);
        $user->password = password_hash(trim($password), PASSWORD_DEFAULT);
        pri($user);
        if ($user->save())
        {
            return true;
        }
        return false;
    }
    public function getParkings()
    {
        $sql = "SELECT * FROM parking WHERE id_owner = :id;";
        $list = Database::findBySql($sql, [
            ":id" => $this->id
        ]);
        if (!$list || !sizeof($list))
        {
            return [];
        }
        return $list;
    }
    public function getName()
    {
        return ucfirst($this->lastname) . " " . ucfirst($this->firstname);
    }
    public function hasParking($idParking)
    {
        $parking = new Parking($idParking);
        if ($parking->id_owner == $this->id)
        {
            return true;
        }
        return false;
    }
    public function removeParking($idParking)
    {
        $parking = new Parking($idParking);
        if ($parking->id_owner == $this->id)
        {
            $parking->remove();
            return true;
        }
        return false;
    }
    public function getReservation()
    {
        $sql = "SELECT * FROM reservation WHERE id_user = :id";
        $records = Database::findBySql($sql, [
            ":id" => $this->id
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
    public function removeReservation(int $id_reservation): void
    {
        $sql = "DELETE FROM reservation WHERE id = :id_reservation AND id_user = :id_user ";
        Database::query($sql, [
            ":id_reservation" => $id_reservation,
            ":id_user" => $this->id
        ]);
    }
}
