<?php

namespace ZPhal\Modules\Admin\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setTemplateBefore("common");
    }
}

