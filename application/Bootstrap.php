<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initAppAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
			'namespace' => '',
			'basePath' => dirname(__FILE__),
		));

		return $autoloader;
	}
}

