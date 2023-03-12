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

    


    
}