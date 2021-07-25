<?php
class Supplier extends CI_Model{
    function cek_login($table,$where){
		return $this->db->get_where($table, $where);
	}

	function get_supplier($id){
		$this->db->select('*');
		$this->db->from('tbl_suppliers');
		$this->db->join('tbl_people', 'id = sup_person_id');
		$this->db->where('sup_is_deleted', 0);

		if ($id != 0) $this->db->where('sup_id', $id);
		
		return $this->db->get();
	}
}