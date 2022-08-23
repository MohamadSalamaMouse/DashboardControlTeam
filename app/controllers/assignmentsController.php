<?php

namespace mvc\controllers;

use mvc\core\controller;
use mvc\core\helper;
use mvc\models\assignmentsModel;

class assignmentsController extends controller
{
    public $assign;
    function __construct()
    {

        session_start();
        if (empty($_SESSION['data'])) {
            helper::redirect('user/index');
        }
        $this->assign = new  assignmentsModel;
    }
    function index()
    {
        $title = 'Assignments';

        $data = $this->assign->getAssignments();

        $username = $_SESSION['data'][0]['username'];

        $getAssignByUserName = $this->assign->getAssginByUserName($username);



        $this->view("dashboard/assign", ['title' => $title, 'data' => $data, 'dataByUserName' => $getAssignByUserName]);
    }
    function addAssign()
    {

        $title = 'AddLink';
        $this->view("dashboard/addAssign", ['title' => $title]);
    }
    function addReq()
    {

        $check = false;
        if (isset($_POST['Link']))
            $check = $this->assign->setAssign($_POST);
        if (isset($check)) {
            helper::redirect('assignments/index');
        }
    }
    function delete($id)
    {

        if ($this->assign->deleteAssign($id)) {

            helper::redirect('assignments/index');
        }
    }
    function update($id)
    {
        $title = 'UpdateLink';
        $AssignBYID = $this->assign->getAssignBYID($id);
        $this->view("dashboard/updateAssign", ['title' => $title, 'Assign' => $AssignBYID]);
    }
    function updateAssign()
    {
        if ($this->assign->updateAssign($_POST, $_POST['ID'])) {
            helper::redirect('assignments/index');
        }
    }
}
