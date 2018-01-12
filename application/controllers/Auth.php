<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{
    public function logIn()
    {        
        $this->load->helper('security');
            
        $emailOrMobile = $this->security->xss_clean($this->input->post('emailOrMobile'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $captcha1 = $this->input->post('captcha1');
            
        $this->load->library('form_validation');

        $rules = array(
            array(
                    'field' => 'emailOrMobile', 
                    'label' => 'Email Or Mobile', 
                    'rules' => 'required|trim|max_length[50]'
                ),
            array(
                    'field' => 'password', 
                    'label' => 'Password', 
                    'rules' => 'required|trim|min_length[8]|max_length[15]'
                ),
            array(
                    'field' => 'captcha1', 
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
            $this->load->model("AuthModel");
            $this->load->model("UserModel");
        
            if ($this->AuthModel->logIn($emailOrMobile, $password) == 1) 
            {
                if(is_numeric($emailOrMobile))
                {
                    $column = 'mobile';
                }
                else 
                {
                    $column = 'email';
                }
                $params = array($column=>$emailOrMobile);            

                $loggedInUserData = $this->UserModel->getUserData($params);

                $params = array('userId'=>$loggedInUserData->userId,'status'=>'0');

                $this->session->profileTypeId = $this->AuthModel->getUserProfileTypes($params);

                redirect(base_url().'index.php/admin/dashboard', 'location');
            } 
            else 
            {
                redirect(base_url(), 'location');
            }
        }
        else 
        {
            redirect(base_url(), 'location');
        }
        
        
    }
    
    public function logOut()
    {        
        //remove user from current session
        unset($this->session->userId);
        unset($this->session->profileTypeId);
        
        //destroy current session
        $this->session->sess_destroy();
            
        //rediret to welcome page
        redirect(base_url(), 'location');
    }
    
    public function forgotPassword()
    {
        $emailOrMobile = $this->input->post('emailOrMobile');

        $this->load->model("UserModel");
        
        if(is_numeric($emailOrMobile))
        {
            $where = array( 
                array('column'=>'mobile','value'=>$emailOrMobile)
            );
        }
        else 
        {
            $where = array( 
                array('column'=>'email','value'=>$emailOrMobile)
            );
        }

        $result = $this->UserModel->getValCols('','users',$where,'result');       
        $userData = $result[0];
                
        $this->load->model("EmailLogModel");
        $result = $this->EmailLogModel->getValCols(array('id','fromName','fromEmail'),'smtpRelayer',array( array('column'=>'status','value'=>'0')),'result');
        $relayerData =  $result[0]; 
        
        $this->load->library("mandrill_library");
        $mandrill = $this->mandrill_library->load();
        
        try 
        {
            $message = array(
                'html' => '<p>Click here you reset your password</p>',
                'text' => 'Click here you reset your password',
                'subject' => 'Reset Password',
                'from_email' => $relayerData->fromEmail,
                'from_name' => $relayerData->fromName,
                'to' => array(
                    array(
                        'email' => $userData->email,
                        'name' => $userData->name,
                        'type' => 'to'
                    )
                )
            );

            $async = false;
            //$mandrillResult = $mandrill->messages->send($message, $async);      

            
            $insertData = array(
                'smtpRelayerId'=>$relayerData->id,
                'emailOrigin'=>'Website',
                'messageId'=>$mandrillResult[0]['_id'],
                'controllerFunction'=>'Auth/forgotPassword',                                
                'emailFrom'=>$relayerData->fromEmail,
                'userIdTo'=>$userData->userId,
                'emailTo'=>$userData->email,
                'subject'=>$message['subject'],
                'body'=>$message['text'],
                'dateTime'=>date("Y-m-d H:i:s"),
                'status'=>$mandrillResult[0]['status']
            );
                         
            if( $mandrillResult[0]['status'] == 'sent' )
            {               
                $this->session->set_flashdata('redirectGuestMessage', 'Email sent');
            }
            elseif( $mandrillResult[0]['status'] == 'queued' )
            {               
                $this->session->set_flashdata('redirectGuestMessage', 'Email queued');
            }
            elseif( $mandrillResult[0]['status'] == 'error' )
            {                               
                $insertData['reject_reason']= $mandrillResult[0]['reject_reason'];
                $this->session->set_flashdata('redirectGuestMessage', 'Contact with admin');
            }
                        
            $this->EmailLogModel->insertData('emailLog',$insertData);            
        } 
        catch(Mandrill_Error $e) 
        {
            $this->session->set_flashdata('redirectGuestMessage', 'Email error occurred: ' . get_class($e) . ' - ' . $e->getMessage());            
            throw $e;
        }

        redirect(base_url(), 'location');
    }        
}
