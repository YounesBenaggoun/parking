<?php


class HomeController
{
    public function index()
    {

        $sql = "SELECT * FROM user WHERE id = :id";
        $res = Database::findBySql($sql, [
            ":id" => 1
        ]);

        pri($res);


        require_once("./views/home/index.view.php");
    }
}
