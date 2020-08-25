<?php
const SERVER_NAME = 'http://test/MVC_php/';

function getServerName()
{
    return SERVER_NAME;
}

function setSession($name, $data)
{
    session_start();
    $_SESSION[$name] = $data;
    session_write_close();
}

function getSession($name)
{
    session_start();
    $temp = $_SESSION[$name];
    session_write_close();
    return $temp;
}
