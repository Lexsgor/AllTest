<?php

class View
{
	public $server_name = "/MVC_php/";

	function generate($content_view, $baseViev,  $data = null, $additionalData = null)
	{
		$server_name = '/MVC_php';
		include 'application/views/' . $baseViev;
	}
}
