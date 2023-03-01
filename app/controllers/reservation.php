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
            if ($_SESSION['type'] == "System User") {
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
               
                $_SESSION['count'] = $this->model-> getfullcount($blood_bank_id);
                $_SESSION['bloodtypes'] = $this->model->getAllTypes($blood_bank_id);
                 $_SESSION['packets'] = $this->model->getAllPackets($blood_bank_id);

                $this->view->render('systemuser/reservation');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "System User") {
                $maxpacketid = $this->model->getMaxPacketId();
                $_SESSION['MaxPacketID'] = $maxpacketid;
                $this->view->render('systemuser/reservation_add');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "System User") {
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['bloodtypes'] = $this->model->getAllNullQuantity($blood_bank_id);
                
                $this->view->render('systemuser/reservation_type');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "System User") {
                $maxtypeid = $this->model->getMaxTypeId();
                $_SESSION['MaxTypeID'] = $maxtypeid;
                $this->view->render('systemuser/reservation_add_type');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-reservation'])) {
                header("Location: /reservation/add");
                exit;
            }
            $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
            
            $blood_group = $_POST['blood_group'];
            $type_id = $this->model->getTypeIDFromName($blood_group);
            $quantity = $_POST['quantity'];
            $status = 1;

            $inputs = array($quantity, $type_id,  $status, $blood_bank_id);

            if ($this->model->addReserve($inputs)){
                header("Location: /reservation/add_reservation_successful");
                
            }
            
        }
    }
    function edit_reservation_id($reserve_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $_SESSION['reserve_id'] = $reserve_id;
                $this->view->render('systemuser/reservation_edit');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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

        if ($_SESSION['type'] == "System User") {
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
        if ($_SESSION['type'] == "System User") {
            if (!isset($_POST['add-reservation-type'])) {
                header("Location: /reservation/add_type");
                exit;
            }
            $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);

            $blood_group = $_POST['blood_group'];
            $storing_constraints = $_POST['Storing_Constraints'];
            $expiry_constraints = $_POST['expiry_constraints'];

            $inputs = array($blood_group, $storing_constraints, $expiry_constraints, $blood_bank_id);

            if ($this->model->addReserveTypes($inputs)){
                header("Location: /reservation/add_reservation_successful");
                
            }
            
        }
    }

    function add_reservation_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->view->render('systemuser/reservation_add_successful');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
    function delete_types($type_id)
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $this->model->deleteReserveTypes($type_id);
                header("Location: /reservation/type?page=1");
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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

    function delete($type_id)
    {
        
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                
                $this->model->deleteReserve($type_id);
                header("Location: /reservation?page=1");
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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
            if ($_SESSION['type'] == "System User") {
                $_SESSION['type_id'] = $type_id;
                $this->view->render('systemuser/reservation_edit_type');
                exit;
            } else if ($_SESSION['type'] == "Admin") {
                $this->view->render('layout/reservation');
                exit;
            } else if ($_SESSION['type'] == "Donor") {
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

        if ($_SESSION['type'] == "System User") {
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

    function expired_stocks()
    {
<<<<<<< Updated upstream
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $_SESSION['bloodtypes'] = $this->model->getAllTypes($blood_bank_id);
=======
        
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "System User") {
                $blood_bank_id = $this ->model -> getBloodBankid($_SESSION['useremail']);
                $date = date("Y-m-d");
                $packets =$this ->model -> getAllPacks($blood_bank_id);
                $countp = count($packets) -1;

                for ($i=0; $i < $countp; $i++)
                {
                    $diff = strtotime($date) - strtotime($packets[$i]['Date']);
                    $constraint = $packets[$i]['Expiry_constraint']*86400;
            
                    if($diff - $constraint > 0)
                    {
                        //print_r($diff - $packets[$i]['Expiry_constraint']*86400 . $packets[$i]['PacketID']);    
                        $status = $this ->model -> changeStatus($packets[$i]['PacketID']);
                    }
                    
                    

                     
                }
                $exp_packs_count =$this ->model -> getAllExpiredPacksCount($blood_bank_id);
                $exp_packs =$this ->model -> getAllExpiredPacks($blood_bank_id);
                $_SESSION['exp_packs'] = $exp_packs;
                $_SESSION['exp_packs_count'] = $exp_packs_count;
                
                
                if(isset($_POST['filter'])){
                    
                    $output = array();
                    for ($i=0; $i < 8 ; $i++) { 
                        if(isset($_POST[$i])){
                            if(!isset($_POST[10]) && !isset($_POST[11]) && !isset($_POST[12]) && !isset($_POST[13])){
                                $rows = $this->model->getfiltertype($_POST[$i],$blood_bank_id);
                                $output = array_merge($output,$rows);
                            }
                            else{
                                if(isset($_POST[10])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[10]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[11])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[11]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[12])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[12]);
                                    $output = array_merge($output,$rows);
                                }
                                if(isset($_POST[13])){
                                    $rows = $this->model->getfiltertypes($_POST[$i],$blood_bank_id,$_POST[13]);
                                    $output = array_merge($output,$rows);
                                }
                            }
                            
                        }
                    }
                
                    $_SESSION['exp_packs'] = $output;
                    
                    
                    
                }
               

                
                
>>>>>>> Stashed changes
                $this->view->render('systemuser/reservation_expired');
                exit;
            } 
        }
        else{
            $this->view->render('authentication/login');
            
        }
            
        
    }
<<<<<<< Updated upstream
=======

    function downloadcsv()
    {
        $header_args = array('Blood Group','Blood Sub-Group','Received Date','Expired Date');
        $cur_date = date('Y-m-d');
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=expired_stocks '.$cur_date.'.csv');
        $output = fopen( 'php://output', 'w' );
        ob_end_clean();
        fputcsv($output, $header_args);
        $count = count($_SESSION['exp_packs']);
        foreach ($_SESSION['exp_packs'] as $data) {
            $rec = strtotime($data["Date"]);
            $diff = $data['Expiry_constraint']*86400;
            $total = $rec + $diff;
            $ex_date = date('Y-m-d', $total);

            $row = array($data['Name'],$data['Subtype'],$data['Date'],$ex_date);
            fputcsv($output, $row);
        }
        exit;
    }

    function update_quantity($packID)
    {
        if (isset($_SESSION['login'])) {
    
            $RBC = 'RBC';
            $WBC = 'WBC';
            $Platelet = 'Platelet';
            $Plasma = 'Plasma';
            $res1 =$this ->model -> updateQuantity($packID,$RBC,$_POST['RBC']);
            $res2 =$this ->model -> updateQuantity($packID,$WBC,$_POST['WBC']);
            $res3 =$this ->model -> updateQuantity($packID,$Platelet,$_POST['Platelet']);
            $res4 =$this ->model -> updateQuantity($packID,$Plasma,$_POST['Plasma']);

            if($res1 && $res2 && $res3 && $res4)
            {
                header("Location: /reservation/type?page=1");
            }

        }
        else{
            $this->view->render('authentication/login');
            
        }
    }
>>>>>>> Stashed changes
}