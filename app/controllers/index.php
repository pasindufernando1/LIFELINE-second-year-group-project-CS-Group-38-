<?php
session_start();

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $_SESSION['advertsements_home'] = $this->model->getAdvertisements();
        $this->view->render('index');
    }

    function about_us()
    {
        $this->view->render('aboutUs');
    }
    function services()
    {
        $this->view->render('bloodbank');
    }

    function campaigns()
    {
        $this->view->render('campaigns');
    }

    function contact_us()
    {
        $this->view->render('contact');
    }

}
