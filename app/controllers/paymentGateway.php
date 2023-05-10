<?php
require '../vendor/payment_config.php';
session_start();

class PaymentGateway extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {

                $_SESSION['donating_amount'] = $_POST['amount']*100;
                $this->view->render('organization/paymentDetails');
                
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    public function edit_amount()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == 'Organization/Society') {
                $this->view->render('organization/donateToday');
    
            }
        } else {
            $this->view->render('authentication/login');
        }
    }

    public function submit(){
        if(isset($_SESSION['login'])){
            if($_SESSION['type'] == 'Organization/Society'){
                if(isset($_POST['stripeToken'])){
	                \Stripe\Stripe::setVerifySslCerts(false);
                    try {
                        $token=$_POST['stripeToken'];

	                    $data=\Stripe\Charge::create(array(
		                "amount"=> $_SESSION['donating_amount'],
		                "currency"=>"lkr",
		                "description"=>"Cash Donation",
		            "source"=>$token,));

                    header('Location: /requestApproval/donatesuccess');
                    exit();

                    } catch(\Stripe\Exception\CardException $e) {
                        $_SESSION['PaymentError'] = $e->getError()->message;
                        $this->view->render('organization/paymentError');
                        unset($_SESSION['donating_amount']);

                    } catch (\Stripe\Exception\InvalidRequestException $e) {
                        $_SESSION['PaymentError'] = $e->getError()->message;
                        $this->view->render('organization/paymentError');
                        unset($_SESSION['donating_amount']);

                    } catch (Exception $e) {
                        $_SESSION['PaymentError'] = $e->getError()->message;
                        $this->view->render('organization/paymentError');
                        unset($_SESSION['donating_amount']);

                    }

                }
                
            }
        }
        else{
            $this->view->render('authentication/login');
        }
    }

}