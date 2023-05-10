<?php
session_start();

class Error404 extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('404');
    }
}