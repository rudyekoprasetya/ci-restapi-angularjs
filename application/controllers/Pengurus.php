<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengurus extends REST_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_pengurus');
	}

	public function index_get() {
		$id=$this->get('id');

		if(!empty($id)) { //jika cari berdasarkan id
			$data=$this->Model_pengurus->getByID($id);

			if($data) {				
				$this->response($data, REST_Controller::HTTP_OK);
			} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data tidak ditemukan'
            	], REST_Controller::HTTP_NOT_FOUND);
			}

		} else {
			$data=$this->Model_pengurus->get();
			$this->response($data, REST_Controller::HTTP_OK);
		}
		
	}

	public function index_post() {
		$data=array(
			'id'=>$this->post('id'),
			'nama'=>$this->post('nama'),
			'alamat'=>$this->post('alamat'),
			'gaji'=>$this->post('gaji')
		);

		$save=$this->Model_pengurus->save($data);
		
		if($save) {
			$this->set_response([
                'id' => $this->post('id'),
                'message' => 'Data Berhasil Disimpan'
            	], REST_Controller::HTTP_CREATED);
			
		} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data Gagal Disimpan'
            	], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put() {
		$id=$this->put('id');
		
		// $this->response(array('id'=>$id),200);
		$data=array(
			'nama'=>$this->put('nama'),
			'alamat'=>$this->put('alamat'),
			'gaji'=>$this->put('gaji')
		);

		$update=$this->Model_pengurus->update($id,$data);
		
		if($update) {
			$this->set_response([
                'id' => $id,
                'message' => 'Data Berhasil Diubah'
            	], REST_Controller::HTTP_OK);
			
		} else {
			$this->set_response([
                'status' => FALSE,
                'message' => 'Data Gagal Diubah'
            	], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete() {
		$id=$this->delete('id');

		// $this->response(array('id'=>$id),200);

		$delete=$this->Model_pengurus->delete($id);
		$this->set_response([
	        'id' => $id,
	        'message' => 'Data Berhasil Dihapus'
	    	], REST_Controller::HTTP_OK);		

	}

} 