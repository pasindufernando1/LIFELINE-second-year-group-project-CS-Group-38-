<?php
session_start();

class Donor_Cards extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donorcards/donorcards');
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
                $this->view->render('systemuser/donorcards/donorcards_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function add()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/donorcards/donorcards_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
}