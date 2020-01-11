<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']='CI Rest API with AngularJS';
		$this->load->view('view_data',$data);
	}

}