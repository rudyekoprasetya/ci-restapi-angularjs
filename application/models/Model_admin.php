<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function get() {
		$data=$this->db->get('admin')->result();
		return $data;
	}

	public function getByID($id) {
		$data=$this->db->get_where('admin',array('id'=>$id))->result();
		return $data;
	}

	public function save($data) {
		$save=$this->db->insert('admin',$data);
		if($save) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update($id,$data) {
		$update=$this->db->where('id',$id);
		$update=$this->db->update('admin',$data);
		if($update) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($id) {
		$this->db->where('id',$id);
		$delete=$this->db->delete('admin');
		if($delete) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}