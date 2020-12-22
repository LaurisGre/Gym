<?php

namespace Core\Views;

use Core\View;

class Button extends View
{
    public function render($template_path = ROOT . '/core/templates/button.tpl.php')
    {
        return parent::render($template_path);
    }
}