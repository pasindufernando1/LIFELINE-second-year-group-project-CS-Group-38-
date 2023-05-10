<?php
session_start();

class Ratecampaign extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the donor's feedback to the past campaigns
                $_SESSION['all_feedback'] = $this->model->allFeedback(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/campaign_feedback');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function addrating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the campaign id to retrieve data from the database
                $_SESSION['selected_campid'] = $_GET['camp'];
                $campid = $_GET['camp'];
                $_SESSION['selected_campname'] = $this->model->getcampname(
                    $campid
                );
                $this->view->render('donor/campaign_feedback');
                exit();
            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }
    function viewrating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the campaign id to retrieve data from the database
                $_SESSION['selected_campid'] = $_GET['camp'];
                $campid = $_GET['camp'];
                $_SESSION['selected_campname'] = $this->model->getcampname(
                    $campid
                );
                $_SESSION['selected_camprating'] = $this->model->getcamprating(
                    $campid,
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/campaign_feedback_view');
                exit();
            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }
    function editrating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['selected_campid'] = $_GET['camp'];
                $_SESSION['selected_campname'] = $this->model->getcampname(
                    $_SESSION['selected_campid']
                );
                $_SESSION['selected_camprating'] = $this->model->getcamprating(
                    $_SESSION['selected_campid'],
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/campaign_feedback');
                exit();
            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }
    function deleterating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the campaign id to retrieve data from the database
                $_SESSION['selected_campid'] = $_GET['camp'];
                $campid = $_GET['camp'];
                $_SESSION['selected_campname'] = $this->model->getcampname(
                    $campid
                );
                $_SESSION['selected_camprating'] = $this->model->getcamprating(
                    $campid,
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/campaign_feedback_view');
                exit();
            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }

    function feedback_success()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/campaign_feedback_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function feedback_page()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['all_feedback'] = $this->model->allFeedback(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/feedback');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }
}
