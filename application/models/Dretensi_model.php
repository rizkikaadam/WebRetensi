<?php
//File products_model.php

class Dretensi_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function tampil()
	{
    //select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$this->db->order_by("tbl_retensi.berobat_terakhir", "desc");
		return $this->db->get();
	}

	function hitung_rekammedis()
	{
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		return $this->db->get();
	}

	function hitung_rekammedis_aktif()
	{
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$where = "tbl_retensi.tgl_inaktif > NOW()";	
    	$this->db->where($where);
		return $this->db->get();
	}

	function hitung_rekammedis_inaktif()
	{
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');	
		$where = "tbl_retensi.tgl_inaktif <= NOW()";	
    	$this->db->where($where);
		return $this->db->get();
	}

	function hitung_rekammedis_tindak_lanjut()
	{
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');	
		$where = "tbl_retensi.tgl_inaktif <= NOW() AND tbl_retensi.tindak_lanjut = ' ' ";
    	$this->db->where($where);
		return $this->db->get();
	}

	function tampil_aktif()
	{
    //select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$where = "tbl_retensi.tgl_inaktif > NOW()";	
    	$this->db->where($where);
    	$this->db->order_by("tbl_retensi.berobat_terakhir", "desc");
		return $this->db->get();
	}

	function tampil_inaktif()
	{
    //select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
		$where = "tbl_retensi.tgl_inaktif <= NOW()";	
    	$this->db->where($where);
    	$this->db->order_by("tbl_retensi.berobat_terakhir", "desc");
		return $this->db->get();
	}

	function tambah_proses($data)
	{
		$this->db->insert('tbl_rekammedis', $data);
	}

	function tambah_proses_retensi($data)
	{
		$this->db->insert('tbl_retensi', $data);
	}

	function hapus_proses($no_rekammedis)
	{
		//delete produk berdasarkan id
	    $this->db->where('no_rekammedis', $no_rekammedis);
	    $this->db->delete('tbl_retensi');
	}

	function edit($no_rekammedis){
		$this->db->select("*");
		$this->db->from("tbl_rekammedis");
		$this->db->join('tbl_retensi', 'tbl_retensi.no_rekammedis = tbl_rekammedis.no_rekammedis');		
    	$this->db->where('tbl_rekammedis.no_rekammedis', $no_rekammedis);
		return $this->db->get();
	}

	function edit_proses($data, $no_rekammedis)
	{
		//update produk
    $this->db->where('no_rekammedis', $no_rekammedis);
    $this->db->update('tbl_retensi', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}

	function edit_berobat($data, $no_rekammedis)
	{
		//update produk
    $this->db->where('no_rekammedis', $no_rekammedis);
    $this->db->update('tbl_retennsi', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}

	function tindak_lanjut($data, $no_rekammedis)
	{
		//update produk
    $this->db->where('no_rekammedis', $no_rekammedis);
    $this->db->update('tbl_retensi', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
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
