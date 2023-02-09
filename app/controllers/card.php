<?php
session_start();

class Card extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/card');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}