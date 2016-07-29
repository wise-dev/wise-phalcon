<?php

namespace Wise\Session\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->response->redirect("session/connexion/index");
    }

}

