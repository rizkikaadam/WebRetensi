<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$this->load->model("Laporan_model"); 
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('home.php');
		$this->load->view('footer.php');
	}

	public function harian()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('laporan_harian_pertama.php');
		$this->load->view('footer_tambah_data.php');
	}

	public function carilaporan_harian()
	{
		$tanggal = nice_date($this->input->post('tanggal'), 'Y-m-d');
		$data['tanggal_input'] = $tanggal;
		$data['harian'] = $this->Laporan_model->cari_harian($tanggal);
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$this->load->view('laporan_harian.php',$data);
		$this->load->view('footer_tambah_data.php');
	}

	public function carilaporan_bulan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data['bulanan'] = $this->Laporan_model->cari_bulan($bulan,$tahun);
		$this->session->set_flashdata('bulan', $bulan);
		$this->session->set_flashdata('tahun', $tahun);
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$this->load->view('laporan_bulanan.php',$data);
		$this->load->view('footer_tambah_data.php');
	}


	public function carilaporan_tahun()
	{
		$tahun = $this->input->post('tahun');
		$data['tahunan'] = $this->Laporan_model->cari_tahun($tahun);
		$this->session->set_flashdata('tahun', $tahun);
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		$this->load->view('laporan_tahunan.php',$data);
		$this->load->view('footer_tambah_data.php');
	}

	public function mingguan()
	{
		$this->load->view('header.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('laporan_mingguan.php');
		$this->load->view('footer.php');
	}

	public function bulanan()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('laporan_bulanan_pertama.php');
		$this->load->view('footer_tambah_data.php');
	}

	public function tahunan()
	{
		$this->load->view('header_tambah_data.php');
		$this->load->view('left.php');
		$this->load->view('top.php');
		//$this->load->view('left.php');
		//$data['berita'] = $this->berita_model->tampil_berita();
		//$this->load->view('berita.php',$data);
		$this->load->view('laporan_tahunan_pertama.php');
		$this->load->view('footer_tambah_data.php');
	}

	 // fungsi cetak excel
    public function print($tanggal_input){
        $tanggal =$tanggal_input;
		$data['tanggal_input'] = $tanggal;
		$data['harian'] = $this->Laporan_model->cari_harian($tanggal);
        $this->load->view('cetak_laporan_harian', $data);
    }

    public function print_bulanan(){
        $bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data['bulanan'] = $this->Laporan_model->cari_bulan($bulan,$tahun);
		$this->session->set_flashdata('bulan', $bulan);
		$this->session->set_flashdata('tahun', $tahun);
        $this->load->view('cetak_laporan_bulanan', $data);
    }

    public function print_tahunan(){
		$tahun = $this->input->post('tahun');
		$data['tahunan'] = $this->Laporan_model->cari_tahun($tahun);
		$this->session->set_flashdata('tahun', $tahun);
        $this->load->view('cetak_laporan_tahunan', $data);
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
