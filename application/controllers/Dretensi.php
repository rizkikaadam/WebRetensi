<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DRetensi extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set( 'Asia/Jakarta' );
		if($this->session->userdata('status') != "login"){
		$this->session->set_flashdata('message', '0');
			redirect('Login');
		}
		$this->load->database();
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->model("Dretensi_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
	}

	public function index()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$datestring = '%Y-%m-%d';
		$time = time();
		$human= mdate($datestring, $time);
		$data['tanggal_sekarang'] = $human;
		$data['rekammedis'] = $this->Dretensi_model->tampil();
		$this->load->view('retensi.php',$data);
		$this->load->view('footer_tambah_data.php');
	}
	
	public function aktif()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$datestring = '%Y-%m-%d';
		$time = time();
		$human= mdate($datestring, $time);
		$data['tanggal_sekarang'] = $human;
		$data['rekammedis'] = $this->Dretensi_model->tampil_aktif();
		$this->load->view('retensi.php',$data);
		$this->load->view('footer_tambah_data.php');
	}

	public function inaktif()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$datestring = '%Y-%m-%d';
		$time = time();
		$human= mdate($datestring, $time);
		$data['tanggal_sekarang'] = $human;
		$data['rekammedis'] = $this->Dretensi_model->tampil_inaktif();
		$this->load->view('retensi.php',$data);
		$this->load->view('footer_tambah_data.php');
	}

	public function tambah_data(){
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$this->load->view('tambah_data_rm.php');
		$this->load->view('footer_tambah_data.php');
	}

	public function edit_data(){
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$this->load->view('edit_data_rm.php');
		$this->load->view('footer_tambah_data.php');
	}

	public function edit($no_rekammedis)
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$data['rekammedis'] = $this->Dretensi_model->edit($no_rekammedis);
		$this->load->view('edit_data_rm.php',$data);
		$this->load->view('footer_tambah_data.php');
	}

	public function hapus($no_rekammedis)
	{
		$this->Dretensi_model->hapus_proses($no_rekammedis); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'hapus');
		redirect('Dretensi'); //redirect page ke halaman utama controller products
	}

	public function tambahdata_proses()
	{
			$tgl_inaktif = date('Y-m-d', strtotime('+5 year', strtotime( $this->input->post('berobat_terakhir') )));
			$berobat_terakhir = nice_date($this->input->post('berobat_terakhir'), 'Y-m-d');
			$tgl_lahir = nice_date($this->input->post('tgl_lahir'), 'Y-m-d');
			$no_rak = substr($this->input->post('no_rekammedis'), 14, 2);
			$data = array(
						'no_rekammedis'=>$this->input->post('no_rekammedis'),
						'nama'=>$this->input->post('nama'),
						'tempat'=>$this->input->post('tempat'),
						'tgl_lahir'=>$tgl_lahir,
						'jk'=>$this->input->post('jk'),
						'agama'=>$this->input->post('agama'),
						'pendidikan'=>$this->input->post('pendidikan'),
						'no_rak'=>$no_rak,
						'alamat'=>$this->input->post('alamat')
					);
			$data_retensi = array(
				'no_rekammedis'=>$this->input->post('no_rekammedis'),
				'berobat_terakhir'=>$berobat_terakhir,
				'tgl_inaktif'=>$tgl_inaktif
				);

				$this->Dretensi_model->tambah_proses($data); //passing variable $data ke products_model
				$this->Dretensi_model->tambah_proses_retensi($data_retensi);

				$this->session->set_flashdata('message', 'tambah');
				redirect('Dretensi'); //redirect page ke halaman utama controller products
	}

	public function editdata_proses()
	{
			$tgl_lahir = $this->input->post('tgl_lahir');
			$no_rak = substr($this->input->post('no_rekammedis'), 14, 2);
			if ($berobat_terakhir != '') {
				$data = array(
							'no_rekammedis'=>$this->input->post('no_rekammedis'),
							'nama'=>$this->input->post('nama'),
							'tempat'=>$this->input->post('tempat'),
							'tgl_lahir'=>$tgl_lahir,
							'jk'=>$this->input->post('jk'),
							'agama'=>$this->input->post('agama'),
							'pendidikan'=>$this->input->post('pendidikan'),
							'no_rak'=>$no_rak,
							'alamat'=>$this->input->post('alamat')
						);
			}
			else
			{
				$data = array(
							'no_rekammedis'=>$this->input->post('no_rekammedis'),
							'nama'=>$this->input->post('nama'),
							'tempat'=>$this->input->post('tempat'),
							'jk'=>$this->input->post('jk'),
							'agama'=>$this->input->post('agama'),
							'pendidikan'=>$this->input->post('pendidikan'),
							'no_rak'=>$no_rak,
							'alamat'=>$this->input->post('alamat')
						);
			}
			
			$condition['no_rekammedis'] = $this->input->post('no_rekammedis');
			$this->Dretensi_model->edit_proses($data,$condition);

			$this->session->set_flashdata('message', 'edit');
			redirect('Dretensi'); //redirect page ke halaman utama controller products
	}

	public function ubah_berobat()
	{
			$tgl_inaktif = date('Y-m-d', strtotime('+5 year', strtotime( $this->input->post('berobat_terakhir') )));
			$berobat_terakhir = nice_date($this->input->post('berobat_terakhir'), 'Y-m-d');
			$data_retensi = array(
				'berobat_terakhir'=>$berobat_terakhir,
				'tgl_inaktif'=>$tgl_inaktif
				);

			
			$condition['no_rekammedis'] = $this->input->post('no_rekammedis');
			$this->Dretensi_model->edit_berobat($data,$condition);

			$this->session->set_flashdata('message', 'edit');
			redirect('Dretensi'); //redirect page ke halaman utama controller products
	}

	public function tindak_lanjut()
	{
		$data = array(
			'ket_inaktif' => $this->input->post('ket_inaktif') ,
			'status' => $this->input->post('status') ,
			'tindak_lanjut' => $this->input->post('tindak_lanjut') 
			);

		$condition['no_rekammedis'] = $this->input->post('no_rekammedis');
		$this->Dretensi_model->tindak_lanjut($data,$condition);

		$this->session->set_flashdata('message', 'tindak');
		redirect('Dretensi/inaktif'); //redirect page ke halaman utama controller products	
	}
}
