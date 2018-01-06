<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    public function dashboard()
    {
        $this->load->model("UserModel");
        
        $params = array('userId'=>$this->session->userId);            
        $loggedInUserData = (array)$this->UserModel->getUserData($params);
        
        $this->page = "dashboard";
        $this->adminLayout($loggedInUserData);
    }
}
