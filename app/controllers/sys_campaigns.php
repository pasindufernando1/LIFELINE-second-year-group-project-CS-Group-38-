<?php
session_start();

class Sys_campaigns extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/campaigns/campaigns');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    

    function view()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/campaigns/campaigns_view');
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