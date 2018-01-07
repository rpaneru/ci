<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//header('X-XSS-Protection:0');

class Welcome extends MY_Controller 
{
    public function index()
    {
        $this->load->library('form_validation');
        
        $this->load->helper('captcha');        
        
        $capacheConfig = array(
            'img_width' => 190,
            'img_height' => 60,
            'font_size' => 20,
            'font_path' => FCPATH. '/public/fonts/verdana.ttf',
            'expiration' => 300
        );
        
        $cap = create_captcha($capacheConfig);
        $capData = array('cap'=>$cap);                      
             
        $this->page = "welcome";
        $this->guestLayout($capData);
    }
    
    
    public function contactUs()
    {
        if (isset($_POST['contactUsFormSubmit'])) 
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $queryDirty = $this->input->post('query');
            $this->load->helper('htmlpurifier');
            $queryCleaned = html_purify($queryDirty);
            $captcha = $this->input->post('captcha');
            
            $this->load->library('form_validation');

            $rules = array(
                array(
                        'field' => 'name', 
                        'label' => 'Name', 
                        'rules' => 'required|trim|max_length[50]'
                    ),
                array(
                        'field' => 'email', 
                        'label' => 'Email', 
                        'rules' => 'required|trim|max_length[50]|valid_email'
                    ),
                array(
                        'field' => 'query', 
                        'label' => 'Query', 
                        'rules' => 'required|trim|max_length[500]'
                    ),   
                array(
                        'field' => 'captcha', 
                        'label' => 'Captcha', 
                        'rules' => 'required|trim|max_length[8]'
                    )
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == false)
            {        
                $this->load->library('form_validation');
                
                $this->load->helper('captcha');
        
                $capacheConfig = array(
                    'img_width' => 190,
                    'img_height' => 60,
                    'font_size' => 20,
                    'font_path' => FCPATH. '/public/fonts/verdana.ttf',
                    'expiration' => 300
                );

                $cap = create_captcha($capacheConfig);
                $capData = array('cap'=>$cap);                       

                $this->page = "welcome";
                $this->guestLayout($capData);
            }      
        }
    }
            




//    public function contactUS()
//    {
//        $name = $this->input->post('name');
//        $email = $this->input->post('email');
//        $queryDirty = $this->input->post('query');
//        $this->load->helper('htmlpurifier');
//        $queryCleaned = html_purify($queryDirty);
//        $captcha = $this->input->post('captcha');
//
//        $success = false;
//        
//        $this->load->library('form_validation');
//        
//        $config = array(
//            array(
//                    'field' => 'name', 
//                    'label' => 'Name', 
//                    'rules' => 'required|trim|xss_clean|max_length[50]'
//                ),
//            array(
//                    'field' => 'email', 
//                    'label' => 'Email', 
//                    'rules' => 'required|trim|xss_clean|max_length[50]'
//                ),
//            array(
//                    'field' => 'query', 
//                    'label' => 'Query', 
//                    'rules' => 'required|trim|xss_clean|max_length[500]'
//                ),   
//            array(
//                    'field' => 'captcha', 
//                    'label' => 'Captcha', 
//                    'rules' => 'required|trim|xss_clean|max_length[8]|callbackValidateCaptcha'
//                )
//        );
//        
//        $this->form_validation->set_rules($config);
//        
//        if ($this->form_validation->run() == true)
//        {        
//            $success = true;
////            if( $this->session->captcha == $captcha )
////            {
////                $success = true;
////            }
////            else
////            {
////                $success = false;
////                //$validationErrors = "Captcha not matched";
////            }
//        }
//        else
//        {
//            $validationErrors =  validation_errors();
//        }        
//        
//        if($success == false)
//        {
//            $postedData = array('messageType'=>'contactUsError','message'=>$validationErrors,'name'=>$name,'email'=>$email,'query'=>$queryDirty,'capData'=>$capData);            
//        }
//        else
//        {
//            $postedData = array('messageType'=>'contactUsSuccess','message'=>'Query submitted successfully.');
//        }
//        
//        $this->session->set_flashdata('postedData', $postedData);    
//        redirect(base_url(), 'location');
//    }
}
