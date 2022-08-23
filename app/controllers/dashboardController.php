<?php

namespace mvc\controllers;

use mvc\core\controller;
use mvc\core\helper;
use mvc\models\taskModel;

class dashboardController extends controller
{
    public $task;
    function __construct()
    {
        session_start();
        if (empty($_SESSION['data'])) {
            helper::redirect('user/index');
        }
        $this->task = new taskModel;
    }
    function index()
    {

        $data = $this->task->getTasks();
        $this->view("dashboard/index", ['data' => $data]);
    }
    function addTask()
    {
        $title = 'AddTask';
        $this->view("dashboard/addTask", ['title' => $title]);
    }
    function addReq()
    {

        $check = false;
        if (isset($_POST['TaskName']))
            $check = $this->task->setTask($_POST);
        if (isset($check)) {
            helper::redirect('dashboard/index');
        }
    }
    function delete($id)
    {

        if ($this->task->deleteTask($id)) {

            helper::redirect("dashboard/index");
        }
    }
    function update($id)
    {
        $title = 'UpdateTask';
        $taskBYID = $this->task->getTasksBYID($id);
        $this->view("dashboard/updateTask", ['title' => $title, 'tasks' => $taskBYID]);
    }
    function updateTask()
    {
        if ($this->task->updateTask($_POST, $_POST['ID'])) {
            helper::redirect("dashboard/index");
        }
    }
}
