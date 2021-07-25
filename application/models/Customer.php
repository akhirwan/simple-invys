<?php
class Customer extends CI_Model{
    function cek_login($table,$where){
		return $this->db->get_where($table, $where);
	}

	function get_customer($id){
		$this->db->select('*');
		$this->db->from('tbl_customers');
		$this->db->join('tbl_people', 'id = cust_person_id');
		$this->db->where('cust_is_deleted', 0);

		if ($id != 0) $this->db->where('cust_id', $id);
		
		return $this->db->get();
	}
}