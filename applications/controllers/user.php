<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

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
		$this->load->model('Backend_user_model', 'user');
	}

	public function index()
	{
		redirect('user/data_pegawai');
	}

	/**
	 * Backend users
	 */
	public function data_pegawai()
	{
		// CRUD table
		$crud = generate_crud('user');
		$crud->columns('full_name', 'role', 'username', 'No_hp', 'Alamat');
		$crud->display_as('full_name', 'Nama Pegawai');
		$crud->display_as('role', 'Jabatan');
		//$crud->unset_edit_fields('password', 'active');
		$crud->unset_add_fields('active');
		$crud->add_action('Reset Password', '', 'user/reset_password', 'fa fa-rotate-left fa-lg');
		$crud->callback_before_insert(array($this, 'callback_before_create_user'));

		$this->mTitle = "Data Pegawai";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	/**
	 * Reset password for backend users
	 */
	public function reset_password($user_id)
	{
		$this->mTitle = "Backend Users";
		$this->mViewFile = 'admin/reset_password';
		$this->mViewData['target'] = $this->user->get($user_id);

		if ( validate_form('', 'admin/reset_password') )
		{
			// update db
			$password = $this->input->post('password');
			$result = $this->user->update($user_id, ['password' => hash_pw($password)]);

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
	public function callback_before_create_user($post_array)
	{
		$post_array['password'] = hash_pw($post_array['password']);
		return $post_array;
	}
}