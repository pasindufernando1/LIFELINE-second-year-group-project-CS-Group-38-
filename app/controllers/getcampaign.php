<?php
session_start();

class Getcampaign extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the current date
                $_SESSION['today'] = date('Y-m-d H:i:s');

                //get the donor's registrations to the future campaigns
                $_SESSION['registrations'] = $this->model->campregistraions(
                    $_SESSION['user_ID'],
                    $_SESSION['today']
                );

                //get the upcoming campaigns
                $_SESSION['upcoming_campaigns'] = $this->model->getAllCampaigns(
                    $_SESSION['today']
                );

                $_SESSION['camp_ads'] = $this->model->getCampAds(
                    $_SESSION['upcoming_campaigns']
                );
                
                $this->view->render('donor/getcampaign');
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    function view_campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get the campaign id to retrieve data from the database
                $_SESSION['selected_campid'] = $_GET['camp'];
                $campid = $_GET['camp'];

                //get the campaign information
                $camp_info = $this->model->get_campaign_info($campid);
                $_SESSION['campaign_array'] = $camp_info;

                //get campaign advertisement
                $_SESSION['campaign_ad'] = $this->model->get_campaign_ad(
                    $_SESSION['campaign_array'][8]
                );


                //get organizer from another table
                $_SESSION['org_name'] = $this->model->get_org_name(
                    $_SESSION['campaign_array'][9]
                );
                //set the times to AM PM format
                $stime = substr($_SESSION['campaign_array'][5], 0, 2);
                $etime = substr($_SESSION['campaign_array'][6], 0, 2);
                $stimeval = intval($stime);
                $etimeval = intval($etime);

                if ($etimeval > 12) {
                    $et = $etime - 12;
                    $_SESSION['campaign_array'][6] = strval($et) . ' PM';
                } else {
                    $_SESSION['campaign_array'][6] = strval($etimeval) . ' AM';
                }

                if ($stimeval > 12) {
                    $st = 24 - $stime;
                    $_SESSION['campaign_array'][5] = strval($st) . ' PM';
                } else {
                    $_SESSION['campaign_array'][5] = strval($stimeval) . ' AM';
                }

                //Check if the donor is already registered to the campaign
                $campaign_ID = $_SESSION['selected_campid'];
                $count = $this->model->ifregistered(
                    $_SESSION['user_ID'],
                    $campaign_ID
                );

                if ($count > 0) {
                    //get the campaign registration information
                    $_SESSION['reg_info'] = $this->model->get_campreg_info(
                        $_SESSION['user_ID']
                    );
                    $_SESSION['if_registered'] = 1;
                    
                } else {
                    $_SESSION['if_registered'] = 0;
                }

                

                //If the Donor CAN register to the campaign
                $last_donation = $this->model->getLastDonation(
                    $_SESSION['user_ID']
                );
                
                $registered_camp_dates = $this->model->getCampDates(
                    $_SESSION['user_ID']
                );

                $_SESSION['time_okay'] = true;
                
                //check for eachdate if the difference between that date and the date of this campaign is less than 2 months
                //check if  $registered_camp_dates is not empty
                if (empty($registered_camp_dates)) {
                    $_SESSION['time_okay'] = true;
                }else{
                    $campdate = date_create($_SESSION['campaign_array'][4]);

                foreach ($registered_camp_dates as $dates) {
                    $date2 = date_create($dates);
                    $diff = date_diff($date2, $campdate);
                    $diff = $diff->days;
                    // print_r($diff);
                    // print_r('haha');
                    if($diff < 0 ){
                        $diff = $diff * -1;
                        // $_SESSION['if_registered'] = 2;
                    }

                    if ($diff < 56) {
                        $_SESSION['time_okay'] = 0;
                        // break;
                        $this->view->render('donor/viewcampaign');
                        exit();

                    }
                    else{
                        $_SESSION['time_okay'] = 1;
                    }


                }

                }
                
                if ($last_donation != false) {
                    $date1 = date_create($last_donation);
                    // $date2 = date_create($_SESSION['today']);
                    $date_diff = date_diff($campdate, $date1);
                    $date_diff = $date_diff->days;

                    if ($date_diff < 56) {
                        $_SESSION['time_okay'] = 0;
                        $this->view->render('donor/viewcampaign');
                        exit();
                        // print_r('last-donation failed');
                        
                    }
                    else{
                        $_SESSION['time_okay'] = 1;
                        
                    }
                }else{
                    $_SESSION['time_okay'] = 1;
                }

                

                $this->view->render('donor/viewcampaign');
                exit();

            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function reg_to_campaign()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['today'] = date('Y-m-d H:i:s');
                $_SESSION['contno'] = $this->model->getcontno(
                    $_SESSION['user_ID']
                );
                if (isset($_SESSION['contno'])) {
                    $this->view->render('donor/regtocampaign');
                }
                exit();
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
    function register_to_campaign()
    {
        if ($_SESSION['type'] == 'Donor') {
            if (!isset($_POST['reg-to-campaign'])) {
                header('Location: /getcampaign/index');
                exit();
            }

            if (
                $_POST['g1'] == 'on' ||
                $_POST['g2'] == 'on' ||
                $_POST['g3'] == 'on' ||
                $_POST['g4'] == 'on' ||
                $_POST['g5'] == 'on' ||
                $_POST['g6'] == 'on' ||
                $_POST['g7'] == 'on' ||
                $_POST['g8'] == 'on' ||
                $_POST['g9'] == 'on' ||
                $_POST['g10'] == 'on' ||
                $_POST['g11'] == 'on'
            ) {
                header('Location: /getcampaign/regtocampaignunsuccessful');
                exit();
            } else {
                $email = $_SESSION['email'];
                $campaign_ID = $_SESSION['selected_campid'];

                if (
                    $this->model->ifregistered(
                        $_SESSION['user_ID'],
                        $campaign_ID
                    )
                ) {
                    print_r('already registered');
                } else {
                    //get POST data from login page
                    $contno = $_POST['contno'];
                    $emcontno = $_POST['emcontno'];
                    $inputs = [$_SESSION['user_ID'], $campaign_ID, $emcontno];

                    if (
                        $this->model->putregistraion(
                            $inputs,
                            $contno,
                            $_SESSION['user_ID']
                        )
                    ) {
                        header(
                            'Location: /getcampaign/regtocampaignsuccessful'
                        );
                    } else {
                        print_r($inputs);
                        die();
                    }
                }
            }
        }
    }

    function updatereg()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/edit_camp_registration');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function deletereg()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                // print_r($_SESSION['camp_reg_id']);
                // die();
                if (
                    $this->model->deleteregistration(
                        $_SESSION['user_ID'],
                        $_SESSION['selected_campid']
                    )
                ) {
                    header('Location: /getcampaign/index');
                    $this->view->render('donor/getcampaign');
                    exit();
                } else {
                    header('Location: /getcampaign/index');
                    $this->view->render('donor/getcampaign');
                    exit();
                }
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function editreg()
    {
        if ($_SESSION['type'] == 'Donor') {
            if (!isset($_POST['reg-edit'])) {
                // print_r('awa');
                // die();
                header('Location: /getcampaign/index');
                exit();
            }

            $contno = $_POST['contno'];
            $emcontno = $_POST['emcontno'];
            // print_r($contno);
            // die();
            $edited = $this->model->editregistraion(
                $_SESSION['selected_campid'],
                $contno,
                $emcontno,
                $_SESSION['user_ID']
            );
            if ($edited == 'Success') {
                // print_r($inputs);
                // die();
                header(
                    'Location: /getcampaign/view_campaign?camp=' .
                        $_SESSION['selected_campid']
                );
                $_SESSION['reg_info'] = $this->model->get_campreg_info(
                    $_SESSION['user_ID']
                );
                $this->view->render('donor/viewcampaign');
            } else {
                // print_r($inputs);
                // die();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
        // $inputs = [$_SESSION['user_ID'], $campaign_ID, $emcontno];
    }

    function cancel_edit()
    {
        if (isset($_SESSION['login'])) {
            $this->view->render('donor/viewcampaign');
            exit();
        }
    }

    function regtocampaignsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/regtocampaign_success');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }
    function regtocampaignunsuccessful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/regocampaign_unsuccessful');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function get_registration()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $campid = $_SESSION['selected_campid'];
                $this->model->get_reg_info($campid, $_SESSION['user_ID']);
                $this->view->render('donor/regocampaign_unsuccessful');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function view_campaign_reg()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/viewregistration');
                exit();
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function view_timeslot()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $_SESSION['selected_campid']= $_GET['camp'];
                // print_r($_SESSION['selected_campid']);
                $_SESSION['camp_timeslots'] = $this->model->get_timeslots($_SESSION['selected_campid']);
                $_SESSION['timeslot_period'] = $this->model->get_timeslot_period($_SESSION['camp_timeslots']);
                $_SESSION['beds'] = $this->model->get_beds($_SESSION['selected_campid']);
                $_SESSION['reserved_timeslots'] = $this->model->get_reserved_timeslots($_SESSION['selected_campid'],$_SESSION['camp_timeslots']);

                $ifreserved=$this->model->timeslotreserved($_SESSION['selected_campid'],$_SESSION['user_ID']);
                if($ifreserved==false){
                    $this->view->render('donor/view_time_slots');
                    exit();
                }else{
                    $_SESSION['selected_timeslot']=$ifreserved;
                    $timeslot_period=$this->model->get_ts_period($_SESSION['selected_timeslot']);
                    $_SESSION['selected_stime']=$timeslot_period[0];
                    // print_r($_SESSION['selected_stime']);
                    // die();
                    
                    $stime = substr($_SESSION['selected_stime'], 0, 2);
                    $mins = substr($_SESSION['selected_stime'], 3, 2);
                    
                    $stimeval = intval($stime);
                    if ($stimeval >= 12) {
                        $st = 24 - $stime;
                        //appent minutes next to the time
                        if($mins==00){
                            
                        $_SESSION['selected_stime'] = strval($st) . ' PM';}
                        else{
                            $_SESSION['selected_stime'] = strval($st) .':'. $mins.' PM';
                        }
                    } else {
                        if($mins==00)
                        {$_SESSION['selected_stime'] = strval($stimeval) . ' AM';}
                        else{
                            $_SESSION['selected_stime'] = strval($stimeval) .':'. $mins.' AM';
                        }
                        
                    }
                    
                    $_SESSION['selected_etime']=$timeslot_period[1];
                    // print_r($_SESSION['selected_etime']);
                    // die();

                    $etime = substr($_SESSION['selected_etime'], 0, 2);
                    $mins = substr($_SESSION['selected_etime'], 3, 2);

                    $etimeval = intval($etime);
                    if ($etimeval >= 12) {
                        $et = 24 - $etime;
                        //appent minutes next to the time
                        if($mins==00){
                            
                        $_SESSION['selected_etime'] = strval($et) . ' PM';}
                        else{
                            $_SESSION['selected_etime'] = strval($et) .':'. $mins.' PM';
                        }
                    } else {
                        if($mins==00)
                        {$_SESSION['selected_etime'] = strval($etimeval) . ' AM';}
                        else{
                            $_SESSION['selected_etime'] = strval($etimeval) .':'. $mins.' AM';
                        }
                        
                    }
                    


                    $_SESSION['camp_na']=$this->model->get_camp_na($_SESSION['selected_campid']);
                    $_SESSION['donor_name']=$this->model->get_donor_name($_SESSION['user_ID']);
                    $_SESSION['reg_info'] = $this->model->get_campreg_info($_SESSION['user_ID']);
                    $this->view->render('donor/view_reserved_timeslot');
                    exit();
                }
                
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function reserve_timeslot()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                //get timeslot to session variable
                $_SESSION['selected_timeslot'] = $_GET['slotid'];
                $_SESSION['selected_stime'] = $_GET['stime'];
                $_SESSION['selected_etime'] = $_GET['etime'];
                
                $_SESSION['camp_na']=$this->model->get_camp_na($_SESSION['selected_campid']);
                $_SESSION['donor_name']=$this->model->get_donor_name($_SESSION['user_ID']);
                $_SESSION['reg_info'] = $this->model->get_campreg_info($_SESSION['user_ID']);
            
                if($this->model->reserve_timeslot($_SESSION['selected_campid'],$_SESSION['selected_timeslot'],$_SESSION['user_ID'])){
                $this->view->render('donor/view_reserved_timeslot');
                exit();
            }
            }
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function change_timeslot(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                $this->view->render('donor/view_time_slots');
            }
            
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }

    function cancel_timeslot(){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Donor') {
                if($this->model->cancel_reserved_timeslot($_SESSION['selected_campid'],$_SESSION['selected_timeslot'],$_SESSION['user_ID'])){
                $this->view->render('donor/getcampaign');
                exit();
            }
            
        } else {
            $this->view->render('authentication/donorlogin');
        }
    }
}
}