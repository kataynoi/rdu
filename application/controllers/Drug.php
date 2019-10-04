<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drug extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('drug_layout');
        $this->load->model('Admin_drug_opd_model', 'crud');
    }

    public function index($hospcode,$didstd)
    {
        $data['didstd'] = $didstd;
        $data['hospcode'] = $hospcode;
        $rs=$this->crud->view_qrcode($hospcode,$didstd);
        $data['drug'] = $this->crud->get_drug_detail($didstd);
            console_log($data['drug']);
        $this->load->view('admin_drug_opd/drug_view', $data);
    }

}