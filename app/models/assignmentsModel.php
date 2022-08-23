<?php

namespace mvc\models;

use mvc\core\db;

class assignmentsModel extends db
{
    function setAssign($data)
    {
        return $this->insert($data);
    }
    function getAssignments()
    {
        return $this->all("SELECT *FROM assignments");
    }
    function deleteAssign($id)
    {
        return $this->delete($id);
    }
    function getAssignBYID($id)
    {
        return $this->all("SELECT *FROM assignments WHERE ID=$id");
    }
    function updateAssign($data, $id)
    {
        return $this->update($data, $id);
    }
    function getAssginByUserName($username)
    {
        return $this->all("SELECT assignments.ID ,assignments.Link,assignments.created_at,assignments.user_name,assignments.TaskID From user inner join assignments on user.username=assignments.user_name WHERE user.username='$username'");
    }
}
