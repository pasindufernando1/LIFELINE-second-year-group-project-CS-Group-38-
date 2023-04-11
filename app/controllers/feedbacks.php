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
            //To check whether a filter is applied
            if(isset($_GET['filter'])){
                $is_filtered = $_GET['filter'];
            }
            if ($_SESSION['type'] == "Admin") {
                if(!isset($_POST['filter']) && !$is_filtered){
                    $_SESSION['is_filtered'] = false;
                    $_SESSION['feedbacks'] = $this->model->getAllFeedbacks();
                    $this->view->render('admin/feedbacks');
                    exit;
                }
                if(isset($_POST['filter'])){
                    if(isset($_POST['all_type'])){
                        $_SESSION['is_filtered'] = true;
                        $_SESSION['feedbacks'] = $this->model->getAllFeedbacks();
                        $this->view->render('admin/feedbacks');
                        exit;
                    }
                    $output = array();
                    $_SESSION['is_filtered'] = true;
                    // If all the month and year is selected
                    if(isset($_POST['month']) && isset($_POST['year'])){
                        $rows = $this->model->getFilteredFeedbacksDate($_POST['month'],$_POST['year']);
                        $output = array_merge($output,$rows);
                    }
                    // If only a month is selected
                    if(isset($_POST['month']) && empty($_POST['year'])){
                        $rows = $this->model->getFilteredFeedbacksMonth($_POST['month']);
                        $output = array_merge($output,$rows);
                    }
                    // If only a year is selected
                    if(isset($_POST['year']) && empty($_POST['month'])){
                        $rows = $this->model->getFilteredFeedbacksYear($_POST['year']);
                        $output = array_merge($output,$rows);
                    }
                    $_SESSION['feedbacks'] = $output;
                }
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
