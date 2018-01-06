<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller 
{
    public function logIn()
    {        
        $emailOrMobile = $this->input->post('emailOrMobile');
        $password = $this->input->post('password');        
        
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

        $userData = $this->UserModel->getValCols('','users',$where,'result');       

        
        
        //$this->load->model("EmailLogModel");
        //$relayerData = $this->EmailLogModel->getValCols(array('id','fromName','fromEmail'),'smtpRelayer',array( array('column'=>'status','value'=>'0')),'result');
                
        $this->load->library("phpmailer_library");
        
        
        $objMail = $this->phpmailer_library->load();
        
        die;
        
        $objMail->setFrom($userData->email, $userData->name);
        $objMail->addAddress($relayerData[0]->fromEmail, $relayerData[0]->fromName);        
        $objMail->Subject = 'Reset Password';
        $objMail->Body = 'Click here you reset your password';
        
        $res = $objMail->send();
        var_dump($res);
        
        $res = true;
        
        if(!$res) 
        {
          echo 'Message was not sent.';
          echo 'Mailer error: ' . $objMail->ErrorInfo;
        } 
        else 
        {                        
            $insertData = array(
                                'smtpRelayerId'=>$relayerData[0]->id,
                                'emailOrigin'=>'Website',
                                'messageId'=>'',
                                'controllerFunction'=>'Auth/forgotPassword',                                
                                'emailFrom'=>$relayerData[0]->fromEmail,
                                'userIdTo'=>$userData->userId,
                                'emailTo'=>$userData->email,
                                'subject'=>$objMail->Subject,
                                'body'=>$objMail->Body,
                                'dateTime'=>date("Y-m-d H:i:s"),
                            );
            
            $this->EmailLogModel->insertData('emailLog',$insertData);
        }


    }
}
