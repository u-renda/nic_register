<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	var $cache_name = 'nic_admin_administrator_';
	
    function info($param)
    {
        $where = array();
        if ( ! empty($param['username']))
        {
            $where += array('username' => $param['username']);
        }
        if ( ! empty($param['password']))
        {
            $where += array('password' => $param['password']);
        }
        
        $this->db->select('*');
        $this->db->from('Nic_admin');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */