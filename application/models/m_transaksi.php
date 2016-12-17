<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : M_transaksi
    Type : Models
*/
class m_transaksi extends CI_Model{
  public $id_transaksi;
  public $id_member;
  public $nama;
  public $tanggal;
  public $status;
  public $url_mou;
  public $keterangan;
  public $hashkey;
  public $id_paket;
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  /*
    used for get transaksi from database
  */
  public function load_transaksi(){
      if($this->id_transaksi===NULL && $this->hashkey===NULL){ // check whether had id_transksi or hashkey specified
          if($this->id_member === NULL && $this->status === NULL){  // load all paket
            $query = "select t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan, t.hashkey
            ,(select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi) as harga
            from transaksi t, member m
            where  m.id_member = t.id_member and m.id_member";
          }else if($this->status === NULL){ // load paket with specified id member
            $query = "
            select t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan, t.hashkey
            ,(select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi) as harga
            from transaksi t, member m
            where  m.id_member = t.id_member and m.id_member = '$this->id_member'";
          }else{ // load paket with specified status
            $query = "select t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan, t.hashkey
            ,(select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi) as harga
            from transaksi t, member m
            where  m.id_member = t.id_member and m.id_member and t.status = '$this->status'";
          }
          $data = $this->db->query($query);
        return $data->num_rows() > 0 ? $data->result() : NULL; // return array objects
      }else{ // hashkey or id_transaksi specified
        if($this->hashkey===NULL && $this->id_transaksi!=NULL){ // specified id_transaksi
          $query = "
          select distinct t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.keterangan,
          (select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi) as harga
          from transaksi t, member m
          where  m.id_member = t.id_member and t.id_transaksi=$this->id_transaksi";
        }else{ // load with hashkey
          $query = "
          select distinct t.id_transaksi, t.id_member ,t.nama as namapkt, m.nama as nama, t.tanggal, t.status, t.url_mou, t.hashkey, t.keterangan,
          (select sum(harga) as harga from detail_transaksi dt where dt.id_transaksi=t.id_transaksi) as harga
          from transaksi t, member m
          where  m.id_member = t.id_member and t.hashkey='$this->hashkey'";
        }
        $data = $this->db->query($query);
        return $data->num_rows() > 0 ? $data->row() : NULL;
      }
  }
  /*
    used for get detail transksi
  */
  public function load_detail_transaksi(){
  $query = "select * from detail_transaksi where id_transaksi=$this->id_transaksi ";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  /*
    used for sum all detail transaksi within single specified id_transaksi
  */
  public function sum_detail_transaksi(){
  $query = "select sum(harga) as harga from detail_transaksi where id_transaksi = $this->id_transaksi";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : NULL;
  }
  /*
    used for inserting new transaksi
  */
  public function insert_transaksi(){
    $tgl = time();
    $key = md5($this->id_member.$tgl); // defined hashkey
    $query = "insert into transaksi (id_member,id_paket,nama,status,hashkey) values ($this->id_member,$this->id_paket,'$this->nama','Belum Dikonfirmasi','$key')";
    $this->db->query($query);
    $query1 = "select id_transaksi from transaksi where hashkey = '$key'";
    $trans = $this->db->query($query1);
    $transaksi = $trans->row();
    $this->id_transaksi = $transaksi->id_transaksi;
    $query2 = "select * from detail_paket where id_paket = $this->id_paket";
    $detail = $this->db->query($query2);
    if($detail->num_rows()>0){
        $in_detail = $detail->result();
        foreach ($in_detail as $data) { // adding details transaction
          $query3 = "insert into detail_transaksi (id_transaksi,nama_barang,harga,jumlah) values
          ('$this->id_transaksi', '$data->nama_barang', $data->harga, $data->jumlah)";
          $this->db->query($query3);
        }
    }
  }
  /*
    used for changing status transaction, like confirmation, request or cancellation
  */
  public function change_status($status){
    $query = "update transaksi set status='$status' where id_transaksi=$this->id_transaksi";
    $this->db->query($query);
  }
  /*
    counting request transaction for notification purpose
  */
  public function count_unconfirmed(){
    $query = "select count(id_transaksi) as jumlah from transaksi where status ='Menunggu Persetujuan'";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->row() : null;
  }
}
