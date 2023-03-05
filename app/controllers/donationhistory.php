<?php
session_start();

class Donationhistory extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get Number of donations at campaigns
                $no_of_camp_donations = $this->model->getNoOfCampDonations(
                    $_SESSION['user_ID']
                );
                $no_of_bank_donations = $this->model->getNoOfBankDonations(
                    $_SESSION['user_ID']
                );
<<<<<<< Updated upstream
                $this->view->render('donor/donation_history');
=======

                $_SESSION['no_of_camp_donations'] = json_encode($no_of_camp_donations);
                $_SESSION['no_of_bank_donations'] = json_encode($no_of_bank_donations);
                $this->view->render('donor/donation_history');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    public function atcampaigns()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {

                $_SESSION['camp_donation_number'] = $this->model->getNoOfCampDonations(
                    $_SESSION['user_ID']
                );

                $_SESSION['camp_donations'] = $this->model->getCampDonations(
                    $_SESSION['user_ID']
                );

                $_SESSION['camp_names'] = $this->model->getCampNames(
                    $_SESSION['camp_donations']
                );
                //Amount this dodnor donated at each cmapaign
                $_SESSION['camp_donation_amounts'] = $this->model->getCampDonationAmounts(
                    $_SESSION['camp_donations']
                );

                //Donor's Complications - This is taken to variable camp_donations
                $_SESSION['complications'] = $this->model->getComplications(
                    $_SESSION['camp_donations']
                );
                //Names of the campaigns donor had complications
                $_SESSION['complication_camps'] = $this->model->getComplicationCamps(
                    $_SESSION['camp_donations']
                );
                //Total donation amout at the campaigns donor attended
                $_SESSION['total_donations_campaign'] = $this->model->getTotalDonationsCampaign(
                    $_SESSION['camp_donations']
                );
                //Donor's All donations amount at camps
                $_SESSION['all_donations_camps'] = $this->model->getAllDonationsCamps(
                    $_SESSION['camp_donations']
                );

                $_SESSION['org_names'] = $this->model->getOrgNames(
                    $_SESSION['camp_donations']
                );
                $_SESSION['camp_locations'] = $this->model->getCampLocations(
                    $_SESSION['camp_donations']
                );
                $_SESSION['advetisements'] = $this->model->getAdvertisements(
                    $_SESSION['camp_donations']
                );
                $this->view->render('donor/donation_history_camp');
>>>>>>> Stashed changes
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    public function atbloodbanks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //Get the banks donor donated at
                $_SESSION['banks'] = $this->model->getBanks($_SESSION['user_ID']);
                //Get the latest donation at each bank - date and packet id
                $_SESSION['latest_bank_donation_dates'] = $this->model->getLatestBankDonationDates($_SESSION['banks']);
                //Get the latest donation amount at each bank
                $_SESSION['latest_bank_donation_amounts'] = $this->model->getLatestBankDonationAmounts($_SESSION['banks']);
                //Get the NAME each bank
                $_SESSION['bank_names'] = $this->model->getBankNames($_SESSION['banks']);

                $_SESSION['bank_pics'] = $this->model->getBankPics($_SESSION['banks']);

                $_SESSION['past_bank_donations'] = $this->model->getPastBankDonationDates($_SESSION['banks']);

                $_SESSION['past_bank_donation_amounts'] = $this->model->getPastBankDonationAmounts($_SESSION['banks']);

                // $_SESSION['bank_donation_amounts'] = $this->model->getBankDonationAmounts($_SESSION['banks']);

                $_SESSION['total_bank_donation_amount'] = $this->model->getTotalBankDonationAmount($_SESSION['user_ID']);

                $_SESSION['no_of_bank_donations'] = $this->model->getNoOfBankDonations($_SESSION['user_ID']);

                // $_SESSION['bank_donation_dates'] = $this->model->getBankDonationDates($_SESSION['banks']);

                $_SESSION['bank_donation_total_amounts'] = $this->model->getBankDonationTotalAmounts($_SESSION['banks'], $_SESSION['user_ID']);

                // $_SESSION['total_donations_bank'] = $this->model->getTotalDonationsBank($_SESSION['bank_donations']);

                $this->view->render('donor/donation_history_bank');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

}
