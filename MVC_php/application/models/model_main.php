<?php

class Model_Main extends Model
{
	function get_data()
	{
		$data = file_get_contents(__DIR__ . "/data.json");
		return $data;
	}
}
