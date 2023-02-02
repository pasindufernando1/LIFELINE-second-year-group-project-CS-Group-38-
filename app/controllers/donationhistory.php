<?php
session_start();

class Donationhistory extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['camp_donations'] = $this->model->getCampDonations(
                    $_SESSION['user_ID']
                );
                $_SESSION['bank_donations'] = $this->model->getBankDonations(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/donation_history');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}
