<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Classname : M_member
    Type : Models
*/
class m_member extends CI_Model{
  public $id_member;
  public $email;
  public $password;
  public $nama;
  public $alamat;
  public $no_telp;
  public $level;
  public function __construct()
  {
    parent::__construct();
  }
  /*
    used for get member from database
  */
  public function load_member(){
   // selection whether get all members or single member
  if($this->id_member===NULL){ //specified id
  $query = "select * from member";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->result() : NULL;
  }else{ // load all member
  $query = "select * from member where id_member = $this->id_member";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : NULL;
  }
  }
  /*
    used for deleting member in specified id
  */
  public function hapus_member(){
  $query = "delete from member where id_member = $this->id_member";
  $this->db->query($query);
  }
  /*
    used for auth admin login
  */
  public function login_admin(){
  $query = "select id_member from member where email = '$this->email' and password = '$this->password' and level = 0";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : null;
  }
  /*
    used for auth member login
  */
  public function login_member(){
  $query = "select id_member from member where email = '$this->email' and password = '$this->password' and level = 1";
  $data = $this->db->query($query);
  return $data->num_rows() > 0 ? $data->row() : null;
  }
  /*
    used for add new member (registration-related function)
  */
  public function tambah_member(){//done
  $query = "insert into member (email,password,nama,no_telp,alamat,level)
  values ('$this->email','$this->password','$this->nama','$this->no_telp','$this->alamat','$this->level')";
  $this->db->query($query);
  }
  /*
    used for update member with specified id
  */
  public function simpan_perubahan(){
  $query = "update member set nama = '$this->nama', alamat = '$this->alamat', no_telp = '$this->no_telp'
    where id_member = $this->id_member";
  $this->db->query($query);
  }

}
