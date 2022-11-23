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
                $_SESSION['packets'] = $this->model->getAllPackets();
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
                $maxpacketid = $this->model->getMaxPacketId();
                $_SESSION['MaxPacketID'] = $maxpacketid;
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
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->view->render('systemuser/reservation_type');
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

    function add_type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->model->getCountTypeId();
                $this->view->render('systemuser/reservation_add_type');
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
            $type_id = $this->model->getTypeIDFromName($blood_group);
            $quantity = $_POST['quantity'];
            $status = 1;

            $inputs = array($quantity, $type_id,  $status);

            if ($this->model->addReserve($inputs)){
                header("Location: /reservation/add_reservation_successful");
                
            }
            
        }
    }
    function edit_reservation_id($reserve_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $_SESSION['reserve_id'] = $reserve_id;
                $this->view->render('systemuser/reservation_edit');
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
    function edit_reserve($reserve_id)
    {

        if ($_SESSION['type'] == "systemuser") {
            if (!isset($_POST['update-reservation'])) {
                header("Location: /reservation?page=1");
                exit;
            }
            
            $blood_group = $_POST['blood_group'];
            $type_id = $this->model->getTypeIDFromName($blood_group);
            $quantity = $_POST['quantity'];
            $status = 1;

            $inputs = array($quantity, $type_id,  $status);

            if ($this->model->editReserve($reserve_id,$inputs)){
                header("Location: /reservation/add_reservation_successful");
                
            }
            
        }
        
    }


    function add_reserve_type()
    {
        if ($_SESSION['type'] == "systemuser") {
            if (!isset($_POST['add-reservation-type'])) {
                header("Location: /reservation/add_type");
                exit;
            }
            
            $blood_group = $_POST['blood_group'];
            $storing_constraints = $_POST['Storing_Constraints'];
            $expiry_constraints = $_POST['expiry_constraints'];

            $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

            if ($this->model->addReserveTypes($inputs)){
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
<<<<<<< Updated upstream
=======
    function delete_types($type_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $this->model->deleteReserveTypes($type_id);
                header("Location: /reservation/type?page=1");
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
    function edit_type_id($type_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "systemuser") {
                $_SESSION['type_id'] = $type_id;
                $this->view->render('systemuser/reservation_edit_type');
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

    function edit_types($type_id)
    {

        if ($_SESSION['type'] == "systemuser") {
            if (!isset($_POST['update-blood-type'])) {
                header("Location: /reservation/type?page=1");
                exit;
            }
            
            $blood_group = $_POST['blood_group'];
            $storing_constraints = $_POST['Storing_Constraints'];
            $expiry_constraints = $_POST['expiry_constraints'];

            $inputs = array($blood_group, $storing_constraints, $expiry_constraints);

            if ($this->model->editReserveTypes($type_id,$inputs)){
                header("Location: /reservation/add_reservation_successful");
                
            }
            
        }
        
    }
>>>>>>> Stashed changes
}