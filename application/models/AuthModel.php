<?php
class AuthModel extends MY_Model 
{
    function logIn($emailOrMobile,$password) 
    {        
        if(is_numeric($emailOrMobile))
        {
            $column = 'mobile';
        }
        else 
        {
            $column = 'email';
        }
        
        
        $columnArray = '';
        $tableName = 'users';
        $whereArray = array( 
            array('column'=>$column,'value'=>$emailOrMobile,'condition'=>'equal'), 
            array('column'=>'password','value'=>md5($password),'condition'=>'equal')
        );
                
        return $this->getValCols($columnArray,$tableName,$whereArray,'count');
    }
    
    function getUserProfileTypes($paramArray) 
    {
        $this->db->select("profileTypeId");
        $this->db->from("userProfileTypes");
        
        if($paramArray['userId'] != null && $paramArray['userId'] != '')
        {
            $this->db->where("userId", $paramArray['userId']);
        }        
        if($paramArray['status'] != null && $paramArray['status'] != '')
        {
            $this->db->where("status", $paramArray['status']);
        }
        
        $result =  $this->db->get()->result();        
        
        $userProfileTypesArray = array();
        foreach($result as $res)
        {
            array_push($userProfileTypesArray, $res->profileTypeId);
        }
        
        return $userProfileTypesArray;
    }
    
    function getProfileTypeServices($paramArray)
    {
        $this->db->select(array("pts.profileTypeServiceId","pts.profileTypeId","pts.serviceId","s.controller","s.function"));
        $this->db->from( "profileTypeServices pts" );
        $this->db->join( "services s", 's.serviceId = pts.serviceId');
        
        if($paramArray['profileTypeIdsArray'] != null && $paramArray['profileTypeIdsArray'] != '')
        {
            $profileTypeIdsArray = $paramArray['profileTypeIdsArray'];
            
            $this->db->where_in("pts.profileTypeId", $profileTypeIdsArray);
        }
        
        $result =  $this->db->get()->result();        
        
        $servicesArray = array();
        foreach($result as $res)
        {
            array_push($servicesArray, strtolower($res->controller)."/".strtolower($res->function) );
        }
        
        return $servicesArray;
    }
}