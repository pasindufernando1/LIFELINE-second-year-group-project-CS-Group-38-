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

                $_SESSION['user_details'] = $this->model->getUserName($_SESSION['user_ID']);
                $_SESSION['newest_badge']=$this->model->getnewestbadge($_SESSION['user_ID']);
                $_SESSION['age'] = $this->model->getAge($_SESSION['user_ID']);

                $_SESSION['no_of_donations'] = $this->model->getNoOfCampDonations($_SESSION['user_ID']) + $this->model->getNoOfBankDonations($_SESSION['user_ID']);

                $_SESSION['last_donation_date'] = $this->model->getLastDonationDate($_SESSION['user_ID']);

                if ($_SESSION['last_donation_date'] != null) {
                    //calculate eligibility to give blood.If current date is 56 days or more later eligible
                    $last_donation_date = new DateTime($_SESSION['last_donation_date']);
                    $today = new DateTime();
                    $interval = $today->diff($last_donation_date)->days;
                    if ($interval >= 108) {
                        $_SESSION['eligible'] = true;
                    } else {
                        $_SESSION['eligible'] = false;
                    }
                } else {
                    $_SESSION['eligible'] = true;
                }

                //get all donation dates
                $donation_dates = $this->model->getDonationDates($_SESSION['user_ID']);

                //rearrange the array from latest date to oldest date
                $donation_dates = array_reverse($donation_dates);
                //make it session 
                $_SESSION['donation_dates'] = $donation_dates;

                //get all campaign donation dates
                $_SESSION['camp_donation_dates'] = $this->model->getCampDonationDates($_SESSION['user_ID']);
                // donation camp names and addresses
                $_SESSION['camp_donation_details'] = $this->model->getCampDonationDetails($_SESSION['user_ID']);

                //get all blood bank donation dates
                $_SESSION['bank_donation_dates'] = $this->model->getBankDonationDates($_SESSION['user_ID']);

                // donation bank names
                $_SESSION['bank_donation_details'] = $this->model->getBankDonationDetails($_SESSION['user_ID']);


                $this->view->render('donor/card');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}