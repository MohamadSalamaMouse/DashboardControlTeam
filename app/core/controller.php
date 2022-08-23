<?php

namespace mvc\core;

class controller
{
    function view($path, $arr = [])
    {
        require views . $path . '.php';
        return $arr;
    }
}
