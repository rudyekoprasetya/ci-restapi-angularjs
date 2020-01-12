<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_admin');
	}

	public function index_get() {
		$id=$this->get('id');

		if(!empty($id)) { //jika cari berdasarkan id
			$data=$this->Model_admin->getByID($id);

			if($data) {				
				$this->response($data, 200);
			} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data tidak ditemukan'
            	], 404);
			}

		} else {
			$data=$this->Model_admin->get();
			$this->response($data, 200);
		}
	}

	public function index_post() {
		$data=array(
			'id'=>$this->post('id'),
			'username'=>$this->post('username'),
			'password'=>md5($this->post('password'))
		);

		$save=$this->Model_admin->save($data);
		
		if($save) {
			$this->set_response([
                'message' => 'Data Berhasil Disimpan'
            	], 200);
			
		} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data Gagal Disimpan'
            	], 400);
		}
	}

	public function index_put() {
		$id=$this->put('id');
		
		// $this->response(array('id'=>$id),200);
		$data=array(
			'username'=>$this->put('username'),
			'password'=>md5($this->put('password'))
		);

		$update=$this->Model_admin->update($id,$data);
		
		if($update) {
			$this->set_response([
                'id' => $id,
                'message' => 'Data Berhasil Diubah'
            	], 200);
			
		} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data Gagal Diubah'
            	], 400);
		}
	}

	public function index_delete() {
		$id=$this->delete('id');

		// $this->response(array('id'=>$id),200);

		$delete=$this->Model_admin->delete($id);
		$this->set_response([
			'id' => $id,
	        'message' => 'Data Berhasil Dihapus'
	    	], 200);		

	}

}