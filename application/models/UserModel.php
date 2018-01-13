<?php
class UserModel extends MY_Model 
{
    function getUserData($paramArray) 
    {
        $this->db->select("*");
        $this->db->from("users");
        
        if($paramArray['email'] != null && $paramArray['email'] != '')
        {
            $this->db->where("email", $paramArray['email']);
        }
        
        if($paramArray['mobile'] != null && $paramArray['mobile'] != '')
        {
            $this->db->where("mobile", $paramArray['mobile']);
        }
        
        //echo $this->db->get_compiled_select();
        
        return $this->db->get()->row();
    }
}