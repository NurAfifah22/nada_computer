<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// only admin role can access this controller
		/*if ( !verify_role('admin') )
		{
			redirect();
			exit;
		}*/
		$this->load->helper('crud');
		$this->load->model('penjualan', 'penjualan');
	}

	public function index()
	{
		redirect('admin/laporan');
	}

	/**
	 * Backend users
	 */
	public function laporan()
	{
		// CRUD table

		$crud = generate_crud('penjualan');
		//$crud->set_theme('bootstrap');
		$crud->columns('Tanggal_Jual', 'ID_Barang','Harga_Satuan', 'Jumlah', 'Harga_Total');
		$crud->set_relation('ID_Barang', 'barang', '{Nama_Barang} {Harga_Jual}');
		$crud->display_as('ID_Barang', 'Nama Barang');
		//$crud->add_column();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		

		$crud->callback_before_insert();



		$this->mTitle = "Backend Users";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	/**
	 * Reset password for backend users
	 */
	/*public function reset_password($user_id)
	{
		$this->mTitle = "Backend Users";
		$this->mViewFile = 'admin/reset_password';
		$this->mViewData['target'] = $this->backend_users->get($user_id);

		if ( validate_form('', 'admin/reset_password') )
		{
			// update db
			$password = $this->input->post('password');
			$result = $this->backend_users->update($user_id, ['password' => hash_pw($password)]);

			// success or failed
			if ($result)
				set_alert('success', 'Successfully updated.');
			else
				set_alert('danger', 'Database error.');

			// refresh page to show alert msg
			redirect( current_url() );
		}
	}
	
	/**
	 * Grocery Crud callback functions
	 */
	/*public function callback_before_create_user($post_array)
	{
		$post_array['password'] = hash_pw($post_array['password']);
		return $post_array;
	}*/
}