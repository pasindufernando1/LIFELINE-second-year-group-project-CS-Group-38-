<?php
session_start();

class Feedbacks extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    

    
    function type()
    {
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                $_SESSION['feedbacks'] = $this->model->getAllFeedbacks();
                //print_r($_SESSION['feedbacks']);die();
                $this->view->render('admin/feedbacks');
                exit;
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    } 

    function markread($feedbackid){
        if (isset($_SESSION['login'])) {
            if ($_SESSION['type'] == "Admin") {
                if($this->model->markread($feedbackid)){
                    $this->view->render('admin/feedback_review_completed');
                    exit;
                }
            }
        }
        else{
            $this->view->render('authentication/login');
            
        }    
    }
    
}
