<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('CRUD');
    }
    
    function databarang(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'DATA BARANG PER TANGGAL ' . date('d M Y') ,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'Kode',1,0);
        $pdf->Cell(155,6,'Nama',1,0);
        $pdf->Cell(27,6,'Kategori',1,0);
        $pdf->Cell(25,6,'Banyak',1,0);
        $pdf->Cell(30,6,'Kondisi',1,1);
        $pdf->SetFont('Arial','',10);
        $p = $this->db->get_where('barang', array('status'=>1))->result();
        foreach ($p as $row){
            $pdf->Cell(20,6,$row->kode_barang,1,0);
            $pdf->Cell(155,6,$row->nama_barang,1,0);
            $pdf->Cell(27,6,$row->kategori,1,0);
            $pdf->Cell(25,6,$row->jml_barang,1,0); 
            $pdf->Cell(30,6,$row->kondisi,1,1); 
        }
        $pdf->Output();
    }
    function Pinjam(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'DATA PEMINJAMAN PER TANGGAL ' . $this->input->post('awal') ,0,1,'C');
        $pdf->Cell(280,7,'S/D TANGGAL ' . $this->input->post('akhir') ,0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Kode Pinjam',1,0);
        $pdf->Cell(50,6,'Peminjam',1,0);
        $pdf->Cell(50,6,'Barang',1,0);
        $pdf->Cell(35,6,'Tanggal Pinjam',1,0);
        $pdf->Cell(35,6,'Tanggal Kembali',1,0);
        $pdf->Cell(30,6,'Banyak',1,1);
        $pdf->SetFont('Arial','',10);
        $p = $this->db->from('pinjam_barang')
                        ->join('detail_pinjam', 'pinjam_barang.kode_pinjam = detail_pinjam.kode_pinjam')
                        ->order_by('tgl_pinjam','desc')
                        ->where('tgl_pinjam BETWEEN "'. date('Y-m-d', strtotime($this->input->post('awal'))). '" and "'. date('Y-m-d', strtotime($this->input->post('akhir'))).'"')
                        ->get()
                        ->result();
        foreach ($p as $row){
            $pdf->Cell(30,6,$row->kode_pinjam,1,0);
            $pdf->Cell(50,6,$this->CRUD->get_row_where('pegawai','nip', $row->peminjam)->nama_pegawai,1,0);
            $pdf->Cell(50,6,$this->CRUD->get_row_where('barang','kode_barang', $row->kode_barang)->nama_barang,1,0); 
            $pdf->Cell(35,6,date('d M Y', strtotime($row->tgl_pinjam)),1,0);
            $pdf->Cell(35,6,(isset($row->tgl_kembali)) ? date('d M Y', strtotime($row->tgl_kembali)) : 'Belum Dikembalikan',1,0);
            $pdf->Cell(30,6,$row->jumlah,1,1); 
        }
        $pdf->Output();
    }
}