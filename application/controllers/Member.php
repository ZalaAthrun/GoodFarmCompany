<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : Member
    Type : Controller
    Created for manage member from class model (m_member) in Administrator Page
*/
class member extends CI_Controller{
  /*
    Constructor check Admin auth and load class mode (m_member)
  */
  public function __construct()
  {
    parent::__construct();
    // check session
    if($this->session->userdata('admin_id_member')==null){
      header("Location:".base_url()."index.php/admin/login");
    }
    // model instance
    $this->load->model('m_member','member');
  }
  /*
    index is default method access from Member class, displaying all registered member
  */
  function index()
  {
    $data = $this->member->load_member();
    $container = array();
    $container ['data'] = $data;
    $this->load->view('admin_member',$container);
  }
  /*
    lihat_profil used for load detail profile with id defined in url Controller methods
    $id_member (type : int)
  */
  function lihat_profil($id_member){
    $this->member->id_member = $id_member;
    $data = $this->member->load_member();
    $container = array();
    $container ['data'] = $data;
    $this->load->view('admin_lihat_profil',$container);
  }
  /*
    hapus used for delete registered user with id defined in url Controller methods
    $id_member (type : int)
  */
  function hapus($id_member){
   $this->member->id_member = $id_member;
   $this->member->hapus_member();
   header("Location:".base_url()."index.php/member");
  }

}
