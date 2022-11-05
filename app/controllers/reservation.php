<?php
session_start();

class Reservation extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->view->render('systemuser/reservation');
                exit;
            } else if ($_SESSION['type'] == "admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "donor") {
                $this->view->render('systemuser/reservation');
                exit;
            } else {
                $this->view->render('layout/reservation');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }
        
        function add()
        {
            if (isset($_SESSION['login'])) {
                if ($_SESSION['type'] == "systemuser") {
                    $this->model->getCountReservationId();
                    $this->view->render('systemuser/reservation_add');
                    exit;
                } else if ($_SESSION['type'] == "admin") {
                    $this->view->render('layout/reservation');
                    exit;
                } else if ($_SESSION['type'] == "donor") {
                    $this->view->render('systemuser/reservation');
                    exit;
                } else {
                    $this->view->render('layout/reservation');
                    exit;
                }
            }
            else{
                $this->view->render('authentication/login');
                
            }
                
            
        }
        function add_reserve()
        {
            if ($_SESSION['type'] == "systemuser") {
                if (!isset($_POST['add-reservation'])) {
                    header("Location: /reservation/add");
                    exit;
                }
                
                $blood_group = $_POST['blood_group'];
                $quantity = $_POST['quantity'];
                $expiry_constraints = $_POST['expiry_constraints'];

                $inputs = array($blood_group, $quantity, $expiry_constraints);

                if ($this->model->addReserve($inputs)){
                    header("Location: /reservation/add_reservation_successful");
                    
                }
                
            }
        }
        function add_reservation_successful()
        {
            if (isset($_SESSION['login'])) {
                if ($_SESSION['type'] == "systemuser") {
                    $this->view->render('systemuser/reservation_add_successful');
                    exit;
                } else if ($_SESSION['type'] == "admin") {
                    $this->view->render('layout/reservation');
                    exit;
                } else if ($_SESSION['type'] == "donor") {
                    $this->view->render('systemuser/reservation');
                    exit;
                } else {
                    $this->view->render('layout/reservation');
                    exit;
                }
            }
            else{
                $this->view->render('authentication/login');
            }
        }
    }