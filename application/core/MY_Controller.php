<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    protected $loggedInUserData = '';
    protected $menuList = '';    

    public function __construct() 
    {
        parent::__construct();
                
        $profileTypeIdsArray = $this->session->profileTypeId; 
        
        // remve 0 nul and blank profile type id from session
        if( is_array($profileTypeIdsArray) &&  count($profileTypeIdsArray) > 0)
        {
            $i = 0;
            $count = count($profileTypeIdsArray);
            while($i < $count)
            {
                if( 
                    $profileTypeIdsArray[$i] == '' 
                    || $profileTypeIdsArray[$i] == null 
                    || $profileTypeIdsArray[$i] == '0'
                )
                {
                    unset($profileTypeIdsArray[$i]);
                }
                $i++;
            }
        }
        
        $this->session->profileTypeId = $profileTypeIdsArray; 
        

        //set user type guest if not set 
        if( 
            !isset($this->session->profileTypeId) 
            || $this->session->profileTypeId == NULL 
            || $this->session->profileTypeId == ''
            || !is_array ($this->session->profileTypeId)
            || ( is_array ($this->session->profileTypeId) &&  count($this->session->profileTypeId) == 0)

        )
        {
            $this->session->profileTypeId = array('1');            
        }
        
        //list of controllers which are out of auth scope.
        $controllersOutOfAuth = array('welcome','auth');
        
        //controller called in current request
        $controller = strtolower($this->router->class);   

        
        //check if auth is applied for requested controller and user type is guest 
        //than redirect request to welcome page        
        if( !in_array($controller,$controllersOutOfAuth) 
            && count($this->session->profileTypeId) == 1
            && (int)$this->session->profileTypeId[0] == 1
        )
        {
            redirect(base_url(), 'location');
        }
        
        //check if auth is applied for requested controller and user type is not guest 
        //than check user has permission to access for request method or not 
        if( !in_array($controller,$controllersOutOfAuth) )
        {
            if(in_array('2', $this->session->profileTypeId) )
            {
                //means logged in user is admin and admin has access for each and every function
            }
            else
            {
                //function called in current request
                $function =  strtolower($this->router->method); 
                        
                $params = array('profileTypeIdsArray'=>$this->session->profileTypeId);
                
                $this->load->model("AuthModel");
                
                $profileTypeServices = $this->AuthModel->getProfileTypeServices($params);
                
                if(!in_array( strtolower($controller). "/". strtolower($function)  , $profileTypeServices))
                {   
                    redirect(base_url(), 'location');
                }
            }
            
        }
        
        $this->load->model("UserModel");
        
        $params = array('userId'=>$this->session->userId);            
        $this->loggedInUserData = (array)$this->UserModel->getUserData($params);
        
        
        $this->load->helper('services_helper');
        
        $this->menuList = getListServices();
    }     
        
    public function guestLayout($dataParam)
    {
        $data['dataParam'] = $dataParam;
        
        $this->guestTemplate['guestHeader'] = $this->load->view('templates/guestHeader',$data);
        
        $this->guestTemplate['page'] = $this->load->view($this->page,$data);
        
        $this->guestTemplate['guestFooter'] = $this->load->view('templates/guestFooter',$data);
        
        $this->load->view('templates/guestMain',$this->guestTemplate);
    }
    
    public function adminLayout($dataParam)
    {      
        $data['dataParam'] = $dataParam;
                
        $data['loggedInUserData'] = $this->loggedInUserData;
        
        $data['menuList'] = $this->menuList;
        
        $this->adminTemplate['adminHeader'] = $this->load->view('templates/adminHeader',$data);
        
        $this->adminTemplate['adminLeftSideBar'] = $this->load->view('templates/adminLeftSideBar',$data);
        
        $this->adminTemplate['adminRightSideBar'] = $this->load->view('templates/adminRightSideBar',$data);
        
        $this->adminTemplate['page'] = $this->load->view($this->page,$data);
        
        $this->adminTemplate['adminFooter'] = $this->load->view('templates/adminFooter',$data);
        
        $this->load->view('templates/adminMain',$this->adminTemplate);
    }
    
    function _check_captcha($code) 
    {
        if($code != $this->session->captchaCode) 
        {
            $this->form_validation->set_message('_check_captcha', 'Captcha is incorrect');
            return FALSE;
        }
        return TRUE;
    }
    
    function isLoggedIn()
    {
        if( count($this->session->userdata['profileTypeId']) == 1 
            && in_array('1', $this->session->userdata['profileTypeId']) )            
        {
            return False;
        }
        else
        {
            return TRUE;
        }
    }
        
}
