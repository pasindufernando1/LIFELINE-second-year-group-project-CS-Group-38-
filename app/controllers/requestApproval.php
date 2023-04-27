<?php
session_start();

class requestApproval extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                //$_SESSION['UserID'] = $this->model->getUserID($_SESSION['email']);
                $this->view->render('organizations/requestApproval');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewDetails()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('organization/viewBloodBanks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function chooseHere()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/chooseHere');
            exit();
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_Request()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/requestApproval');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function addRequest()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            if (!isset($_POST['request'])) {
                header('Location: /requestBlood/addbank');
                exit();
            }

            $campName = $_POST['campName'];
            $date = $_POST['date'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $number = $_POST['number'];
            $lane = $_POST['lane'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $province = $_POST['province'];
            $beds = $_POST['beds'];
            $donors = $_POST['donors'];
            $BloodBankID = $_SESSION['bloodbankID'];
            $orgID = $_SESSION['User_ID'];
            $advertisementID = 'NULL';
            $Status = 'Pending';

            //$BloodBankID=$_POST['bloodbank'];

            $inputs = [
                $BloodBankID,
                $campName,
                $number,
                $lane,
                $city,
                $district,
                $province,
                $beds,
                $date,
                $startTime,
                $endTime,
                $donors,
                $advertisementID,
                $orgID,
                $Status,
            ];

            if ($this->model->addApprovalRequest($inputs)) {
                header('Location: /requestApproval/add_request_successful');
            }
        }
    }

    function add_request_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_request_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewCampaigns()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['campaigns'] = $this->model->getCampaigns(
                    $_SESSION['User_ID']
                );
                $this->view->render('organization/viewCampaigns');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function view_feedbacks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $_SESSION['feedbacks'] = $this->model->getfeedbackInfo($campid);
                $this->view->render('organization/viewFeedbacks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function view_Timeslots()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $camp_info = $this->model->get_campaign_info($campid);
                $_SESSION['campaign_array'] = $camp_info;

                $_SESSION['timeslots'] = $this->model->getSlotIDs($campid);
                $_SESSION['slots'] = $this->model->getSlotDetails(
                    $_SESSION['timeslots']
                );

                $this->view->render('organization/viewTimeslots');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewDonorsofTimeslot()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                // $slotid = $_GET['slot'];
                // $_SESSION['donors'] = $this->model->getDonors($slotid);
                $this->view->render('organization/donors_of_Timeslot');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewAcceptedCampaigns()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION[
                    'accepted_campaigns'
                ] = $this->model->getAcceptedCampaigns($_SESSION['User_ID']);
                $this->view->render('organization/viewAcceptedCampaigns');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION[
                    'accepted_campaigns'
                ] = $this->model->getAcceptedCampaigns($_SESSION['User_ID']);
                $this->view->render('organization/viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function chooseHere_scheduleTime()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/chooseHere_scheduleTime');
            exit();
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function scheduleTimeslots()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/scheduleTimeslots');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function addTimeslot()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            if (!isset($_POST['request'])) {
                header('Location: /requestApproval/scheduleTimeslots');
                exit();
            }

            header('Location: /requestApproval/add_timeslot_successful');

            //$BloodBankID=$_POST['bloodbank'];
        }
    }

    function add_timeslot_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_timeslot_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewTimeslots()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $campid = $_GET['campaign'];
                $camp_info = $this->model->get_campaign_info($campid);

                $_SESSION['campaign_array'] = $camp_info;
                $_SESSION['timeslots'] = $this->model->getSlotIDs($campid);

                $this->view->render('organization/view_Timeslots');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function getAcceptedCamps()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION[
                    'accepted_campaigns'
                ] = $this->model->getAcceptedCampaigns($_SESSION['User_ID']);
                $this->view->render('organization/notifi_viewAcceptedCamps');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function sendNotifications()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render(
                    'organization/send_notifications_successful'
                );
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewInstructions()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/instructions');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
    function viewBloodbanks()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['bloodBanks'] = $this->model->getAllBloodBanks();
                $this->view->render('organization/inventory_bloodbanks');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_InventoryRequest()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/inventoryItems');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function accommodation()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/accommodation');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function quantity()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/quantity');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function addInvenReq()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_inventory_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function stationaryItems()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/stationaryItems');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function medicalAppliance()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/medicalAppliance');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function viewProfile()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $_SESSION['user_details'] = $this->model->get_telno(
                $_SESSION['User_ID']
            );
            //print_r($_SESSION['user_details'][0][2]);die();
            $_SESSION['Name'] = $_SESSION['user_details'][0][2];
            $_SESSION['Number'] = $_SESSION['user_details'][0][3];
            $_SESSION['LaneName'] = $_SESSION['user_details'][0][4];
            $_SESSION['City'] = $_SESSION['user_details'][0][5];
            $_SESSION['District'] = $_SESSION['user_details'][0][6];
            $_SESSION['Province'] = $_SESSION['user_details'][0][7];
            $_SESSION['Email'] = $_SESSION['user_details'][1][0];
            $_SESSION['Username'] = $_SESSION['user_details'][1][1];
            $_SESSION['UserType'] = $_SESSION['user_details'][1][2];
            $_SESSION['telno'] = $_SESSION['user_details'][2][0];
            $this->view->render('organization/profile');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function editDetails()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $this->view->render('organization/editProfile');
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function edit_profile()
    {
        if ($_SESSION['type'] == 'Organization/Society') {
            $orgName = $_POST['orgName'];
            $teleNo = $_POST['teleNo'];
            $num = $_POST['num'];
            $laneNme = $_POST['laneNme'];
            $cit = $_POST['cit'];
            $dis = $_POST['dis'];
            $prov = $_POST['prov'];
            $em = $_POST['em'];

            $inputs1 = [$em, $orgName];
            $inputs2 = [$orgName, $num, $laneNme, $cit, $dis, $prov];
            $inputs3 = [$teleNo];

            if (
                $this->model->editProfile(
                    $_SESSION['User_ID'],
                    $inputs1,
                    $inputs2,
                    $inputs3
                )
            ) {
                header('Location: /requestApproval/edit_profile_successful');
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function edit_profile_successful()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/edit_profile_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    //donate begin

    function donateCash()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                // list($_SESSION['cash_ads'],$_SESSION['cash_amounts'])=$this->model->getcashads();
                $_SESSION['cash_ads'] = $this->model->getcashads();
                $_SESSION['cash_adpics'] = $this->model->getcashadpics($_SESSION['cash_ads']);
                $_SESSION['cash_bbs'] = $this->model->getcashbbs($_SESSION['cash_adpics']);
                $_SESSION['cash_received_amounts'] = $this->model->getreceivedcashamounts($_SESSION['cash_ads']);
                $this->view->render('organization/donateAds');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donationPage()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $_SESSION['donationID'] = $_GET['donationID'];
                $this->view->render('organization/donateToday');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donate()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/paymentDetails');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donateNow()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/payment_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function donatesuccess()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $dbconned = $this->model->insertDonation($_SESSION['donationID'], $_SESSION['donating_amount'] / 100);
                unset($_SESSION['donating_amount']);
                $this->view->render('organization/paymentDone');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    //donate end

    function addFeedback()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/feedback');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }

    function add_Feedback()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/add_feedback_successful');
                exit();
            }
        } else {
            $this->view->render('authentication/organizationlogin');
        }
    }
}