<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller 
{
    public function index()
    {
        $this->load->helper('captcha');
        
        $cap = create_captcha($vals);

        $data = array('cap'=>$cap);
        
        $this->page = "welcome";
        $this->guestLayout($data);
    }
}
