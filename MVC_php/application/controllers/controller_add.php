<?php

class Controller_Add extends Controller
{

    function __construct()
    {
        $this->model = new Model_Add();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('add_view.php', 'base_view.php');
    }

    function action_addTask()
    {
        $this->model->push_Task($_POST);
        header('Location: ' . getServerName());
    }
}
