<?php

class Controller_Pass extends Controller
{

    function __construct()
    {
        $this->model = new Model_Pass();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('pass_view.php', 'base_view.php');
    }

    function action_validPass()
    {
        $this->model->validPassInModel($_POST);
        header('Location: ' . getServerName());
    }

    function action_exit()
    {
        $this->model->exitInModel();
        header('Location: ' . getServerName());
    }
}
