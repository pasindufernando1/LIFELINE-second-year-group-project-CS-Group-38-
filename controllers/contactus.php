<?php
session_start();

class Contactus extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['bloodbanknames'] = $this->model->getbanknames();
                $this->view->render('donor/contact_us');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function send_bank()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // print_r($_POST['bb']);
                // die();
                $bankid = $_POST['bloodbank'];
                $_SESSION[
                    'bloodbankcontact'
                ] = $this->model->getbloodbankcontact($bankid);
                $_SESSION['selected_bank_info'] = $this->model->getbankinfo(
                    $bankid
                );

                $this->view->render('donor/contact_info');
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}