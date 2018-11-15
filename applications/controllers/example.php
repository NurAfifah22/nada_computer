<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('crud');
	}

	public function index()
	{
		$this->mTitle = "Examples";
		$this->mViewData = 'example/index';

		redirect('example/demo');

	}
	
	public function demo($id)
	{
		$this->push_breadcrumb('Data', 'example');
		
		if ($id==1) 
		{
			$this->load->model('Barang', 'barang');
			$crud = generate_crud('barang');
			$crud->columns('Nama_Barang', 'Jenis', 'Stok', 'Harga_Beli','Harga_Jual');
			$crud->callback_before_insert(array($this, 'callback_before_create_user'));

			$this->mTitle = "Data Barang";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		} 
		
		elseif ($id==2) 
		{
			$this->load->model('Servis', 'penservisan');
			$crud = generate_crud('penservisan');
			$crud->columns('Tanggal_Servis','Unit','Keluhan','Kelengkapan','Status','Waktu_Servis','Tanggal_Selesai','full_name');
			$crud->callback_before_insert(array($this, 'callback_before_create_user'));

			$this->mTitle = "Data Penservisan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		}
		
		elseif ($id==3) 
		{
			$this->load->model('Penjualan', 'penjualan');
			$crud = generate_crud('penjualan');
			$crud->columns('ID_Servis','Tanggal_Jual','ID_Barang','Harga_Satuan','Jumlah','Harga_Total','id');
			$crud->callback_before_insert(array($this, 'callback_before_create_user'));

			$this->mTitle = "Data Penjualan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		}
		
		$this->mViewData['back_url'] = 'example';
	}
}