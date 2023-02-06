<?php
session_start();

class Sys_donors extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donors/donor');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    
    function add_donor()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donors/donor_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donors/donation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function add_donation()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donors/donation_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    

    

}