<?php
//File products_model.php

class Laporan_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	
	function cari_harian($tanggal){
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$this->db->where('tbl_retensi.tgl_inaktif', $tanggal);
		return $this->db->get();
	}

	function cari_bulan($bulan,$tahun){
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$where = "MONTH(tgl_inaktif)='$bulan' AND YEAR(tgl_inaktif)='$tahun'";	
    	$this->db->where($where);

		return $this->db->get();
	}

	function cari_tahun($tahun){
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$where = "YEAR(tgl_inaktif)='$tahun'";	
    	$this->db->where($where);

		return $this->db->get();
	}
	
	/*
	function lihat_pengajar($dosen_id)
	{
		$this->db->where('dosen_id', $dosen_id); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    $this->db->select("*");
    $this->db->from("tbl_dosen");

		return $this->db->get();
	}

	function editpengajar_proses($data, $condition)
	{
		//update produk
    $this->db->where($condition); //Hanya akan melakukan update sesuai dengan condition yang sudah ditentukan
    $this->db->update('tbl_dosen', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}

	function deleteProduct($id)
	{
		//delete produk berdasarkan id
	}*/
}
