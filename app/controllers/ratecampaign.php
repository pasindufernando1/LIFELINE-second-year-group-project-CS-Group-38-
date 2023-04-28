<?php
session_start();

class Ratecampaign extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
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

    public function feedback_page()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['all_feedback'] = $this->model->allFeedback(
                    $_SESSION['user_ID']
                );
                $_SESSION['camp_names'] = $this->model->getAllCampNames(
                    $_SESSION['all_feedback']
                );
                $_SESSION['camp_ads_feedback'] = $this->model->getAllCampAds(
                    $_SESSION['all_feedback']
                );
                $this->view->render('donor/feedback');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }

    }

    public function addrating()
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

    public function send_rating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //     var_dump($_POST);
                // }

                $rating = $_POST['rating'];
                $feedback = $_POST['fb'];
                $inputs = [$feedback, $rating];
                if (
                    $this->model->save_rating($inputs, $_SESSION['selected_campid'], $_SESSION['user_ID'])
                ) {
                    $_SESSION['operation'] = 'sent';
                    $this->view->render('donor/campaign_feedback_successful');
                    exit();
                } else {
                    $this->view->render('donor/campaign_feedback');
                    exit();
                }

            } else {
                $this->view->render('authentication/donorlogin');
            }
        }

    }

    public function viewrating()
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
    public function editrating()
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
                // print_r($_SESSION['selected_camprating']);
                // die();
                $this->view->render('donor/campaign_feedback_edit');
                exit();
            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }

    public function update_rating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if (!isset($_POST['rating'])) {
                    $rating = $_SESSION['selected_camprating']['Rating'];
                } else {
                    $rating = $_POST['rating'];
                }
                $feedback = $_POST['fb'];
                $inputs = [$feedback, $rating];
                if (
                    $this->model->save_rating($inputs, $_SESSION['selected_campid'], $_SESSION['user_ID'])
                ) {
                    $_SESSION['operation'] = 'updated';
                    $this->view->render('donor/campaign_feedback_successful');
                    exit();
                } else {
                    $this->view->render('donor/campaign_feedback');
                    exit();
                }


            } else {
                $this->view->render('authentication/donorlogin');
            }
        }
    }

    public function feedback_success()
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

    public function remove_rating()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $campid = $_GET['camp'];

                // if (
                $this->model->removerating($campid, $_SESSION['user_ID']);
                $_SESSION['operation'] = 'removed';
                $this->view->render('donor/campaign_feedback_successful');
                exit();

            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

}