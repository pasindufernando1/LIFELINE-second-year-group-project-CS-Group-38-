<?php
session_start();

class Contact extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('contact');
    }
}
