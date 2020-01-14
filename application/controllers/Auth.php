<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD');
	}

	public function index()
	{
		($this->session->userdata('status')=='Petugas') ? redirect(base_url('admin')) : '';
		$data = array(
			'pageTitle' => 'Login',
			'pageContent'   => 'front/login',
			'pageHeader'  => 'Login',
		);

		$this->load->view('front/base', $data);
	}

	public function login()
	{
		$nip = $this->input->post('uname');
		$check = $this->db->from('pegawai')->where('nip', $nip)->get()->row();
		$q = $this->CRUD->get_row_where('petugas', 'username', $this->input->post('uname'));
		if ( ($q->username == $this->input->post('uname') ) && ($q->password == md5( $this->input->post('pword') ) ) ) {
			$sess = array(
				'id_admin'	    => $q->id_petugas,
				'nama_admin'   	=> $q->nama_petugas,
				'username_admin'=> $q->username,
				'lvl_admin'     => $q->id_level,
				'status' 		=> 'Petugas'
			);
			
			$this->session->set_userdata($sess);
			redirect('admin');
		} else if ( ( $check ) && ( $check->nip == $nip ) && ( $check->password ==  md5( $this->input->post('pword') ) ) ){
			$sess1 = array(
				'status'			=> 'Peminjam',
				'nip_peminjam'		=> $nip,
				'nama_peminjam'		=> $check->nama_pegawai,
				'alamat_peminjam'	=> $check->alamat
			);		
			$this->session->set_userdata($sess1);
			redirect('Front/Menu');
		} else {
			echo '<script type="text/javascript">alert("NIP / Pegawai Tidak Terdaftar!")</script>';
			header("Refresh:1; url=".base_url());
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
