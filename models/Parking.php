<?php

declare(strict_types=1);

namespace Models;

use Core\PrincipalModel;
use Core\Database;


class Parking extends PrincipalModel
{

    protected static string $table = "parking";
    public function __construct($id = 0)
    {
        parent::__construct($id);
    }
    public static function getParkings($id_owner)
    {
        $sql = "SELECT * FROM parking WHERE id_owner = :id;";
        $list = Database::findBySql($sql, [
            ":id" => $id_owner
        ]);
        if (!$list || !sizeof($list))
        {
            return [];
        }
        return $list;
    }
}
