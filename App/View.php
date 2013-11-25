<?php
class App_View
{
    CONST VIEW_DIRECTORY = 'View';
    private $_template = '';
    
    public function __construct($template = '')
    {
        $this->_template = $template;
    }
    
    public function setTemplate($template)
    {
        $this->_template = $template;
    }
    
    public function render($var)
    {
        include self::VIEW_DIRECTORY.'/'.$this->_template;
    }
}