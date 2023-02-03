<?php
session_start();

class Donorprofile extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['donor_info'] = $this->model->getdonorinfo(
                    $_SESSION['user_ID']
                );
                $_SESSION['donor_contact'] = $this->model->getdonorcontact(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/profile');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
    function editprofile()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // $_SESSION['']
                $this->view->render('donor/profile_edit');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function updateprofile()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->model->updateprofile();

                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}