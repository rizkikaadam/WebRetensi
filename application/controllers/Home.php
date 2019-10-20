<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('header.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		$data['hitung_rekammedis'] = $this->Dretensi_model->hitung_rekammedis();
		$data['hitung_rekammedis_aktif'] = $this->Dretensi_model->hitung_rekammedis_aktif();
		$data['hitung_rekammedis_inaktif'] = $this->Dretensi_model->hitung_rekammedis_inaktif();
		$data['hitung_rekammedis_tindak_lanjut'] = $this->Dretensi_model->hitung_rekammedis_tindak_lanjut();
		//$this->load->view('berita.php',$data);
		$this->load->view('home.php',$data);
		$this->load->view('footer.php');
	}

	/*
	public function tambahberita_proses()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$dateBerita = '%Y%m%d%h%i%s';
		$time = time();
		$human= mdate($datestring, $time);
		$id_berita= mdate($dateBerita, $time);
		$this->load->library('upload');
		$data = array(
					'berita_id' => $id_berita,
					'berita_judul' => $this->input->post('berita_judul'),
					'berita_isi' => $this->input->post('berita_isi'),
					'penulis' => $this->session->userdata('nama'),
					'berita_tanggal' => $human
			);
		$this->berita_model->tambahberita_proses($data); //passing variable $data ke products_model
		//akhir simpan data teks ke database
		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['as']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['as']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['as']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['as']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['as']['size'] = $_FILES['userFiles']['size'][$i];

                $config['upload_path']          = './assets/gambar/'; //path folder
				$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('as')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['foto_berita'] = $fileData['file_name'];
                    $uploadData[$i]['berita_id'] = $id_berita;
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->berita_model->insert($uploadData);
            }
        }
		//awal simpan foto
		//akhir simpan foto

		$this->session->set_flashdata('message', 'tambah'); //untuk membuat flashdata mesage
		redirect('berita'); //kembali kehalaman awal berita
	

	}

	public function edit_berita($berita_id)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['berita'] = $this->berita_model->edit_berita($berita_id);
		$data['foto_berita'] = $this->berita_model->edit_beritaFoto($berita_id);
		$this->load->view('edit_berita.php',$data);
		$this->load->view('bawah.php');
	}


	public function editberita_proses(){
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$berita_id=$this->input->post('berita_id');
		$data = array(
			'berita_judul' => $this->input->post('berita_judul'),
			'berita_isi' => $this->input->post('berita_isi'),
			'penulis' => $this->session->userdata('nama'),
			'berita_tanggal' => $human
		);

		$condition['berita_id'] = $this->input->post('berita_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->berita_model->editberita_proses($data, $this->input->post('berita_id')); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		redirect('berita'); //redirect page ke halaman utama controller products

	}

	public function hapusberita_proses($berita_id)
	{
				$this->berita_model->hapusberita_proses($berita_id); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('berita'); //redirect page ke halaman utama controller products
	}

	public function hapusfotoBerita_proses($id_foto_berita,$berita_id)
	{
				$this->berita_model->hapusfotoBerita_proses($id_foto_berita); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('berita/edit_berita/'.$berita_id); //redirect page ke halaman utama controller products
	}

	public function update_foto()
	{
		$berita_id = $this->input->post('berita_id');
		$this->load->library('upload');
		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['as']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['as']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['as']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['as']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['as']['size'] = $_FILES['userFiles']['size'][$i];

                $config['upload_path']          = './assets/gambar/'; //path folder
				$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('as')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['foto_berita'] = $fileData['file_name'];
                    $uploadData[$i]['berita_id'] = $berita_id;
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->berita_model->insert($uploadData);
            }
        }
        redirect('berita/edit_berita/'.$berita_id); //redirect page ke halaman utama controller products
	}*/
}
