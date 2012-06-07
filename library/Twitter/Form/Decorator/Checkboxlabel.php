<?php

/**
 * ZF Bootstrap Checkboxlabel Decorator
 *
 * This is designed as an easy drop-in replacement for the normal Zend Forms to work together with Twitter Bootstrap.
 *
 * @copyright Sebastian Hoitz
 * @package Twitter_Form
 */
class Twitter_Form_Decorator_Checkboxlabel extends Zend_Form_Decorator_HtmlTag
{
    /**
     * Render Checkboxlabel Decorator
     *
     * @param string $content element
     *
     * @return string checkbox label
     */
    public function render($content)
    {
        $element = $this->getElement();
        $separator = $this->getSeparator();

        return $content . $separator . $element->getLabel();
    }
}
