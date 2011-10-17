<?php

class Twitter_Form extends Zend_Form
{
	public function __construct()
	{
		$this->addPrefixPath("Twitter_Form_Decorator", "Twitter/Form/Decorator/", "decorator");
		parent::__construct();

		$this->clearDecorators();

		$this->setElementDecorators(array(
			"ViewHelper",
			array("Errors", array("placement" => "prepend")),
			array("Description", array("tag" => "span", "class" => "help-block")),
			array(array("wrapper" => "HtmlTag"), array("tag" => "div", "class" => "input")),
			"label",
			array(array("outerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "clearfix"))
		));

		$this->addDecorator("FormElements")
			->addDecorator("HtmlTag", array("tag" => "fieldset"))
			->addDecorator("Form", array("class" => "form-stacked"));
	}
}
