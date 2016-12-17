<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Paket
    Type : Controller
    Created for manage member from class model (m_paket) in Administrator Page
*/
class paket extends CI_Controller{
  /*
    Constructor check Admin auth and load class model (m_paket)
  */
  public function __construct()
  {
    parent::__construct();
    // check session
    $this->load->model('m_paket', 'paket');
    // model instance
    if($this->session->userdata('admin_id_member')==null){
      header("Location:".base_url()."index.php/admin/login");
    }
  }
  /*
    index is default method access from Paket class, displaying all Paket Penjualan
  */
  function index()
  {
      $data = $this->paket->load_paket();
      $container = array();
      $container ['data'] = $data;
      $this->load->view('admin_paket',$container);
  }
  /*
    method do_tambah_paket used for processing add paket from method tambah_paket()
  */
  function do_tambah_paket(){
      $this->paket->nama = $this->input->post('nama');
      $this->paket->keterangan = $this->input->post('keterangan');
      $this->paket->tambah_paket();
      $id = $this->paket->get_last_id();
      header("Location: ".base_url()."index.php/paket/edit_paket/".$id);
  }
  /*
    method tambah_paket displaying form penambahan paket
  */
  function tambah_paket(){
      $this->load->view('admin_tambah_paket');
  }
  /*
    edit_paket used for displaying detail paket with id defined in Cntroller url
    $id_paket(type : int)
  */
  function edit_paket($id_paket){
      $this->paket->id_paket = $id_paket;
      $data = $this->paket->load_paket();
      $data_detail = $this->paket->load_detail_paket();
      $container = array();
      $container['data'] = $data;
      $container['detail'] = $data_detail;
      $this->load->view('admin_edit_paket',$container);
  }
  /*
    update_paket used for processing update paket from edit_paket form
  */
  function update_paket(){
      $this->paket->id_paket = $this->input->post('id_paket');
      $this->paket->nama = $this->input->post('nama');
      $this->paket->keterangan = $this->input->post('keterangan');
      $this->paket->stok = $this->input->post('stok');
      $this->paket->update_paket();
      header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
  }
  /*
    tambah_barang used for processing add barang from edit_paket form
  */
  function tambah_barang(){
     $this->paket->id_paket = $this->input->post('id_paket');
     $nama = $this->input->post('nama');
     $harga = $this->input->post('harga');
     $jumlah = $this->input->post('jumlah');
     $keterangan = $this->input->post('keterangan');
     $stok = $this->input->post('stok');
     $this->paket->tambah_detail_paket($this->paket->id_paket,$nama,$harga,$jumlah,$stok,$keterangan);
     $this->paket->refresh_total($this->paket->id_paket);
     header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
  }
  /*
    hapus used for delete paket and all details paket with id defined in url Controller methods
    $id_paket (type : int)
    $id_barang (type : int)
  */
  function hapus_barang($id_barang,$id_paket){
    $this->paket->id_paket = $id_paket;
    $this->paket->hapus_detail($id_barang);
    $this->paket->refresh_total();
    header("Location: ".base_url()."index.php/paket/edit_paket/".$this->paket->id_paket);
  }


}
