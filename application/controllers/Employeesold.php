<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
 *	@author : BEB300
 *  @support: support@beb300.com
 *	date	: 18 October, 2017
 *	Kandi User Management System
 *	http://www.beb300.com
 *  version: 1.0
 */

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property Main_model Main_model
 */
//Extending all Controllers from Core Controller (MY_Controller)
class Employees extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {

        } else {
            redirect(base_url() . 'index.php/users/login');

        }

    }

    // A view function for add new employee
    public function add_employee()
    {
        $this->header();

        $this->load->view('employee/add_employee');

        $this->footer();

    }

    // Adding new employees
    public function insert_employee()
    {
        $uploaddir = "uploads/images/";
        if ($_FILES['file_picture']['name'] != '') {

            $data_upload = $uploaddir . basename($_FILES['file_picture']['name']);
            if (move_uploaded_file($_FILES['file_picture']['tmp_name'], $data_upload)) {

                $picture = $data_upload;
            } else {
                $picture = '';


            }
        } else {

            $picture = 'uploads/images/no_avatar.jpg';
        }


        extract($_POST);

        $this->load->model('Main_model');
        $record = $this->Main_model->fetch_maxid("employee_profile");
        foreach ($record as $record) {

            $Maxtype = $record->EMP_ID;
        }
        $EMP_ID = $Maxtype + 1;
        $user_id = $this->session->userdata('user_id');
        $data = array(
            
            'EMP_NAME' => $emp_name,
            'EMP_EMAIL' => $fname,
            'EMP_ADDRESS' => $curr_address,
            'EMP_GENDER' => $per_address,
            'EMP_PHONE' => $contact_no,
            'EMP_CELL' => $mobile_no,
            'EMP_DATE' => date('Y-m-d'),
            'CREATED_DATE' => date('Y-m-d'),
            'CREATED_USERID' => $user_id

        );
        if ($picture != '') {

            $data['EMP_PIC'] = $picture;
        }

        $this->db->insert('employee_profile', $data);
      //  echo $this->db->last_query();exit;
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert"
      aria-hidden="true">
      &times;
   </button>
   <span>Record added Successfully..!</span>
</div>');
        redirect(base_url() . 'index.php/employees/employee_list');


    }

    // Updating employee information
    public function update_employee()
    {
        extract($_POST);

        $data = array(
            'EMP_NAME' => $emp_name,
            'EMP_EMAIL' => $emp_email

        );

        $where = array('EMP_ID' => $emp_id);
        $this->db->update('employee_profile', $data, $where);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert"
      aria-hidden="true">
      &times;
   </button>
   <span>Record Updated Successfully..!</span>
</div>');

        redirect(base_url() . 'index.php/employees/employee_list');


    }

    // List of all employees
    public function employee_list()
    {
        $data['employees'] = $this->General->fetch_records("employee_profile");
        $this->header($title = 'Employees List');
        $this->load->view('employee/employee_list', $data);
        $this->footer();

    }
    // Employee details
    public function employee_detail()
    {
        $id = $this->uri->segment(3);
        $where = array('EMP_ID' => $id);
        $this->header();
        $data['empDetail'] = $this->Main_model->single_row('employee_profile', $where, 's');
        $this->load->view('employee/emp_details', $data);
        $this->footer();
    }
    // Edit employee form
    public function edit_employee($id)
    {
       $data['record'] = $this->General->select_where('employee_profile',array('EMP_ID'=>$id));
        $this->header();
        $this->load->view('employee/edit_employee',$data);
        $this->footer();

    }

}