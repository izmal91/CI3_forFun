<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_house extends CI_Model 
{
    //INSERT INTO TABLE ...
    public function insert_new($data)
    {
        $this->db->insert('house_table', $data);
        $q = $this->db->insert_id();
    }

    //UPDATE TABLE SET ...
    public function update_info($id, $data)
    {
        $q = $this->db->where('id',$id)->update('house_table', $data);
        return $q;
    }

}