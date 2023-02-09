<?php
session_start();

class Bloodbank extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    function index()
    {
        
        $this->view->render('bloodbank');
        
        
    }
}