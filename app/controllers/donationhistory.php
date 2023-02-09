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
                $_SESSION['camp_names'] = $this->model->getCampNames(
                    $_SESSION['camp_donations']
                );
                $_SESSION['bank_names'] = $this->model->getBankNames(
                    $_SESSION['bank_donations']
                );
                $_SESSION[
                    'camp_donation_amounts'
                ] = $this->model->getCampDonationAmounts(
                    $_SESSION['camp_donations']
                );
                $_SESSION[
                    'bank_donation_amounts'
                ] = $this->model->getBankDonationAmounts(
                    $_SESSION['bank_donations']
                );
                $_SESSION[
                    'total_donations_campaign'
                ] = $this->model->getTotalDonationsCampaign(
                    $_SESSION['camp_donations']
                );
                $_SESSION[
                    'total_donations_bank'
                ] = $this->model->getTotalDonationsBank(
                    $_SESSION['bank_donations']
                );
                $_SESSION['org_names'] = $this->model->getOrgNames(
                    $_SESSION['camp_donations']
                );
                $_SESSION['camp_locations'] = $this->model->getCampLocations(
                    $_SESSION['camp_donations']
                );
                $this->view->render('donor/donation_history');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
}
