<?php
	
	class pesan_barang_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('book');
		}

		function index(){
			$this->load->view('Pesan_Barang');
		}

		function pesan(){
			$pos=$_POST;
			$cust=$this->book->getPelanggan($pos['uname']); //post nya tinggal diganti ke session
			$barang=$this->book->getBarangFromPengadaan($pos['brg']);
			$arrBrg=$barang->result_array();
			$arrCust=$cust->result_array();
			$this->session->set_userdata('un',$pos['uname']);

			if ($cust->num_rows() > 0 && $barang->num_rows()>0) {
				if ($arrBrg['jumlah_barang']>=$pos['jml']) {
					$this->book->updateStok($arrBrg['jumlah_barang'],$pos['jml'],$pos['brg']);
					$data=array(
						'id_pemesanan'=>"psn".rand(0,99),
						'id_barang' => $pos['brg'],
						'id_pelanggan'=> $arrCust['idCust'], //tinggal ganti ke session
						'banyak_barang'=> $pos['jml'],
						'harga_barang'=> ($arrBrg['harga_barang']*$pos['jml'])
					);
					$this->book->submitBarangToPemesanan($data);
				}else{
					echo "jumlah barang tidak sesuai dengan stok";
				}
				
			}else{
				echo "pelanggan atau barang tidak ditemukan";
			}		
		}

		function cart(){
			// $pemesanan['$msg']=$this->book->getPemesanan($_SESSION['un']);
			$this->load->view('cart'); //,$pemesanan
			
		}
	}
?>
