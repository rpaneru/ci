<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    public function dashboard()
    {
        $this->page = "dashboard";
        $this->adminLayout();
    }
}
