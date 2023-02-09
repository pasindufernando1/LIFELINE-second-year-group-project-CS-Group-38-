<?php
session_start();

class Services extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('services');
    }
}
