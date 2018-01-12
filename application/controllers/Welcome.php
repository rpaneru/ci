<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        echo $this->session->captchaCode = $cap['word'];
        
        $this->page = "welcome";
        $this->guestLayout($capData);
    }
    
    
    public function contactUs()
    {
        if (isset($_POST['contactUsFormSubmit'])) 
        {
            $this->load->helper('security');
            
            $name = $this->security->xss_clean($this->input->post('name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $query = $this->security->xss_clean($this->input->post('query'));            
            $captcha = $this->security->xss_clean($this->input->post('captcha'));
            
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
                        'rules' => 'required|trim|max_length[8]|callback__check_captcha'
                    )
            );

            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE)
            {              
                $continue = FALSE;
            } 
            else
            {                                                    
                $continue = TRUE;
            }

            if($continue)
            {
                $this->session->set_flashdata('contactUsSuccess','Your query has been submited. Admin will contact you soon');
                redirect(base_url(), 'location');
            }
            else
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
                $this->session->captchaCode = $cap['word'];

                $this->page = "welcome";
                $this->guestLayout($capData);
            }
        }
    }
}