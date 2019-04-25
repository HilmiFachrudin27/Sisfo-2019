<?php
	
	class book extends CI_Model
	{
		
		function getBarangFromPengadaan($id){
			return $this->db->query("select * from pengadaan_barang_dummy where id_barang='$id'");
		}

		function submitBarangToPemesanan($data){

		}

		function cekBookCode(){

		}

		function getPemesanan(){
			
		}

		function getPelanggan($uname){
			return $this->db->query("select * from pelanggan where id_customer='$uname'");
		}

		function updateStok($stok,$jumlah,$id){
			$brg=$this->getBarangFromPengadaan($id)->result_array();
			$stok=$brg['stok'];

			$stok=$stok-$jumlah;

			$this->db->set('stok',$stok);
			$this->db->where('id_barang', $id);
			$this->db->update('pengadaan_barang_dummy');
		}
	}
?>