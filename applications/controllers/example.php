<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends MY_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->helper('crud');

		$this->load->model('Servis', 'penservisan');
		$this->load->model('Penjualan', 'penjualan');
	}

	public function demo($id)
	{

		$this->push_breadcrumb('Data', 'example');
		
		if ($id==1) 
		{
			$this->load->model('Barang', 'barang');
			$crud = generate_crud('barang');
			$crud->columns('Nama_Barang', 'Kategori', 'Stok', 'Harga_Beli','Harga_Jual');
			$crud->unset_export();
			$crud->unset_print();
			$crud->callback_before_insert();

			$this->mTitle = "Data Barang";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		} 
		
		elseif ($id==2) 
		{
			$crud = generate_crud('penservisan');
			$crud->columns('Tanggal_Servis','Unit','Keluhan','Kelengkapan', 'ID_Barang','id', 'Tanggal_Selesai');
			//$crud->fields('Unit','Keluhan','Kelengkapan', 'ID_Barang', 'Harga_Satuan','Status','id');
			//$crud->field_type('ID_Barang', 'multiselect');
			//$crud->set_read_fields('Harga_Jual');
			$crud->set_relation('id', 'user', 'full_name');
			$crud->set_relation('ID_Barang', 'barang', '{Nama_Barang} - {Harga_Jual}');
			$crud->display_as('id', 'Nama Pegawai');
			$crud->display_as('ID_Barang', 'Tindakan');
			$crud->unset_add_fields('Tanggal_Servis');
			//$crud->unset_add();
			$crud->unset_export();
			$crud->unset_print();
			//$crud->add_action('Buka Nota', '', 'example/buka_nota', 'fa fa-list-alt fa-lg');
			$crud->add_action('Print','','example/print_nota', 'fa fa-print fa-lg');
			$crud->callback_before_insert();

			//$crud->add_button();

			$this->mTitle = "Data Penservisan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
			//$this->mViewData['back_url']='admin/nota';
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
			$crud->unset_export();
			$crud->unset_print();
			$crud->add_action('Print','','example/print_nota_penjualan', 'fa fa-print fa-lg');
			$crud->display_as('ID_Servis', 'Unit Servis');
			$crud->display_as('ID_Barang', 'Nama Barang');
			$crud->display_as('id', 'Nama Pegawai');
			$crud->callback_before_insert();

			$this->mTitle = "Data Penjualan";
			$this->mViewFile = '_partial/crud';
			$this->mViewData['crud_data'] = $crud->render();
		}
	}
	public function print_nota_penjualan($ID_Jual)
	{
		$this->mTitle = "Nota Penjualan Print";
		$this->mViewFile = 'admin/nota_penjualan';
		$this->mViewData['target'] = $this->penjualan->get($ID_Jual);
	}

	public function buka_nota($ID_Servis)
	{
		$this->mTitle = "Data Penservisan";
		$this->mViewFile = 'example/buka_nota_S';
		$this->mViewData['target'] = $this->penservisan->get($ID_Servis);
		$this->mViewData['back_url'] = 'example/demo/2';
	}

	public function print_nota($ID_Barang)
	{
		$this->mTitle = "Nota Servis";
		$this->mViewFile = 'admin/nota';
		$this->mViewData['target'] = $this->penservisan->get($ID_Barang);
		//$this->mViewData['target'] = $this->penservisan->data($ID_Servis);
	}

}