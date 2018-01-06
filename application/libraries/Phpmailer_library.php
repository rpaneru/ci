<?php
class Phpmailer_library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        $this->load->model("EmailLogModel");
        $relayerData = $this->EmailLogModel->getValCols(array('id','fromName','fromEmail'),'smtpRelayer',array( array('column'=>'status','value'=>'0')),'result');
        
        var_dump($relayerData);
        die;
        
        require_once(APPPATH."third_party/phpmailer/PHPMailerAutoload.php");
        $objMail = new PHPMailer();
        return $objMail;
    }
}