<?php
class Mandrill_library
{
    private $CI;
    
    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->database();
        
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        $sql = "SELECT * from `smtpRelayer` where `status`= '0'";
        $query = $this->CI->db->query($sql);
        $result = $query->result();
        $relayerData = (array)$result[0];
        
        require_once(APPPATH."third_party/mailchimp-mandrill-api-php/src/Mandrill.php");
        return new Mandrill($relayerData['password']);
    }
}