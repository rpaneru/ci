<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller 
{    
    public function listServices()
    {
        $this->load->helper('profiletypes_helper');
        
        $this->page = "listServices";
        $this->adminLayout();
    }
}
