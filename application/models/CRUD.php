<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*

MODEL FUNGSI UNTUK CRUD DATABASE

*/
class CRUD extends CI_Model {
    public function get($tb) # Mengambil keseluruhan data
    {
        $query = $this->db->get($tb);
        return $query->result();
    }
    public function get_order($tb, $order, $sort) # Mengambil data dengan urut terlebih dahulu
    {
        if (!$sort) $sort = 'asc';
        $query = $this->db->order_by($order,$sort)->get($tb);
        return $query->result();
    }
    public function get_where($tb, $cond, $val) # Mengambil data dengan kondisi
    {
        $query = $this->db->from($tb)->where($cond,$val)->get();
        return $query->result();
    }
    public function get_row_where($tb, $cond, $val) # Mengambil data dengan kondisi (1 rows)
    {
        $query = $this->db->from($tb)->where($cond,$val)->get();
        return $query->row();
    }
    public function add($tb, $data) # Tambah data
    {
        $this->db->insert($tb,$data);
        return $this->db->insert_id();
    }
    public function update($tb, $cond, $data) # Update data
    {
        $this->db->update($tb,$data,$cond);
        return $this->db->affected_rows();
    }
    public function delete($tb, $cond, $data) # Hapus data
    {
        $this->db->where($cond,$data)->delete($tb);
        return $this->db->affected_rows();
    }
    public function code($tb, $code, $prefix) # Generate Kode
    {
        $this->db->select('RIGHT('.$tb.'.'.$code.',3) AS code', false)->order_by($code,'desc')->limit(1);
        $q = $this->db->get($tb);
        if ($q->num_rows()<>0) {
            $data = $q->row();
            $num  = intval($data->code)+1;
        } else { $num=1; }

        $gencode = str_pad($num,3,'0',STR_PAD_LEFT);
        $kode = $prefix.$gencode;
        return $kode;
    }

    public function checkdata($tb,$cond,$val) # Cek Data
    {
        $query = $this->db->from($tb)->where($cond,$val)->get();
        if($query->num_rows() == 0){
            return '1';
        } else {
            return '0';
        }
    }

    public function limitpinjam($nip){
        $limit = 3;
        $date = date('Y-m-d H:i:s');
        $query = $this->db->from('pinjam_barang')->where(array('peminjam' => $nip, 'tgl_pinjam' => $date, 'tgl_kembali' => 'NULL'))->get();
        if($query->num_rows() < $limit){
            return '1';
        }
        else {
            return '0';
        }
    }
}