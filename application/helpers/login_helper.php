<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
if ( ! function_exists('checkLoggedIn'))
{
    function checkLoggedIn()
    {    
        $CI = get_instance();
        $CI->load->library('session');

        if( count($CI->session->userdata['profileTypeId']) == 1 && in_array('1', $CI->session->userdata['profileTypeId']) )            
        {
            $html = '<li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-key" aria-hidden="true"></i>LOGIN</a></li>';
        }
        else
        {
            $html = '<li><a href="'.base_url().'index.php/auth/logOut"><i class="fa fa-key" aria-hidden="true"></i>LOGOUT</a></li>';
        }
        
        echo $html;
    }
}