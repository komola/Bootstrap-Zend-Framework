<?php

class Form_Example extends Twitter_Form
{
	public function init()
	{
		// Make this form horizontal
		$this->setAttrib("horizontal", true);

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

		$this->addElement("radio", "terms", array(
			"label" => "I agree to the terms",
		));

		$this->addElement("radio", "terms", array(
			"label" => "Terms",
			"multiOptions" => array(
				"1" => "I agree to the terms",
				"0" => "I don't agree to the terms"
			)
		));

		$this->addElement("multicheckbox", "multichecks", array(
			"description" => "This is a nice thing.",
			"label" => "Foobar",
			"multiOptions" => array(
				"1" => "I agree to the terms",
				"0" => "I don't agree to the terms"
			)
		));

		$this->addElement("multicheckbox", "multichecks2", array(
			"label" => "Inline checkboxes",
			"inline" => true,
			"multiOptions" => array(
				"1" => "One",
				"0" => "Two"
			)
		));

		$this->addElement("file", "file", array(
			"label" => "Please upload a file",
			"required" => true
			));

		$this->addElement("hidden", "id", array(
			"value" => "Test",
			"label" => "Test"
		));

		$elm = $this->createElement("text", "foo", array(
			"label" => "Element created via createElement"));

		$this->addElement($elm);

		$elm2 = new Zend_Form_Element_Text("foo2", array(
			"label" => "Via new instance"));

		$this->addElement($elm2);

		$this->addElement("submit", "register", array("label" => "Register"));
		$this->addElement("reset", "reset", array("label" => "Reset"));
		$this->addElement("button", "custom", array(
			"class" => "success",
			"label" => "Custom classes, too!"
		));
	}
}
