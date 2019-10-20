<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set( 'Asia/Jakarta' );
		//if($this->session->userdata('status') != "login"){
		//$this->session->set_flashdata('message', '0');
			//redirect('login');
		//}
		$this->load->database();
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->model("login_model");
	}

	public function index()
	{
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('login.php');
	}


	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);
		$where = array(
			'username' => $username,
      		'user_status' => "1",
			'password' => md5($password)
			);
		$cek = $this->login_model->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'username' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(Home);

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}

}
