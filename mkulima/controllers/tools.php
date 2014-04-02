<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends ExtendedController{
	public function message($to='World')
	{
		echo "Hello {$to}".PHP_EOL;
	}
}