<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengurus extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function get() {
		$data=$this->db->get('pengurus')->result();
		return $data;
	}

	public function getByID($id) {
		$data=$this->db->get_where('pengurus',array('id'=>$id))->result();
		return $data;
	}

	public function save($data) {
		$save=$this->db->insert('pengurus',$data);
		if($save) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update($id,$data) {
		$update=$this->db->where('id',$id);
		$update=$this->db->update('pengurus',$data);
		if($update) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($id) {
		$this->db->where('id',$id);
		$delete=$this->db->delete('pengurus');
		if($delete) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}