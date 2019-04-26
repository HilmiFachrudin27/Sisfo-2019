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
			// ---------------------ini script kalo udah ada data buat join---------------------------
			// $pos=$_POST;
			// $cust=$this->book->getPelanggan($pos['uname']); //post nya tinggal diganti ke session
			// $barang=$this->book->getBarangFromPengadaan($pos['brg']);
			// $arrBrg=$barang->result_array();
			// $arrCust=$cust->result_array();
			// $this->session->set_userdata('un',$pos['uname']);

			// if ($cust->num_rows() > 0 && $barang->num_rows()>0) {
			// 	if ($arrBrg['jumlah_barang']>=$pos['jml']) {
			// 		$this->book->updateStok($arrBrg['jumlah_barang'],$pos['jml'],$pos['brg']);
			// 		$data=array(
			// 			'id_pemesanan'=>"PSN".rand(0,99),
			// 			'id_barang' => $pos['brg'],
			// 			'id_pelanggan'=> $arrCust['idCust'], //tinggal ganti ke session
			// 			'banyak_barang'=> $pos['jml'],
			// 			'harga_barang'=> ($arrBrg['harga_barang']*$pos['jml'])
			// 		);
			// 		$this->book->submitBarangToPemesanan($data);
			// 	}else{
			// 		echo "jumlah barang tidak sesuai dengan stok";
			// 	}
				
			// }else{
			// 	echo "pelanggan atau barang tidak ditemukan";
			// }
			// ---------------------ini script kalo udah ada data buat join---------------------------

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
			// $pemesanan['$msg']=$this->book->getPemesanan($_SESSION['un']);
			//$this->load->view('cart'); //,$pemesanan

			$isi=$this->book->get4Table(); //belom ada session $_SESSION['id']
			//print_r($isi);
			$data=array(
				'booking_data'=>$isi
			);
			// echo "<br>";
			// print_r($data['booking_data']);
			$this->load->view('cart',$data);
		}
	}
?>
