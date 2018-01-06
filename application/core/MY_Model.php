<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{
    function getValCols($columnArray,$tableName,$whereArray,$execute) 
    {
//        $whereArray = array( 
//            array('column'=>'','value'=>'','format'=>'','condition'=>'') 
//        );
                
//         $execute may 3 options -> query, result, count
        
        if($columnArray == '')
        {
            $this->db->select("*");
        }
        else
        {
            $this->db->select($columnArray);
        }
        
        $this->db->from($tableName);   
        
        if(count($whereArray)>0)
        {
            foreach($whereArray as $whArr)
            {
                if($whArr['value'] != '' && $whArr['value'] != null)
                {                
                    if($whArr['format'] != '')
                    {
                        $whArr['value'] = $whArr['format']."(".$whArr['value'].")";
                    }                

                    if($whArr['condition'] == 'equal')
                    {
                        $this->db->where($whArr['column'],$whArr['value']);
                    }
                    elseif($whArr['condition'] == 'not equal')
                    {
                        $this->db->where($whArr['column']." <> ",$whArr['value']);
                    }
                    elseif($whArr['condition'] == 'greater and equal')
                    {
                        $this->db->where($whArr['column']." >= ",$whArr['value']);
                    }
                    elseif($whArr['condition'] == 'less and equal')
                    {
                        $this->db->where($whArr['column']." <= ",$whArr['value']);
                    }
                    elseif($whArr['condition'] == 'like')
                    {
                        $this->db->where($whArr['column']." like %",$whArr['value']."%");
                    }
                    else
                    {
                        $this->db->where($whArr['column'],$whArr['value']);
                    }
                }
            }
        }

        //echo $this->db->get_compiled_select();
        
        if($execute == 'query')
        {
            //return mysql query
            return $this->db->get();
        }
        elseif($execute == 'result')
        {
            //return resultset
            return $this->db->get()->result();        
        }
        elseif($execute == 'count')
        {
            return $this->db->get()->num_rows();       
        }
    }
     
    function insertData($tableName,$data) 
    {
        $this->db->insert($tableName,$data);
    }
    
}
