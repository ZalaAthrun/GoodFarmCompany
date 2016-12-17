<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Home
    Type : Default Controller
    Created for Homepage System
*/
class home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  /*
    display homepage goodfarmcompany
  */
  function index()
  {
      if($this->session->userdata('reg')==null){ //check trigger notification for register event
        $register = false;
      }else{
        $register = true;
        $this->session->unset_userdata('reg');
      }
      $this->load->model('m_paket'); // instance model m_paket
      $paket = $this->m_paket->load_paket();
      $barang = $this->m_paket->load_detail();
      $container = array();
      $container['paket'] = $paket;
      $container['barang'] = $barang;
      $container['state'] = $register;
      $this->load->view('user_home', $container);
  }
  function tentang(){
        $this->load->view('user_tentang_kami');
  }

}
