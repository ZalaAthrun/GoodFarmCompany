<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Akun
    Type : Controller
    Created for action login/logout for Member
*/
class akun extends CI_Controller{
  /*
    Constructor load class model (m_member)
  */
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_member','member');
  }
  /*
    index is default method access from Akun, redirect to login page if didnt logged in
    and redirect to user profil if member has been logged in
  */
  function index()
  {
    if($this->session->userdata('id_member') == null){ //check login state
        header("Location:".base_url()."index.php/akun/login");
    }else{
      $this->member->id_member = $this->session->userdata('id_member');
      $data = $this->member->load_member();
      $this->load->model('m_transaksi','transaksi'); // instance model m_transaksi
      $this->transaksi->id_member = $this->member->id_member;
      $data2 = $this->transaksi->load_transaksi();
      $container = array();
      $container ['data'] = $data;
      $container ['data2'] = $data2;
      $this->load->view('user_profil',$container);
    }
  }
  /*
    do_register used for processing register function after submitting register form
  */
  function do_register(){
    $this->member->email = $this->input->post('email');
    $this->member->nama = $this->input->post('nama');
    $this->member->password = $this->input->post('password');
    $this->member->alamat = $this->input->post('alamat');
    $this->member->no_telp = $this->input->post('no_telp');
    $this->member->level = 1;
    $this->member->tambah_member();
    header("Location:".base_url()."index.php/");
    $this->session->set_userdata('reg','true');
  }
  /*
    register used for displaying register form
  */
  function register(){
    if($this->session->userdata('id_member')!=null){ // check login state
      header("Location:".base_url()."index.php/");
    }else{
      $this->load->view('user_register');
    }
  }
  /*
    login used for displaying login form
  */
  function login(){
    $container = array();
    $container['state'] = $this->session->userdata('login') != null ? true : false;  //trigger notification if user input wrong email/pass
    $this->session->unset_userdata('login');
    $this->load->view('user_login',$container);
  }
  /*
    do_login() is used for processing login value from method login()
  */
  function do_login(){
    $this->member->email = $this->input->post('email');
    $this->member->password = $this->input->post('password');
    $member = $this->member->login_member();
    if($member->id_member != null){
      $this->session->set_userdata('id_member',$member->id_member);
      header("Location:".base_url()."index.php/");
    }else{
      $this->session->set_userdata('login','gagal');
      header("Location:".base_url()."index.php/akun/login");
    }
  }
  /*
    do_logout() is used for removing status logged in by delete session value
  */
  function do_logout(){
    $this->session->unset_userdata('id_member');
    header("Location:".base_url()."index.php/");
  }
  /*
    edit used for displaying edit form with prefilled in details member
  */
  function edit(){
    $this->member->id_member = $this->session->userdata('id_member'); // getting value from session
    $member = $this->member->load_member();
    $container = array();
    $container['member'] = $member;
    $this->load->view('user_edit_profil',$container);
  }
  /*
    simpan_perubahan using for processing update members after submit edit form
  */
  function simpan_perubahan(){
    $this->member->id_member = $this->session->userdata('id_member'); // getting value from session
    $this->member->nama = $this->input->post('nama');
    $this->member->alamat = $this->input->post('alamat');
    $this->member->no_telp = $this->input->post('no_telp');
    $this->member->simpan_perubahan();
    header("Location:".base_url()."index.php/akun");
  }

}
