<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CRUD');
		($this->session->userdata('status')!='Petugas') ? redirect(base_url()) : '';
	}
	public function menu(){
		if ($this->session->userdata('lvl_admin')=='1'){
			$menu = array(
				#array(judul menu, ikon menu, link)
				array('Dashboard','fa-tachometer','admin'),
				array('Barang','fa-archive','admin/barang'),
				array('Peminjaman','fa-upload','admin/peminjaman'),
				array('Pengembalian','fa-download','admin/pengembalian'),
				array('Rekap','fa-file-o','admin/rekap'),
				array('Pegawai','fa-users','admin/pegawai'),
				array('Petugas','fa-users','admin/petugas'),
			);
		} else {
			$menu = array(
				#array(judul menu, ikon menu, link)
				array('Dashboard','fa-tachometer','admin'),
				#array('Barang','fa-archive','admin/barang'),
				array('Peminjaman','fa-upload','admin/peminjaman'),
				array('Pengembalian','fa-download','admin/pengembalian'),
				#array('Rekap','fa-file-o','admin/rekap'),
			);
		}
		return $menu;
	}
	public function index()
	{
		$data = array(
			'pageTitle'   	=> 'Dashboard',
			'pageContent' 	=> 'admin/dashboard',
			'menu'			=> $this->menu(),
			'count'			=> array(
				'barang'	=> count($this->CRUD->get('barang')),
				'pinjam'	=> count($this->CRUD->get_where('pinjam_barang','tgl_kembali',NULL)),
				'ruang'		=> count($this->CRUD->get('ruang')),
				'pegawai'	=> count($this->CRUD->get('pegawai')),
			)
		);
		$this->load->view('admin/base', $data);
	}

	public function Barang()
	{
		$data = array(
			'pageTitle'   	=> 'Barang',
			'pageHeader'	=> 'Barang',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/barang',
			'db'			=> array(
				'barang'	=> $this->CRUD->get('barang')
			)
		);

		$this->load->view('admin/base', $data);
	}

	public function BarangAdd()
	{
        if(($this->input->post('nama_barang')) && ($this->input->post('ruang')) && ($this->input->post('jenis')) && ($this->input->post('jml_barang'))){
			$kode = $this->CRUD->code('barang','kode_barang','BR');
            $barang = array(
                'kode_barang' 		=> $kode,
				'nama_barang'		=> $this->input->post('nama_barang'),
				'spesifikasi'		=> $this->input->post('spesifikasi'),
				'ruang'		  		=> $this->input->post('ruang'),
				'jml_barang'  		=> $this->input->post('jml_barang'),
				'kondisi' 			=> $this->input->post('kondisi'),
				'jenis_barang'		=> $this->input->post('jenis'),
            );
            $this->CRUD->add('barang', $barang);
			$this->session->set_flashdata("success", "true");
			echo '<script type="text/javascript">alert("Berhasil menambah data!")</script>';
		} else {
			$this->session->set_flashdata("success", "false");
			echo '<script type="text/javascript">alert("Gagal menambah data!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/barang'));
		#$this->output->enable_profiler(TRUE);
	}

	public function BarangStok()
	{
        if($this->input->post('id_barang')){
            $barang = array(
				'jml_barang'  		=> $this->input->post('jml_barang'),
            );
            $this->CRUD->update('barang', 'id_barang =' . $this->input->post('id_barang'),  $barang);
			$this->session->set_flashdata("success", "true");
			echo '<script type="text/javascript">alert("Berhasil menambah stok!")</script>';
		} else {
			$this->session->set_flashdata("success", "false");
			echo '<script type="text/javascript">alert("Gagal menambah stok!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/barang'));
		#$this->output->enable_profiler(TRUE);
	}

	public function BarangUpdate()
	{
        if(($this->input->post('id_barang')) && ($this->input->post('nama_barang')) && ($this->input->post('ruang')) && ($this->input->post('jenis'))){
            $barang = array(
				'nama_barang'		=> $this->input->post('nama_barang'),
				'spesifikasi'		=> $this->input->post('spesifikasi'),
				'ruang'		  		=> $this->input->post('ruang'),
				'kondisi' 			=> $this->input->post('kondisi'),
				'jenis_barang'		=> $this->input->post('jenis'),
            );
            $this->CRUD->update('barang', 'id_barang =' . $this->input->post('id_barang'), $barang);
			$this->session->set_flashdata("success", "true");
			echo '<script type="text/javascript">alert("Berhasil mengubah data!")</script>';
		} else {
			$this->session->set_flashdata("success", "false");
			echo '<script type="text/javascript">alert("Gagal mengubah data!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/barang'));
		#$this->output->enable_profiler(TRUE);
	}

	public function BarangHapus()
	{
        if($this->input->post('id_barang')){
            $this->CRUD->delete('barang', 'id_barang',$this->input->post('id_barang'));
			$this->session->set_flashdata("success", "true");
			echo '<script type="text/javascript">alert("Berhasil menghapus data!")</script>';
		} else {
			$this->session->set_flashdata("success", "false");
			echo '<script type="text/javascript">alert("Gagal mengubah data!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/barang'));
		#$this->output->enable_profiler(TRUE);
	}

	public function Peminjaman()
	{
		$data = array(
			'pageTitle'   	=> 'Peminjaman',
			'pageHeader'	=> 'Peminjaman',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/pinjam',
			'db'			=> array(
				'barang'	=> $this->CRUD->get_where('barang','jml_barang >','0'),
				'pegawai'	=> $this->CRUD->get('pegawai')
			)
		);

		$this->load->view('admin/base', $data);
	}

	public function Pinjam()
	{
        $kode = $this->CRUD->code('pinjam_barang','kode_pinjam','PJ');
        if($this->input->post('nip')){
            $pinjam = array(
                'kode_pinjam' => $kode,
                'tgl_pinjam'  => date('Y-m-d'),
                'kode_barang' => $this->input->post('kode_barang'),
                'peminjam'    => $this->input->post('nip')
            );
            $detail = array(
                'kode_pinjam' => $kode,
                'kode_barang' => $this->input->post('kode_barang'),
                'jumlah'      => $this->input->post('jml_barang'),
                'keterangan'  => $this->input->post('keterangan')
			);
            $this->CRUD->add('pinjam_barang', $pinjam);
            $this->CRUD->add('detail_pinjam', $detail);
            $jml = $this->CRUD->get_row_where('barang','kode_barang', $this->input->post('kode_barang'))->jml_barang - $this->input->post('jml_barang');
			$this->CRUD->update('barang', array('kode_barang' => $this->input->post('kode_barang')), array('jml_barang'=>$jml));
			echo '<script type="text/javascript">alert("Berhasil meminjam barang!")</script>';
        } else {
			echo '<script type="text/javascript">alert("Gagal meminjam barang!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Peminjaman'));
	}

	public function Pengembalian()
	{
		$data = array(
			'pageTitle'   	=> 'Pengembalian',
			'pageHeader'	=> 'Pengembalian',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/kembali',
			'db'			=> array(
				'barang'	=> $this->db->from('pinjam_barang')
										->join('detail_pinjam', 'pinjam_barang.kode_pinjam = detail_pinjam.kode_pinjam')
										->where('tgl_kembali',NULL)
										->order_by('tgl_pinjam','desc')
										->get()
										->result(),
				'pegawai'	=> $this->CRUD->get('pegawai')
			)
		);

		$this->load->view('admin/base', $data);
	}

	public function Kembali()
	{
        if($this->input->post('kode_pinjam')){
            $kembali = array(
                'tgl_kembali'  => date('Y-m-d H:i:s')
            );
            $pinjam = $this->CRUD->get_row_where('detail_pinjam', 'kode_pinjam', $this->input->post('kode_pinjam'));
            $this->CRUD->update('pinjam_barang', array('kode_pinjam' => $this->input->post('kode_pinjam')), $kembali);
            $jml = $this->CRUD->get_row_where('barang','kode_barang', $pinjam->kode_barang)->jml_barang + $pinjam->jumlah;
			$this->CRUD->update('barang', array('kode_barang' => $pinjam->kode_barang), array('jml_barang'=>$jml));
			echo '<script type="text/javascript">alert("Berhasil mengembalikan barang!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal mengembalikan barang!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Pengembalian'));
		#$this->output->enable_profiler(TRUE);
	}

	public function Rekap()
	{
		$data = array(
			'pageTitle'   	=> 'Rekap Data',
			'pageHeader'	=> 'Rekap Data',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/rekap'
		);

		$this->load->view('admin/base', $data);
	}

	public function Pegawai()
	{
		$data = array(
			'pageTitle'   	=> 'Pegawai',
			'pageHeader'	=> 'Pegawai',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/pegawai',
			'db'			=> array(
				'pegawai'	=> $this->CRUD->get('pegawai')
			)
		);

		$this->load->view('admin/base', $data);
	}

	public function PegawaiAdd()
	{
        if(($this->input->post('nip'))&&($this->input->post('nama_pegawai'))&&($this->input->post('alamat'))){
            $pegawai = array(
				'nip'  			=> $this->input->post('nip'),
				'nama_pegawai'	=> $this->input->post('nama_pegawai'),
				'alamat'		=> $this->input->post('alamat')
            );
            $this->CRUD->add('pegawai', $pegawai);
			echo '<script type="text/javascript">alert("Berhasil menambah data pegawai!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal menambah data pegawai!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Pegawai'));
		#$this->output->enable_profiler(TRUE);
	}

	public function PegawaiUpdate()
	{
        if(($this->input->post('id_pegawai'))&&($this->input->post('nip'))&&($this->input->post('nama_pegawai'))&&($this->input->post('alamat'))){
            $pegawai = array(
				'nip'  			=> $this->input->post('nip'),
				'nama_pegawai'	=> $this->input->post('nama_pegawai'),
				'alamat'		=> $this->input->post('alamat')
            );
            $this->CRUD->update('pegawai',  array('id_pegawai' => $this->input->post('id_pegawai')), $pegawai);
			echo '<script type="text/javascript">alert("Berhasil mengupdate data pegawai!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal mengupdate data pegawai!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Pegawai'));
		#$this->output->enable_profiler(TRUE);
	}

	public function PegawaiDelete()
	{
        if($this->input->post('id_pegawai')){
            $this->CRUD->delete('pegawai', 'id_pegawai', $this->input->post('id_pegawai'));
			echo '<script type="text/javascript">alert("Berhasil menghapus data pegawai!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal menghapus data pegawai!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Pegawai'));
		#$this->output->enable_profiler(TRUE);
	}

	public function Petugas()
	{
		$data = array(
			'pageTitle'   	=> 'Petugas',
			'pageHeader'	=> 'Petugas',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/petugas',
			'db'			=> array(
				'petugas'	=> $this->CRUD->get('petugas'),
				'level'		=> $this->CRUD->get('level')
			)
		);

		$this->load->view('admin/base', $data);
	}

	public function PetugasAdd()
	{
		$cekpegawai = $this->CRUD->checkdata('pegawai','nip',$this->input->post('username'));
		$cekpetugas = $this->CRUD->checkdata('petugas','username',$this->input->post('username'));
		if(($cekpegawai == '1')&&($cekpetugas == '1')&&($this->input->post('username'))&&($this->input->post('password'))&&($this->input->post('nama_petugas'))&&($this->input->post('level'))){
            $petugas = array(
				'username'		=> $this->input->post('username'),
				'password'		=> md5($this->input->post('password')),
				'id_level'		=> $this->input->post('level'),
				'nama_petugas'	=> $this->input->post('nama_petugas'),
				'ungeneratepass'=> $this->input->post('password')
            );
            $this->CRUD->add('petugas', $petugas);
			echo '<script type="text/javascript">alert("Berhasil menambah data petugas!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal menambah data petugas!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Petugas'));
		#$this->output->enable_profiler(TRUE);
	}

	public function PetugasUpdate()
	{
        if(($this->input->post('id_petugas'))&&($this->input->post('password'))&&($this->input->post('nama_petugas'))&&($this->input->post('level'))){
            $petugas = array(
				'password'		=> md5($this->input->post('password')),
				'id_level'		=> $this->input->post('level'),
				'nama_petugas'	=> $this->input->post('nama_petugas'),
				'ungeneratepass'=> $this->input->post('password')
            );
            $this->CRUD->update('petugas',  array('id_petugas' => $this->input->post('id_petugas')), $petugas);
			echo '<script type="text/javascript">alert("Berhasil mengupdate data petugas!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal mengupdate data petugas!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Petugas'));
		#$this->output->enable_profiler(TRUE);
	}

	public function PetugasDelete()
	{
        if($this->input->post('id_petugas')){
            $this->CRUD->delete('petugas', 'id_petugas', $this->input->post('id_petugas'));
			echo '<script type="text/javascript">alert("Berhasil menghapus data petugas!")</script>';
		} else {
			echo '<script type="text/javascript">alert("Gagal menghapus data petugas!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Petugas'));
		#$this->output->enable_profiler(TRUE);
	}
}