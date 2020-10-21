<?php 

function get_table($table_name,$id=null)
{
            // Get Single or Multile Records 
   $CI =& get_instance();
   if(!empty($id))
   {
    $CI->db->where('id',$id);
    }
return $CI->db->get($table_name)->result_array();
}


function qry($bool = false){
    $CI =& get_instance();
    echo $CI->db->last_query();
    if($bool)
        die;
}
function p($data, $is_die = false){
    
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }else{
        echo $data;
    }

    if($is_die)
        die;
}

function get_table_rows($table_name,$id=null)
{
            // Get Single or Multile Records 

    $CI =& get_instance();
    if(!empty($id))
    {
        $CI->db->where('id',$id);
        
    }
    $result =  $CI->db->get($table_name)->result();
    return $result;
}
function get_table_array($table_name,$id=null)
{
            // Get Single or Multile Records 

    $CI =& get_instance();
    if(!empty($id))
    {
        $CI->db->where('id',$id);
    }
    $result =  $CI->db->get($table_name)->row_array();
    return $result;
}


function update_table($table_name,$id,$data)
{
   $CI =& get_instance();
            //  To Update & Return no of affected rows
   $CI->db->where('id',$id);
   $CI->db->update($table_name,$data);
   return $CI->db->affected_rows();
}
function insert_table($table_name,$data)
{
   $CI =& get_instance();
            //  To Insert &  get Last Inserted ID
   $CI->db->insert($table_name,$data);
   return $CI->db->insert_id();
}

function delete_table($table_name,$id)
{

    if(!empty($id))
    {   
       $CI =& get_instance();
       $CI->db->where('id',$id);
       $CI->db->delete($table_name);
       return $CI->db->affected_rows();
   }
}
?>