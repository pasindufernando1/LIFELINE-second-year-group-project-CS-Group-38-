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
                $_SESSION['donor_info'] = $this->model->getdonorinfo(
                    $_SESSION['user_ID']
                );
                $_SESSION['donor_contact'] = $this->model->getdonorcontact(
                    $_SESSION['user_ID']
                );
                $this->$this->view->render('donor/profile');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}
