
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
if ( ! function_exists('profileTypeDropDown'))
{
    function profileTypeDropDown()
    {    
        $CI = get_instance();
        $CI->load->database();

        $CI->db->select("*");
        $CI->db->from("profileTypes");
        
        $ignore = array('1','2');
        $CI->db->where_not_in('profileTypeId', $ignore);
        
        //echo $CI->db->get_compiled_select();

        $result =  $CI->db->get()->result();        
        
        $html = '<select class="form-control select2" multiple="multiple" data-placeholder="-- Profile Type --" style="width: 300px;">';
        foreach($result as $res)
        {
            $html .= '<option value='.$res->profileTypeId.'>'.$res->profileType.'</option>';
        }     
        $html .= '</select>';
        echo $html;
    }
}