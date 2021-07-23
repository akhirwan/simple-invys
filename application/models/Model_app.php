<?php
class Model_app extends CI_Model{
    function cek_login($table,$where){
		return $this->db->get_where($table, $where);
	}
	
	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	
	function order_data($where, $orderBy, $order, $table){
		$this->db->order_by($orderBy, $order);
		return $this->db->get_where($table, $where);
	}
	
	function get_data($table){
		return $this->db->get($table);
	}
	
	function insert_data($data, $table){
		$this->db->insert($table, $data);
	}
	
	function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}
	
	function delete_data($where, $table){
		$this->db->delete($table, $where);
	}
}
?>