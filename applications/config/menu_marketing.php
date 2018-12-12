<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Menu
| -------------------------------------------------------------------------
| This file lets you define navigation menu items on sidebar.
|
*/

$config['menu'] = array(

	'home' => array(
		'name'      => 'Home',
		'url'       => site_url(),
		'icon'      => 'fa fa-home'
	),

	'user' => array(
		'name'      => 'Users',
		'url'       => site_url('user/data_pegawai'),
		'icon'      => 'fa fa-users'
	),

	// Example to add sections with subpages
	'example' => array(
		'name'      => 'Data',
		'url'       => site_url(''),
		'icon'      => 'fa fa-folder-open',
		'children'  => array(
			'Barang'		=> site_url('example/demo/1'),
			'Penservisan'	=> site_url('example/demo/2'),
			//'Penjualan'		=> site_url('example/demo/3'),
		)
	),
	// end of example

	'admin' => array(
		'name'      => 'Laporan',
		'url'       => site_url(''),
		'icon'      => 'fa fa-area-chart',
		'children'  => array(
			'Laporan Transaksi'	=> site_url('admin/laporan'),
		)
	),

	'logout' => array(
		'name'      => 'Sign out',
		'url'       => site_url('account/logout'),
		'icon'      => 'fa fa-sign-out'
	),
);