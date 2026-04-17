<?php

use Models\Session;
use Models\User;


class UserController
{
    public function index()
    {
        $this->signin();
    }

    public function signin()
    {
        if (USER_ID)
        {
            header("Location: " . ROOT . "/map");
        }
        require_once("./views/users/signin.view.php");
    }
    public function login()
    {


        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userId = User::login($email, $password);
            if ($userId)
            {
                $userSession = new Session();
                $userSession->val($userId);
                header("Location: " . ROOT . "/map");
            }
            else
            {
                header("Location: " . ROOT . "/user/signin");
            }
        }
    }
    public function signup()
    {
        require_once("./views/users/signup.view.php");
    }
    public function createUser()
    {
        if (isset($_POST['firstname']))
        {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $res = User::createUser($firstname, $lastname, $email, $password, $password2);
        }
        header("Location: " . ROOT . "/User");
    }


    public function logOut()
    {
        $session = new Session();
        $session->destroy();
        header("location:" . ROOT);
    }
}
