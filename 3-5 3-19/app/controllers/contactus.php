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
                $this->view->render('donor/contact_info');
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

                //Check whether the user have already donated blood within 8 weeks
                //Or registered to donation campaign held within 8 weeks to the selected campaign
                $okayed = $this->model->iftimeokay(
                    $_SESSION['user_ID'],
                    $_SESSION['selected_campid']
                );
                print_r($okayed);
                die();

                if ($okayed == 1) {
                    $_SESSION['contno'] = $this->model->getcontno(
                        $_SESSION['user_ID']
                    );
                    if (isset($_SESSION['contno'])) {
                        // print_r($_SESSION['user_ID']);
                        // print_r($_SESSION['contno']);
                        // die();
                        $this->view->render('donor/regtocampaign');
                    }
                    exit();
                } else {
                    $this->view->render('donor/donation_history');
                    print_r('cant');
                    die();
                }
            }
        } else {
            $this->view->render('authentication/login');
        }
    }
    function register_to_campaign()
    {
        if ($_SESSION['type'] == 'Donor') {
            if (!isset($_POST['reg-to-campaign'])) {
                // print_r("awa");
                // die();
                header('Location: /getcampaign/index');
                exit();
            }

            //for($i=1;$i<12;$i++){
            //$rdiobtn =strval($i);

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

                    // print_r($user_ID);
                    // die();

                    if (
                        $this->model->putregistraion(
                            $inputs,
                            $contno,
                            $_SESSION['user_ID']
                        )
                    ) {
                        // print_r($inputs);
                        // die();
                        header(
                            'Location: /getcampaign/regtocampaignsuccessful'
                        );
                    } else {
                        print_r($inputs);
                        die();
                    }
                }
            }
            //}
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
}