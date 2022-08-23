<?php

namespace mvc\models;

use mvc\core\db;

class taskModel extends db
{
    function setTask($data)
    {
        return $this->insert($data);
    }
    function getTasks()
    {
        return $this->all("SELECT *FROM task");
    }
    function deleteTask($id)
    {
        return $this->delete($id);
    }
    function getTasksBYID($id)
    {
        return $this->all("SELECT *FROM task WHERE ID=$id");
    }
    function updateTask($data, $id)
    {
        return $this->update($data, $id);
    }
}
