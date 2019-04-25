<?php
	
	class pesan_barang_controller extends CI_Controller
	{
		
		// function __construct(argument)
		// {
		// 	parent::__construct();
		// 	$this->load->model('book');
		// }

		function index(){
			$this->load->view('Pesan_Barang');
		}

		function pesan(){
			print_r($_POST);
		}
	}
?>
