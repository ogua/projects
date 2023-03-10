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

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property General General
 */
//Extending all Controllers from Core Controller (MY_Controller)
class Parameters extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_id')) {
            //
        } else {


            redirect(base_url() . 'index.php/users/login');

        }
    }

    //Add Department....
    public function add_department()
    {

        $this->header();
        $data['departments'] = $this->General->fetch_records("department");
        $this->load->view('parameters/add_department', $data);
        $this->footer();
    }

    // Creating new Department
    public function create_department()
    {
        $data = array(
            "department" => $department,
            "prefix" => $prefix,
            "status"=>1
        );
        $this->General->create_record($data, "department");
        $this->session->set_flashdata('msg', 'Department Added Successfully');
        redirect(base_url() . 'index.php/parameters/add_department');
    }


    //Edit Department....
    public function edit_department($id)
    {
        $group['edits'] = $this->db->get_where('department',array('iddepartment'=>$id))->row();
        $this->header();
        $this->load->view('parameters/edit_department', $group);
        $this->footer();
    }

    //Update Group......
    public function update_department()
    {
        $dep_name = $this->input->post('department');
        $dep_id = $this->input->post('department_id');
        $prefix= $this->input->post('prefix');
        $data = array('department'=>$dep_name,'prefix'=>$prefix);
        $where = array('iddepartment'=>$dep_id);
        $this->db->update('department',$data, $where);

        redirect(base_url().'index.php/Parameters/add_department');
    }

    //Add File Type....
    public function add_file_type()
    {

        $this->header();
        $data['fileTypes'] = $this->General->fetch_records("filetype");
        $this->load->view('parameters/add_file_type', $data);
        $this->footer();
    }

    // Creating new File Type
    public function create_file_type()
    {
        extract($_POST);
        $data = array(
            "filetype" => $filetype,
            "status"=>1
        );
        $this->General->create_record($data, "filetype");
       // echo $this->db->last_query();exit;
        $this->session->set_flashdata('msg', 'File Type Added Successfully');
        redirect(base_url() . 'index.php/parameters/add_file_type');
    }

    //Edit Department....
    public function edit_file_type($id)
    {
        $group['edits'] = $this->db->get_where('filetype',array('idfiletype'=>$id))->row();
        $this->header();
        $this->load->view('parameters/edit_file_type', $group);
        $this->footer();
    }

    //Update Group......
    public function update_file_type()
    {
        $dep_name = $this->input->post('department');
        $dep_id = $this->input->post('department_id');
        $data = array('filetype'=>$dep_name);
        $where = array('idfiletype'=>$dep_id);
        $this->db->update('filetype',$data, $where);

        redirect(base_url().'index.php/Parameters/add_file_type');
    }


    //Add File Status....
    public function add_file_status()
    {

        $this->header();
        $data['filestatuses'] = $this->General->fetch_records("filestatus");
        $this->load->view('parameters/add_file_status', $data);
        $this->footer();
    }

    // Creating new File Status
    public function create_file_status()
    {
        extract($_POST);
        $data = array(
            "filestatus" => $filestatus,
            "status"=>1
        );
        $this->General->create_record($data, "filestatus");
        $this->session->set_flashdata('msg', 'File Status Added Successfully');
        redirect(base_url() . 'index.php/parameters/add_file_status');
    }


    //Edit Department....
    public function edit_file_status($id)
    {
        $group['edits'] = $this->db->get_where('filestatus',array('idfilestatus'=>$id))->row();
        $this->header();
        $this->load->view('parameters/edit_file_status', $group);
        $this->footer();
    }

    //Update Group......
    public function update_file_status()
    {
        $dep_name = $this->input->post('department');
        $dep_id = $this->input->post('department_id');
        $data = array('filestatus'=>$dep_name);
        $where = array('idfilestatus'=>$dep_id);
        $this->db->update('filestatus',$data, $where);

        redirect(base_url().'index.php/Parameters/add_file_status');
    }


    //Add Department....
    public function add_designation()
    {

        $this->header();
        $data['departments'] = $this->General->fetch_records("designation");
        $this->load->view('parameters/add_designation', $data);
        $this->footer();
    }

    // Creating new Department
    public function create_designation()
    {
        $data = array(
            "department" => $department,
            "prefix" => $prefix,
            "status"=>1
        );
        $this->General->create_record($data, "department");
        $this->session->set_flashdata('msg', 'Department Added Successfully');
        redirect(base_url() . 'index.php/parameters/add_department');
    }

    //Edit Department....
    public function edit_designation($id)
    {
        $group['edits'] = $this->db->get_where('designation',array('iddesignation'=>$id))->row();
        $this->header();
        $this->load->view('parameters/edit_designation', $group);
        $this->footer();
    }

    //Update Group......
    public function update_designation()
    {
        $dep_name = $this->input->post('department');
        $dep_id = $this->input->post('department_id');
        $data = array('designation'=>$dep_name);
        $where = array('iddesignation'=>$dep_id);
        $this->db->update('designation',$data, $where);

        redirect(base_url().'index.php/Parameters/add_designation');
    }

    public function delete_designation($id)
    {
        $this->db->delete('designation',array('iddesignation'=>$id));
        redirect(base_url().'index.php/Parameters/add_designation');
    }

    public function delete_department($id)
    {
        $this->db->delete('department',array('iddepartment'=>$id));
        redirect(base_url().'index.php/Parameters/add_department');
    }
    public function delete_file_type($id)
    {
        $this->db->delete('filetype',array('idfiletype'=>$id));
        redirect(base_url().'index.php/Parameters/add_file_type');
    }
    public function delete_file_status($id)
    {
        $this->db->delete('filestatus',array('idfilestatus'=>$id));
        redirect(base_url().'index.php/Parameters/add_file_status');
    }



}

?>
