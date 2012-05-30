<?php

/**
 * ZF Bootstrap Forms Error Decorator
 *
 * This is designed as an easy drop-in replacement for the normal Zend Forms to work together with Twitter Bootstrap.
 *
 * @copyright Sebastian Hoitz
 * @package Twitter_Form
 */
class Twitter_Form_Decorator_Errors extends Zend_Form_Decorator_Errors
{
    /**
     * Render the error decorator
     *
     * @param string $content form content
     *
     * @return string html decorator output
     */
    public function render($content)
    {
        $element = $this->getElement();
        $view = $element->getView();

        if (NULL === $view) {
            return $content;
        }

        $errors = $element->getMessages();
        if (empty($errors)) {
            return $content;
        }

        $element->setAttrib("class", trim("error " . $element->getAttrib("class")));

        $wrapper = $element->getDecorator("outerwrapper");
        if ($wrapper) {
            $wrapper->setOption("class", trim("error " . $wrapper->getOption("class")));
        }

        $separator = $this->getSeparator();
        $placement = $this->getPlacement();
        $errorHtml = "";
        foreach ($errors as $currentError) {
            $errorHtml .= '<span class="help-block">' . $currentError . '</span>';
        }

        switch ($placement) {
            case self::APPEND:
                return $content . $separator . $errorHtml;
            case self::PREPEND:
                return $errorHtml . $separator . $content;
        }
    }
}
