<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
if ( ! function_exists('getListServices'))
{
    function getListServices()
    {     

        $CI = get_instance();
        $CI->load->helper('file');
        
        $controllers = get_filenames( APPPATH . 'controllers/' ); 

        foreach( $controllers as $k => $v )
        {
            if( strpos( $v, '.php' ) === FALSE)
            {
                unset( $controllers[$k] );
            }
        }

        $excludeControllers = array('Welcome.php','Auth.php');
        $excludeMethods = array('__construct','guestLayout','adminLayout','_check_captcha','isLoggedIn','get_instance');
        
        foreach( $controllers as $controller )
        {
            if( !in_array($controller, $excludeControllers) )
            {
                include_once APPPATH . 'controllers/' . $controller;

                $methods = get_class_methods( str_replace( '.php', '', $controller ) );

                $methodsArray = array();
                foreach( $methods as $method )
                {
                    if(!in_array($method, $excludeMethods))
                    {
                        array_push($methodsArray,$method);
                    }                    
                }                
                $list[$controller] = $methodsArray;
            }
        }
        
        return $list;
        
    }
}