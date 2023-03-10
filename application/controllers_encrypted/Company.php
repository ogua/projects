<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {
            //
        } else {


            redirect(base_url() . 'users/login');

        }

    }


    // company detail form

    public function add_company()
    {

        //print_r($data);

        $this->header();

        $this->load->view('company/add_company');

        $this->footer();

    }

    public function list_company()
    {

        $data['company'] = $this->general->fetch_records("company");
        $this->header();
        $this->load->view('company/list_company', $data);
        $this->footer();


    }

    public function insert_company()
    {
        $data = array(
            'company_name' => $this->input->post("company_name"),
            'phone_no' => $this->input->post("phone_no"),
            'fax_no' => $this->input->post("fax_no"),
            'email' => $this->input->post("email"),
        );

        /*echo "<pre>";
        print_r($data);
        exit;*/
        $this->load->model('main_model');
        $response = $this->main_model->add_record('company', $data);
        if ($response) {
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect(base_url() . 'index.php/company/list_company');
        }
    }


    public function update_company()
    {
        $comp_id = $this->input->post('cid');

        $comp_info = array(
            'company_name' => $this->input->post('company_name'),
            'phone_no' => $this->input->post('phone_no'),
            'fax_no' => $this->input->post('fax_no'),
            'email' => $this->input->post('email')
        );

        $where = array('company_id' => $comp_id);
        $this->load->model('main_model');
        $response = $this->main_model->update_record('company', $comp_info, $where);
        if ($response) {
            $this->session->set_flashdata('update', 'Record Updated Successfully..!');
            redirect(base_url() . 'index.php/company/list_company');
        }
    }


    public function pos()
    {
        $this->header();
        $this->load->view('pos/pos');
        $this->footer();

    }
}

?>
