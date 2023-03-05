<?php
session_start();

class Badges extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            
            $_SESSION['newest_badge'] = $this->model->getnewestbadge($_SESSION['user_ID']);

            $_SESSION['badges'] = $this->model->getbadges($_SESSION['newest_badge']);

            $_SESSION['yet_badges'] = $this->model->getyetbadges($_SESSION['newest_badge']);

            $_SESSION['badge_info'] = $this->model->getbadgeinfo();

            $this->view->render('donor/badges_view');
            exit();

    }
}

}