<?php
session_start();

class campaign extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('campaigns');
    }
}
