<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *      @author : BEB300
 *  @support: support@beb300.com
 *      date    : 18 October, 2017
 *      Kandi User Management System
 *      http://www.beb300.com
 *  version: 1.0
 */

class User extends CI_Model
{

    function index()
    {

    }

    // auth login
    public function AuthLogin($email, $password)
    {
        $pass = sha1($password);
        $this->db->select("*");
        $this->db->from('usr_user as u');
        //$this->db->where('u.idemployee = e.idemployee');
       // $this->db->where('e.iddepartment = d.iddepartment');
       // $this->db->where('e.iddesignation = g.iddesignation');
       // $this->db->where('e.idsection = s.idsection');
        $this->db->where('u.USER_NAME', $email);
        $this->db->where('u.U_PASSWORD', $pass);
        $this->db->where('u.IS_ACTIVE', '1');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->first_row('array');
    }

    //logout
    public function logout()
    {

        $this->session->sess_destroy();

        redirect(base_url());
    }

    //users list
    public function usersList()
    {
        $this->db->select("*");
        $this->db->from("usr_user as u, usr_group as g");
        $this->db->where("u.GROUP_ID = g.GROUP_ID");
        $query = $this->db->get();
        return $query->result();
    }

}

?>
