<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : M_paket
    Type : Models
*/
class m_paket extends CI_Model{
  public $id_paket;
  public $nama;
  public $keterangan;
  public $stok;
  public function __construct()
  {
    parent::__construct();
  }
  /*
    used for get paket from database
  */
  public function load_paket(){
   // selection whether get all members or single paket
    if($this->id_paket===NULL){ // unspecified id
      $query = "Select * from paket";
      $data = $this->db->query($query);
      return $data->num_rows() > 0 ? $data->result() : NULL;
    }else{ // specified id
      $query = "select * from paket where (id_paket = '$this->id_paket')";
      $data = $this->db->query($query);
      return $data->num_rows() > 0 ? $data->row() : NULL;
    }
  }
  /*
    used for get detail paket from database
  */
  public function load_detail(){
    $query = "Select * from detail_paket";
    $data = $this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  /*
    used for add new paket
  */
  public function tambah_paket(){
    $query = "insert into paket (nama,keterangan) values('$this->nama','$this->keterangan')";
    $data = $this->db->query($query);
  }
  /*
    used for get last id paket
  */
  public function get_last_id(){
    $query = "select max(id_paket) as last from paket";
    $data = $this->db->query($query);
    $last = $data->num_rows() > 0 ? $data->row() : 0;
    return $data->num_rows() > 0 ? $last->last : 0;
  }
  /*
    used for update paket with specified id
  */
  public function update_paket(){
    $query = "update paket set nama = '$this->nama', keterangan = '$this->keterangan', stok = '$this->stok' where id_paket = '$this->id_paket'";
    $this->db->query($query);
  }
  /*
    used for add new detail paket
  */
  public function tambah_detail_paket($id_paket,$nama,$harga,$jumlah,$stok,$keterangan){
    $query = "insert into detail_paket (id_paket, nama_barang, harga, jumlah, stok, keterangan)
    values ('$id_paket','$nama','$harga','$jumlah', '$stok', '$keterangan')";
    $this->db->query($query);
  }
  /*
    used for get detail paket from database
  */
  public function load_detail_paket(){
    $query = "select * from detail_paket where id_paket = $this->id_paket";
    $data=$this->db->query($query);
    return $data->num_rows() > 0 ? $data->result() : NULL;
  }
  /*
    used for sum harga paket from detail paket
  */
  public function load_harga_paket(){
    $query = "select sum(harga) as total from detail_paket where id_paket = $this->id_paket";
    $data=$this->db->query($query);
    return $data->num_rows() > 0 ? $data->row() : NULL;
  }
  /*
    used for delete detail paket
  */
  public function hapus_detail($id_barang){
    $query = "delete from detail_paket where id_barang ='$id_barang'";
    $this->db->query($query);
  }
  /*
    used for get refresh harga paket
  */
  public function refresh_total(){
    $query = "update paket
    set harga = (select sum(harga) from detail_paket where id_paket='$id_paket')
    where id_paket = '$this->id_paket'";
    $this->db->query($query);
  }

}
