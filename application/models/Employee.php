<?php
class Employee extends CI_Model{
    function cek_login($table,$where){
		return $this->db->get_where($table, $where);
	}

	function get_employee($id){
		$this->db->select('user_id, user_person_id, user_is_active, user_dept_id');
		$this->db->select('id, first_name, last_name, gender, phone, email, address, province, city');
		$this->db->from('tbl_users');
		$this->db->join('tbl_people', 'id = user_person_id');
		$this->db->where('user_is_deleted', 0);

		if ($id != 0) $this->db->where('user_id', $id);
		
		return $this->db->get();
	}
}