<?php

class Form_Example extends Twitter_Form
{
	public function init()
	{
		$this->addElement("text", "username", array(
			"label" => "Username",
			"description" => "Foobar"
		));

		$this->addElement("password", "password", array(
			"label" => "Password",
			"description" => "Please enter a nice password.",
			"required" => true,
		));

		$this->addElement("password", "oldpassword", array(
			"label" => "Old Password",
			"value" => "******",
			"description" => "This is your old password. Keep going.",
			"attribs" => array(
				"disabled" => true
			)
		));

		$this->addElement("select", "Security Question", array(
			"label" => "Please select a security question",
			"multiOptions" => array(
				"car" => "What was your first car?",
				"city" => "What is your favorite city?"
			)));

		$this->addElement("checkbox", "remember_me", array(
			"label" => "Remember me for two weeks",
		));

		$this->addElement("submit", "Register");
	}
}
