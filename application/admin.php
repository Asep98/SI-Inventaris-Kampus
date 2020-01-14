<?php
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
				array('Petugas','fa-users','admin/Petugas'),
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
	public function PegawaiAdd()
	{
        if(($this->input->post('nip'))&&($this->input->post('nama_pegawai'))&&($this->input->post('alamat'))&&($this->input->post('password'))){
            $pegawai = array(
				'nip'  				=> $this->input->post('nip'),
				'nama_pegawai'		=> $this->input->post('nama_pegawai'),
				'alamat'			=> $this->input->post('alamat'),
				'password'			=> md5($this->input->post('password')),
				'ungenerate_pass'	=> $this->input->post('password')
            );
            if ($this->CRUD->checkdata('pegawai','nip=',$this->input->post('nip'))) {
            	echo '<script type="text/javascript">alert("NIP telah terdaftar!")</script>';
            }else{
            	if (($this->CRUD->checkdata('pegawai','password=',md5($this->input->post('password'))))||($this->CRUD->checkdata('petugas','password=',md5($this->input->post('password'))))) {
            		echo '<script type="text/javascript">alert("password telah digunakan!")</script>';
            	}else{
	            	$this->CRUD->add('pegawai', $pegawai);
	            	echo '<script type="text/javascript">alert("Berhasil menambah data pegawai!")</script>';
            	}
            }
		} else {
			echo '<script type="text/javascript">alert("Gagal menambah data pegawai!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/Pegawai'));
		#$this->output->enable_profiler(TRUE);
	}
public function Petugas(){
		$data = array(
			'pageTitle'   	=> 'Petugas',
			'pageHeader'	=> 'Petugas',
			'menu'			=> $this->menu(),
			'pageContent' 	=> 'admin/Petugas',
			'db'			=> array(
				'petugas'	=> $this->CRUD->get('petugas'),
				'level'		=> $this->CRUD->get('level')
			)
		);

		$this->load->view('admin/base', $data);
	}
	public function PetugasAdd(){
		if (($this->input->post('nama_petugas'))&&($this->input->post('username'))&&($this->input->post('password'))&&($this->input->post('level'))) {
			$data = array(
				'nama_petugas' 	=> $this->input->post('nama_petugas'),
				'username'		=> $this->input->post('username'),
				'password'		=> md5($this->input->post('password')),
				'id_level'			=> $this->input->post('level')
			);
			$this->CRUD->add('petugas',$data);
			$this->session->set_flashdata("success","true");
			echo '<script type="text/javascript">alert("Berhasil menambah data!")</script>';
		}
		else{
			$this->session->set_flashdata("success","false");
			echo '<script type="text/javascript">alert("Berhasil menambah data!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/petugas'));
	}
	public function PetugasDelete(){
		if (($this->input->post('id_petugas'))) {
			$this->CRUD->delete('petugas','id_petugas',$this->input->post('id_petugas'));
			$this->session->set_flashdata("success","true");
			echo '<script type="text/javascript">alert("Berhasil menghapus data!")</script>';
		}
		else{
			$this->session->set_flashdata("success","false");
			echo '<script type="text/javascript">alert("Berhasil menghapus data!")</script>';
		}
		header("Refresh:1; url=".base_url('admin/petugas'));
	}