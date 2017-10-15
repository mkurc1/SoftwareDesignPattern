<?php

class Setting
{
	private static $instance;

	private function __construct()
	{

	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new Setting();
		}

		return self::$instance;
	}
}

$setting = Setting::getInstance();
var_dump($setting);

?>