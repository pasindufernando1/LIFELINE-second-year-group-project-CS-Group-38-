<?php
session_start();

class campaign extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //get the current date
        $_SESSION['today'] = date('Y-m-d H:i:s');

        //get the upcoming campaigns
        $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns(
            $_SESSION['today']
        );

        $_SESSION['camp_ads'] = $this->model->getCampAds(
            $_SESSION['upcoming_campaigns']
        );
        $this->view->render('campaigns');
        exit;
    }
}
