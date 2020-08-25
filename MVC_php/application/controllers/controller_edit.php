<?php

class Controller_Edit extends Controller
{

    function __construct()
    {
        $this->model = new Model_Edit();
    }

    function action_index()
    {
    }

    function action_applyChenges()
    {
        $this->model->applyChengesInModel($_POST);
        header('Location: ' . getServerName());
    }
}
