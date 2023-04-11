<?php

class FeedbacksModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllFeedbacks()
    {
        $data = $this->db->select("*", "organization_feedback" , "INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID Where Read_status = 0");
        return $data;
    }

    public function markread($feedbackid){
        $result = $this->db->update("organization_feedback","Read_status",":Read_status",1,":FeedbackID",$feedbackid,"WHERE FeedbackID = :FeedbackID");
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    // Get the feedbacks for a month and year
    public function getFilteredFeedbacksDate($month,$year)
    {
        // The date format is YYYY-MM-DD comparing the month and year components separately
        $columns = array(":Month",":Year");
        $values = array($month,$year);
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE MONTH(Date) = :Month AND YEAR(Date) = :Year AND Read_status = 0",$columns,$values);
        return $data;
    }

    // Get the feedbacks for a month
    public function getFilteredFeedbacksMonth($month)
    {
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE MONTH(Date) = :Month AND Read_status = 0","Month",$month);
        return $data;
    }

    // Get the feedbacks for a year
    public function getFilteredFeedbacksYear($year)
    {
        $data = $this->db->select("*", "organization_feedback","INNER JOIN organization_society ON organization_feedback.OrganizationUserID = organization_society.UserID WHERE YEAR(Date) = :Year AND Read_status = 0","Year",$year);
        return $data;
    }

    


    
}