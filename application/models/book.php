<?php
	
	class book extends CI_Model
	{
		
		function getBarangFromPengadaan($id){
			return $this->db->query("select * from pengadaan_barang where kode_barang='$id'");
		}

		function submitBarangToPemesanan($data){
			$this->db->insert('pemesanan_barang',$data);
		}

		function cekBookingCode($kode_pesan){
			return $this->db->query("select id_pemesanan from pemesanan_barang where id_pemesanan='$kode_pesan'");
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

		function get4Table(){ //parameter: $idCust
			//get data by idCust kalo semua tabel sudah ada data
			// return $this->db->query("select c.namaCust, c.alamatCust, pb.nama_barang, pmb.banyakpesanan, pmb.harga from pemesanan_barang pmb join customer c on(c.idCust=pmb.id_pelanggan) join pengadaan_barang pb on(pb.kode_barang=pmb.id_barang)")->row(); //where pmb.id_pelanggan='$id'

			return $this->db->query('select * from pemesanan_barang')->result();
		}

		// function deleteOnTable($id){
		// 	$this->db->where('', ''); 
  		//$this->db->delete('pemesanan_barang'); 
		// }
	}
?>