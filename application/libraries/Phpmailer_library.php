<?php
class Phpmailer_library
{
    //private $CI;
    
    public function __construct()
    {
//        $this->CI = & get_instance();
//        $this->CI->load->database();
        
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
//        $sql = "SELECT `id`,`fromName`,`fromEmail` from `smtpRelayer` where `status`= '0'";
//        $query = $this->CI->db->query($sql);
//        $result = $query->result();
//        $relayerData = (array)$result[0];

        require_once(APPPATH."third_party/phpmailer/PHPMailerAutoload.php");
        $objMail = new PHPMailer();
        return $objMail;
    }
}