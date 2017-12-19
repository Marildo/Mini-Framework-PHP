<?php

namespace UAI\Controller;

class Authentication
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function authenticate($sessionName)
    {
        if (isset($_SESSION[$sessionName])) {
            return true;
        }
        return false;
    }

    public function save($sessionName, $value)
    {
        $_SESSION[$sessionName] = $value;
    }

    public function clear($sessionName)
    {
        if (isset($_SESSION[$sessionName])) {
            unset($_SESSION[$sessionName]);
        }
        if (isset($_SESSION["url"])) {
            unset($_SESSION["url"]);
        }
    }

    public function read($sessionName)
    {
        if (isset($_SESSION[$sessionName])) {
            return $_SESSION[$sessionName];
        } else {
            return null;
        }
    }
}
