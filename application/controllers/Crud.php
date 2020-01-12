<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']='Restful dengan CodeIgniter + AngularJS';
		$this->load->view('view_data',$data);
	}

	public function pengurus() {
		$data['title']='Data Pengurus';
		$this->load->view('crud_pengurus',$data);
	}

	public function admin() {
		$data['title']='Data Admin';
		$this->load->view('crud_admin',$data);
	}

	public function home() {
		$data['title']='Restful dengan CodeIgniter + AngularJS';
		$this->load->view('home',$data);
	}

	public function about() {
		$data['title']='Halaman About';
		$this->load->view('about',$data);
	}


}