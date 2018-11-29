<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends MY_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->helper('crud');

		$this->load->model('Servis', 'penservisan');
	}

	public function index()
	{
		$this->mTitle = "Examples";
		$this->mViewFile = 'example/index';
	}
	
	public function demo($id)
	{

		$this->push_breadcrumb('Examples', 'example');
		$this->mTitle = "Demo ".$id;
		$this->mViewFile = 'example/demo';
		//$this->mViewData['back_url'] = 'example';
		$this->push_breadcrumb('Data', 'example');
		
		if ($id==1) 
		{
			$this->load->model('Barang', 'barang');
			$crud = generate_crud('barang');
			$crud->columns('Nama_Barang', 'Kategori', 'Stok', 'Harga_Beli','Harga_Jual');
			$crud->callback_before_insert();

			$this->mTitle = "Data Barang";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		} 
		
		elseif ($id==2) 
		{
			$crud = generate_crud('penservisan');
			$crud->columns('Tanggal_Servis','Unit','Keluhan','Kelengkapan','Status','id');
			$crud->set_relation('id', 'user', 'full_name');
			$crud->display_as('id', 'Nama Pegawai');
			$crud->unset_add_fields('Tanggal_Servis');
			$crud->add_action('Buka Nota', '', 'example/buka_nota', 'fa fa-list-alt fa-lg');
			$crud->callback_before_insert();

			$this->mTitle = "Data Penservisan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		}
		
		elseif ($id==3) 
		{
			$this->load->model('Penjualan', 'penjualan');
			$crud = generate_crud('penjualan');
			$crud->columns('ID_Servis','Tanggal_Jual','ID_Barang','Harga_Satuan','Jumlah','Harga_Total','id');
			$crud->set_relation('ID_Servis', 'penservisan', '{ID_Servis} - {Unit}');
			$crud->set_relation('ID_Barang', 'barang', 'Nama_Barang');
			$crud->set_relation('id', 'user', 'full_name');
			$crud->unset_add_fields('Tanggal_Servis');
			$crud->display_as('ID_Servis', 'Unit Servis');
			$crud->display_as('ID_Barang', 'Nama Barang');
			$crud->display_as('id', 'Nama Pegawai');
			$crud->callback_before_insert();

			$this->mTitle = "Data Penjualan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		}
	}

	public function buka_nota($ID_Servis)
	{
		$this->mTitle = "Backend Users";
		$this->mViewFile = 'admin/reset_password';
		$this->mViewData['target'] = $this->penservisan->get($ID_Servis);
	}
}