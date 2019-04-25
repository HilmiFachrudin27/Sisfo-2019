<?php
	
	class book extends CI_Model
	{
		
		function getBarangFromPengadaan($id){
			return $this->db->query("select * from pengadaan_barang where kode_barang='$id'");
		}

		function submitBarangToPemesanan($data){

		}

		function cekBookCode(){

		}

		function getPemesanan($id_pel){
			return $this->db->query("select * from pemesanan_barang where id_pelanggan='$id_pel'");
		}

		function getPelanggan($uname){
			return $this->db->query("select * from customer where username='$uname'");
		}

		function updateStok($stok,$jumlah,$id){
			// $brg=$this->getBarangFromPengadaan($id)->result_array();
			// $stok=$brg['jumlah_barang'];

			$stokk=$stok-$jumlah;

			$this->db->set('jumlah_barang',$stokk);
			$this->db->where('kode_barang', $id);
			$this->db->update('pengadaan_barang');
		}
	}
?>