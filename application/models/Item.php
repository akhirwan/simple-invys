<?php
class Item extends CI_Model{
    function cek_login($table,$where){
		return $this->db->get_where($table, $where);
	}

	function get_item($id){
		$this->db->select('*');
		$this->db->from('tbl_items');
		$this->db->join('tbl_categories', 'cat_id = item_category_id');
		$this->db->join('tbl_suppliers', 'sup_id = item_supplier_id');
		$this->db->where('item_is_deleted', 0);

		if ($id != 0) $this->db->where('item_id', $id);
		
		return $this->db->get();
	}
}