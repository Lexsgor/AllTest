<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		if (getSession('alarm')) {
			$temp = getSession('alarm');
			setSession('alarm', '');
			$this->view->generate('Alarm.php', 'base_view.php', $data, $temp);
		} else {
			$this->view->generate('main_view.php', 'base_view.php', $data, getSession('admin'));
		}
	}
}
