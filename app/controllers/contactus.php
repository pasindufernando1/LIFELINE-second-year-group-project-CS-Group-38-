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
                $_SESSION['bbs'] = $this->view->bb = $this->model->getbb();
                $this->view->render('donor/contact_us');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function getcontact()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $bbid = $_GET['bbid'];
                $_SESSION['bb_info'] = $this->model->getbankinfo($bbid);

                $_SESSION['b_reserves_ap'] = $this->model->getbloodbankreserves($bbid, 'A+');
                $_SESSION['b_reserves_an'] = $this->model->getbloodbankreserves($bbid, 'A-');
                $_SESSION['b_reserves_bp'] = $this->model->getbloodbankreserves($bbid, 'B+');
                $_SESSION['b_reserves_bn'] = $this->model->getbloodbankreserves($bbid, 'B-');
                $_SESSION['b_reserves_op'] = $this->model->getbloodbankreserves($bbid, 'O+');
                $_SESSION['b_reserves_on'] = $this->model->getbloodbankreserves($bbid, 'O-');
                $_SESSION['b_reserves_abp'] = $this->model->getbloodbankreserves($bbid, 'AB+');
                $_SESSION['b_reserves_abn'] = $this->model->getbloodbankreserves($bbid, 'AB-');

                $_SESSION['bb_contact'] = $this->model->getbloodbankcontact($bbid);
                $this->view->render('donor/contact_info');
            }
        } else {
            $this->view->render('authentication/login');
        }
    }


}