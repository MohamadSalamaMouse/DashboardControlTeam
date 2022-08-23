<?php

namespace mvc\models;

use mvc\core\db;

class userModel extends db
{
    function setUser($data)
    {
        return $this->insert($data);
    }
    function getUser()
    {
        return $this->all("SELECT *FROM user");
    }
    function getUserByEmail($email)
    {
        return $this->all("SELECT *FROM user WHERE email='$email'");
    }
}
