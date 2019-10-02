<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login"))
            redirect(site_url('user/login'));
        $this->layout->setLayout('default_layout');
        $this->db = $this->load->database('default', true);
    }

    public function index()
    {
        $data['all_drug_opd'] = $this->db->from('drug_opd')->where('use','1')->count_all_results();
        $data[]='';
        $this->layout->view('dashboard/index_view', $data);
    }
}
