<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        $this->load->model('CRUD');
	}
	public function Index()
	{
		if ($this->session->userdata('status')=="Peminjam"){
            redirect('Front/Menu');
        } elseif ($this->session->userdata('status')=="Petugas"){
			redirect('Admin');
		}
        $data = array(
            'pageTitle'     => 'Awal',
            'pageContent'   => 'front/home',
        );
		$this->load->view('front/base', $data);
	}
	public function Menu()
	{
		if ($this->session->userdata('status')!="Peminjam"){
            redirect('Front');
        } else {
			$data = array(
				'pageTitle'     => 'Menu',
				'pageHeader'	=> 'Selamat Datang, ' . $this->session->userdata('nama_peminjam').'!',
				'pageContent'   => 'front/menu',
			);
			$this->load->view('front/base', $data);
		}
	}
	public function Pinjam()
	{
		if ($this->session->userdata('status')!="Peminjam"){
            redirect('Front');
        } else {
			if ($this->CRUD->limitpinjam($this->session->userdata('nip_peminjam')) != '0'){
				$data = array(
					'pageTitle'     => 'Peminjaman',
					'pageContent'   => 'front/pinjam',
					'pageHeader'	=> 'Peminjaman',
					'db'			=> array(
						'barang'    => $this->db->where(array('jml_barang >' => 0))->get('barang')->result()
					),
					'modal'  		=> 'front/modal_pinjam',
				);
				$this->load->view('front/base', $data);
			}
		}
	}
	public function Done()
	{
		if ($this->session->userdata('status')!="Peminjam"){
            redirect('Front');
        } else {
			$data = array(
				'pageTitle'     => 'Sukses Meminjam!',
				'pageContent'   => 'front/success',
				'pageHeader'	=> 'Sukses meminjam barang!',
			);
			$this->load->view('front/base', $data);
		}
	}
	public function Cek()
	{
		if ($this->session->userdata('status')!="Peminjam"){
            redirect('Front');
        } else {
			$data = array(
				'pageTitle'     => 'Cek Barang',
				'pageContent'   => 'front/check',
				'pageHeader'	=> 'Cek Barang',
				'db'			=> array(
					'barang'    => $this->db->where(array('peminjam' =>  $this->session->userdata('nip_peminjam')))->order_by('tgl_pinjam','desc')->get('pinjam_barang')->result()
				),
			);
			$this->load->view('front/base', $data);
		}
	}
}
