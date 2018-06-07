<?php

class Session implements iWorkData
{
    public __construct()
    {
        session_start();
    }

    public function getData($key)
    {
        return $_SESSION[$key];
    }

    public function saveData($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public function deleteData($key)
    {
        $_SESSION[$key] = '';
        return true;
    }

