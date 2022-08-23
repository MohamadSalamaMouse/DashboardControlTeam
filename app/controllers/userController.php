<?php

namespace mvc\controllers;

use mvc\core\controller;
use mvc\core\helper;
use mvc\models\userModel;

class userController extends controller
{
    private $user;
    function __construct()
    {
        session_start();

        $this->user = new userModel;
    }
    function index()
    {
        if (!empty($_SESSION['data'])) {
            helper::redirect("dashboard/index");
        }
        $this->view('user/login');
    }
    function register()
    {
        if (!empty($_SESSION['data'])) {
            helper::redirect("dashboard/index");
        }

        $this->view('user/register');
    }
    function setRegister()
    {
        $username = $_POST['username'];
        if (isset($username)) {
            $this->user = new userModel;
            if ($this->user->setUser($_POST)) {
                helper::redirect("dashboard/index");
            }
        }
    }
    function getUser()
    {

        $data = $this->user->getUser();
        $this->view("dashboard/user", ['data' => $data]);
    }
    function getUserByEmail()
    {

        if (!empty($_SESSION['data'])) {
            helper::redirect("dashboard/index");
        }

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $Password = $_POST['password'];
            $data = $this->user->getUserByEmail($email);
            if (!empty($data)) {
                if ($data[0]['email'] == $email && $data[0]['password'] == $Password) {
                    $_SESSION['data'] = $data;
                    helper::redirect("dashboard/index");
                } else {

                    helper::redirect('user/index');
                }
            } else {
                helper::redirect('user/index');
            }
        }
    }
    function logout()
    {
        session_destroy();
        helper::redirect('user/index');
    }
}
