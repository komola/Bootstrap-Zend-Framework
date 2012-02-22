<?php

class Twitter_Form extends Zend_Form
{
	public function __construct($options = null)
	{
		// Let's load our own decorators
		$this->addPrefixPath("Twitter_Form_Decorator", "Twitter/Form/Decorator/", "decorator");

		// Get rid of all the pre-defined decorators
		$this->clearDecorators();

		// Decorators for all the form elements
		$this->setElementDecorators(array(
			"ViewHelper",
			array("Errors", array("placement" => "append")),
			array("Description", array("tag" => "span", "class" => "help-block")),
			array(array("innerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "controls")),
			"Label",
			array(array("outerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "control-group"))
		));

		// Decorators for the form itself
		$this->addDecorator("FormElements")
			->addDecorator("HtmlTag", array("tag" => "fieldset"))
			->addDecorator("Form", array("class" => "form-vertical"));

		parent::__construct($options);
	}

	/**
	 * @see Zend_Form::addElement
	 *
	 * We have to override this, because we have to set some special decorators 
	 * on a per-element basis (checkboxes and submit buttons have different 
	 * decorators than other elements)
	 */
	public function addElement($element, $name = null, $options = null)
	{
		parent::addElement($element, $name, $options);

		if(!$element instanceof Zend_Form_Element_Abstract && $name != null)
		{
			$element = $this->getElement($name);
		}

		// Special style for Zend 
		if($element instanceof Zend_Form_Element_Submit
			|| $element instanceof Zend_Form_Element_Reset
			|| $element instanceof Zend_Form_Element_Button)
		{
			$class = "";

			if($element instanceof Zend_Form_Element_Submit
				&& !($element instanceof Zend_Form_Element_Reset)
			 	&& !($element instanceof Zend_Form_Element_Button))
			{
				$class = "btn-primary";
			}

			$element->setAttrib("class", trim("btn $class " . $element->getAttrib("class")));
			$element->removeDecorator("Label");
			$element->removeDecorator("outerwrapper");
			$element->removeDecorator("innerwrapper");

			$this->_addActionsDisplayGroupElement($element);

			//$element->addDecorator(array(
				//"outerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "actions")
			//);
		}

		if($element instanceof Zend_Form_Element_Checkbox)
		{
			$element->setDecorators(array(
				array(array("labelopening" => "HtmlTag"), array("tag" => "label", "class" => "checkbox", "id" => $element->getId()."-label", "for" => $element->getName(), "openOnly" => true)),
				"ViewHelper",
				array("Checkboxlabel"),
				array(array("labelclosing" => "HtmlTag"), array("tag" => "label", "closeOnly" => true)),
				array(array("liwrapper" => "HtmlTag"), array("tag" => "li")),
				array(array("ulwrapper" => "HtmlTag"), array("tag" => "ul", "class" => "inputs-list")),
				array("Errors", array("placement" => "prepend")),
				array("Description", array("tag" => "span", "class" => "help-block")),
				array(array("innerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "controls")),
				array(array("outerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "control-group"))
			));
		}

		if($element instanceof Zend_Form_Element_Radio
			|| $element instanceof Zend_Form_Element_MultiCheckbox)
		{
			$multiOptions = array();
			foreach($element->getMultiOptions() as $value => $label)
			{
				$multiOptions[$value] = " ".$label;
			}

			$element->setMultiOptions($multiOptions);


			$element->setOptions(array("separator" => ""));
			$element->setDecorators(array(
				"ViewHelper",
				array(array("liwrapper" => "HtmlTag"), array("tag" => "li")),
				array(array("ulwrapper" => "HtmlTag"), array("tag" => "ul", "class" => "inputs-list")),
				array("Errors", array("placement" => "prepend")),
				array("Description", array("tag" => "span", "class" => "help-block")),
				array(array("innerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "controls")),
				array(array("outerwrapper" => "HtmlTag"), array("tag" => "div", "class" => "control-group"))
			));
		}

		if($element instanceof Zend_Form_Element_Hidden)
		{
			$element->setDecorators(array("ViewHelper"));
		}
	}

	private function _addActionsDisplayGroupElement($element)
	{
		$displayGroup = $this->getDisplayGroup("zfBootstrapFormActions");

		if($displayGroup === null)
		{
			$displayGroup = $this->addDisplayGroup(
				array($element), 
				"zfBootstrapFormActions",
				array(
					"decorators" => array(
						"FormElements",
						array("HtmlTag", array("tag" => "div", "class" => "form-actions"))
					)
				));
		}
		else
		{
			$displayGroup->addElement($element);
		}

		return $displayGroup;
	}
}
