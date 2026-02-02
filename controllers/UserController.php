<?php


class UserController
{
    public function index()
    {
        $this->signin();
    }

    public function signin()
    {
        $userSession = new Session();
        $userId = $userSession->val();
        if ($userId)
        {
            header("Location: " . ROOT);
        }




        require_once("./views/users/signin.view.php");
    }
    public function login()
    {
        show($_POST);

        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userId = User::login($email, $password);
            if ($userId)
            {
                $userSession = new Session();
                $userSession->val($userId);
                //
                var_dump($userSession);

                header("Location: " . ROOT . "/user/signin");
            }
            else
            {
                header("Location: " . ROOT . "/user/signin");
            }
        }

        // $res = User::login($_POST[]);
    }
    public function signup()
    {

        //$res = User::createUser("omar", "younes", "p.primme@gmail.com", "12341234", "12341234");
        require_once("./views/users/signup.view.php");
    }
    public function logOut()
    {
        $session = new Session();
        $session->destroy();
        header("location:" . ROOT);
    }
}
