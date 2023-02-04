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

    

    function category()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_category');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function blood_availability()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_blood');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function blood_inventory()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_inventory');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function donors()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_donors');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reports/reports_campaign');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

}