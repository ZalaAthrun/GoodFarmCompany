<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Admin
    Type : Controller
    Created for action login/logout for administratr
*/
class admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  /*
    index is default method access from Admin,  redirect to menu transaksi if user logged in
  */
  function index()
  {
      //check session
      if($this->session->userdata('admin_id_member')==null){
        header("Location:".base_url()."index.php/admin/login");
      }else{
        header("Location:".base_url()."index.php/transaksi/");
      }
  }
  /*
    login is used for displaying login page, redirect to index if user has logged in
  */
  function login(){
      // check session
      if($this->session->userdata('admin_id_member')!=null){
        header("Location:".base_url()."index.php/admin");
      }else{
        $container = array();
        $container['state'] = $this->session->userdata('login') != null ? true : false; //trigger notification if user input wrong email/pass
        $this->session->unset_userdata('login');
        $this->load->view("admin_login",$container);
      }
  }
  /*
    do_login() is used for processing login value from method login()
  */
  function do_login(){
    $this->load->model('m_member','member');
    $this->member->email = $this->input->post('email');
    $this->member->password = $this->input->post('password');
    $member = $this->member->login_admin();
    if($member->id_member != null){ //check whether email/password are correct
      $this->session->set_userdata('admin_id_member',$member->id_member);
      header("Location:".base_url()."index.php/admin");
    }else{ // if email/password are incorrect, then member must be null value
      $this->session->set_userdata('login',true);
      header("Location:".base_url()."index.php/admin/login");
    }
  }
  /*
    do_logout() is used for removing status logged in by delete session value
  */
  function do_logout(){
    $this->session->unset_userdata('admin_id_member');
    header("Location:".base_url()."index.php/admin/login");
  }

}
