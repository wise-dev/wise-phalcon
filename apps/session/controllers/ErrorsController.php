<?php
namespace Wise\Session\Controllers;

class ErrorsController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Oops');
        parent::initialize();
    }
     public function indexAction()
    {

    }

    public function show404Action()
    {

    }

    public function show401Action()
    {

    }

    public function show500Action()
    {

    }
}
