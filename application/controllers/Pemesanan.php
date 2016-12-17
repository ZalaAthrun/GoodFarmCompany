<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Pemesanan
    Type : Controller
    Created for handling any transaction-related function in front end
*/
class pemesanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  /*
    index is default method access from Paket class, displaying all Paket Penjualan
  */
  function index()
  {
    $this->load->model('m_paket','paket'); // instance model m_paket
    $paket = $this->paket->load_paket();
    $barang = $this->paket->load_detail();
    $container = array();
    $container['paket'] = $paket;
    $container['barang'] = $barang;
    $this->load->view('user_pemesanan', $container);
  }
  /*
    detail used for displaying details transaction using hashkey
    hash (type:String)
  */
  function detail($hash){
    $this->load->model('m_transaksi','transaksi'); // instance model m_transaksi
    $this->transaksi->hashkey = $hash;
    $transaksi = $this->transaksi->load_transaksi();
    $this->transaksi->id_transaksi = $transaksi->id_transaksi;
    $detail = $this->transaksi->load_detail_transaksi();
    $total = $this->transaksi->sum_detail_transaksi();
    $container = array();
    $container ['transaksi'] = $transaksi;
    $container ['detail'] = $detail;
    $container ['total'] = $total->harga;
    $this->load->view('user_confirm_transaksi',$container);
  }
  /*
    detail used for confirming transaction using hashkey
    hash (type:String)
  */
  function confirm($hash){
    $this->load->model('m_transaksi','transaksi'); // instance model m_transaksi
    $this->transaksi->hashkey = $hash;
    $transaksi = $this->transaksi->load_transaksi();
    $this->transaksi->id_transaksi = $transaksi->id_transaksi;
    $this->transaksi->change_status("Menunggu Persetujuan");
    header("Location:".base_url()."index.php/akun/");
  }
  /*
    paket used for displaying details paket with id defined in Cntroller url
  */
  function paket($id_paket){
      $this->load->model('m_paket','paket');
      $this->paket->id_paket = $id_paket;
      $paket = $this->paket->load_paket();
      $detail = $this->paket->load_detail_paket($id_paket);
      $total = $this->paket->load_harga_paket();
      $container = array();
      $container ['paket'] = $paket;
      $container ['detail'] = $detail;
      $container ['total'] = $total->total;
      $this->load->view('user_detail_paket',$container);
  }
  /*
    do_pemesanan used for apply transaction/buying package
    id_paket(type:int)
    nama(type:String)
  */
  function do_pemesanan($id_paket,$nama){
    if($this->session->userdata('id_member') == null){ // check login state, user must be logged in to doing any transaction
        header("Location:".base_url()."index.php/akun/login");
    }else{
         $this->load->model('m_transaksi','transaksi'); // instance model m_transaksi
         $this->transaksi->$nama = $nama;
         $this->transaksi->id_member = $this->session->userdata('id_member'); // getting id value from session
         $this->transaksi->id_paket = $id_paket;
         $this->transaksi->insert_transaksi();
        header("Location:".base_url()."index.php/akun/");
    }
  }
}
