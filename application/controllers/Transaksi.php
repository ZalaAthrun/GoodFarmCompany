<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Transaksi
    Type : Controller
    Created for manage transaksi from class model (m_transaksi) in Administrator Page
*/
class transaksi extends CI_Controller{
  /*
    Constructor check Admin auth and load class model (m_transaksi)
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_transaksi','transaksi'); // instance model m_transaksi
    if($this->session->userdata('admin_id_member')==null){ // check login state
      header("Location:".base_url()."index.php/admin/login");
    }
  }
  /*
    index is default method access from Paket class, displaying all Transaction
  */
  function index()
  {
      $data = $this->transaksi->load_transaksi();
      $container = array();
      $container['data'] = $data;
      $this->load->view('admin_transaksi',$container);
  }
  /*
    transaksi_masuk used for displaying transaction with status Menunggu Persetujuan
  */
  function transaksi_masuk(){
    $this->transaksi->status = "Menunggu Persetujuan";
    $data = $this->transaksi->load_transaksi();
    $container = array();
    $container['data'] = $data;
    $this->load->view('admin_transaksi',$container);
  }
  /*
    edit_paket used for displaying detail transaction with id defined in Cntroller url
    $id(type : int)
  */
  function detail($id){
      $this->transaksi->id_transaksi = $id;
      $data = $this->transaksi->load_transaksi();
      $data2= $this->transaksi->load_detail_transaksi();
      $container = array();
      $container['transaksi'] = $data;
      $container['detail'] = $data2;
      $this->load->view('admin_detail_transaksi',$container);
  }
  /*
    konfirmasi used for accept request transaction with id defined in Controller url
  */
  function konfirmasi($id){
      $this->transaksi->id_transaksi = $id;
      $this->transaksi->change_status("Dikonfirmasi");
      header("Location:".base_url()."index.php/transaksi/detail/".$id);
  }

}
