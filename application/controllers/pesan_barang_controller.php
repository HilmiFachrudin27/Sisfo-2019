<?php

class pesan_barang_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('book');
	}

	function index(){
		$data['pilihan']=$this->book->getBarangToOption()->result();
		// $data['user']=$this->book->getPelanggan($_SESSION['uname'])->result();
		$this->load->view('Pesan_Barang',$data);
	}

	function pesan(){
		// ---------------------ini script kalo udah ada data buat join dan udah nyambung ke semua program---------------------------
			// $pos=$_POST;
			// $barang=$this->book->getBarangFromPengadaan($pos['brg']);
			// $arrBrg=$barang->result_array();

			// if ($arrBrg['jumlah_barang']>=$pos['jml']) {
			// 	$this->book->updateStok($arrBrg['jumlah_barang'],$pos['jml'],$pos['brg']);
			// 	$kode="PSN".rand(0,99);

			// 	if($this->book->cekBookingCode($kode)->num_rows > 0){
			// 		echo "kode booking duplikat";
			// 	}else{
			// 		$data=array(
			// 			'id_pemesanan'=>$kode,
			// 			'id_barang' => $pos['brg'],
			// 			'id_pelanggan'=> $_SESSION['uname'], //tinggal ganti ke session
			// 			'banyak_barang'=> $pos['jml'],
			// 			'harga_barang'=> ($arrBrg['harga_barang']*$pos['jml'])
			// 		);
			// 		$this->book->submitBarangToPemesanan($data);
			// 	}				
			// }else{
			// 	echo "jumlah barang yg diinginkan melebihi stok";
			// }

		// ---------------------ini script kalo udah ada data buat join dan udah nyambung ke semua program---------------------------

			$pos=$_POST;
			$id_pesan= "PSN".rand(0,99);
			// $id_pesan='dummy123';
			$qPesan=$this->book->cekBookingCode($id_pesan);

			//print_r($qPesan->num_rows());
			if($qPesan->num_rows()==0){
				$data=array(
					'id_pemesanan'=>$id_pesan,
					'id_barang' => $pos['brg'],
					'id_pelanggan'=> $pos['uname'], //masih pake nama pelanggan, belom diambil dari tabel customer
					'banyak_barang'=> $pos['jml'],
					'harga_barang'=> (5000*$pos['jml']) //masih harga dummy karena belum ada data dari tabel pengadaan barang
				);
				$this->book->submitBarangToPemesanan($data);
				redirect(base_url());
				echo "masuk";
			}else{
				echo "data duplikat";
			}
			

		}

		function cart(){
			//---------------script yang bener-------------------------------------------
			//
			// $pemesanan['booking_data']=$this->book->getPemesanan($_SESSION['un']);
			// $this->load->view('cart',$pemesanan); 
			//
			//---------------script yang bener-------------------------------------------


			$isi=$this->book->get4Table(); //belom ada session $_SESSION['id']
			//print_r($isi);
			$data=array(
				'booking_data'=>$isi
			);
			// echo "<br>";
			// print_r($data['booking_data']);
			$this->load->view('cart',$data);
		}

		function delete($kode){
			$row=$this->book->cekBookingCode($kode);
			if($row){
				$this->book->deleteOnTable($kode);
				redirect(base_url('index.php/pesan_barang_controller/cart'));
			}
		}

		// function pengadaanToOption(){

		// 	// print_r($this->book->getBarangToOption()->result_array());
		// }
	}
	?>
