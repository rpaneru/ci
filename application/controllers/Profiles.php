<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends MY_Controller 
{    
    public function listProfiles()
    {                
        $this->page = "listProfiles";
        $this->adminLayout();
    }
}
