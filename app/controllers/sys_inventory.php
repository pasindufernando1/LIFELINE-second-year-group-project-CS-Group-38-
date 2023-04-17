<?php
session_start();

class Sys_inventory extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/inventory/inventory');
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
                $this->view->render('systemuser/inventory/inventory_add');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

    function request()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/inventory/inventory_request');
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
                $this->view->render('systemuser/inventory/inventory_view');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
}