<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('CRUD');
        if ($this->session->userdata('status')!="Peminjam"){
            redirect('Front');
        }
    }
    
	public function peminjaman()
	{
        $kode = $this->CRUD->code('pinjam_barang','kode_pinjam','PJ');
        if ($this->CRUD->limitpinjam($this->session->userdata('nip_peminjam')) != '0'){
            if($this->input->post('jml_pinjam')){
                $pinjam = array(
                    'kode_pinjam' => $kode,
                    'tgl_pinjam'  => date('Y-m-d H:i:s'),
                    'kode_barang' => $this->input->post('kode_barang'),
                    'peminjam'    => $this->session->userdata('nip_peminjam')
                );
                $detail = array(
                    'kode_pinjam' => $kode,
                    'kode_barang' => $this->input->post('kode_barang'),
                    'jumlah'      => $this->input->post('jml_pinjam'),
                    'keterangan'  => $this->input->post('keterangan')
                );
                $this->CRUD->add('pinjam_barang', $pinjam);
                $this->CRUD->add('detail_pinjam', $detail);
                $jml = $this->CRUD->get_row_where('barang','kode_barang', $this->input->post('kode_barang'))->jml_barang - $this->input->post('jml_pinjam');
                $this->CRUD->update('barang', array('kode_barang' => $this->input->post('kode_barang')), array('jml_barang'=>$jml));
                $this->session->set_flashdata("success", "true");
                redirect('Front/Done');
                #$this->output->enable_profiler(TRUE);
            }
        } else {
            echo '<script type="text/javascript">alert("Batas peminjaman hari ini telah mencapai maksimum!")</script>';
            header("Refresh:1; url=".base_url());
            #$this->output->enable_profiler(TRUE);
        }
	}

}