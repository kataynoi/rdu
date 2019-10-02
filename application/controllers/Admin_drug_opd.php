<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_drug_opd extends CI_Controller
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata("user_type") > 2)
            redirect(site_url('user/login'));
        $this->load->model('Admin_drug_opd_model', 'crud');
    }

    public function index()
    {
        $data[] = '';

        $this->layout->view('admin_drug_opd/index', $data);
    }


    function fetch_admin_drug_opd()
    {
        $fetch_data = $this->crud->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {


            $sub_array = array();
            $sub_array[] = $row->id;
//            $sub_array[] = $row->didstd;
            $sub_array[] = $row->didstd_19;
            $sub_array[] = $row->dname;
            $sub_array[] = $row->dname_thai;
            $sub_array[] = $row->drug_detail;
/*            $sub_array[] = $row->sound;
            $sub_array[] = $row->vdo;
            $sub_array[] = $row->note;*/
            $sub_array[] = $row->use;
            $sub_array[] = '<div class="btn-group pull-right" role="group" >
                <button class="btn btn-outline btn-success" data-btn="btn_view" data-didstd="' . $row->didstd_19 . '" data-id="' . $row->id . '"><i class="fa fa-eye"></i></button>
                <button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button>
                <button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' . $row->id . '"><i class="fa fa-trash"></i></button></div>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud->get_all_data(),
            "recordsFiltered" => $this->crud->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function del_admin_drug_opd()
    {
        $id = $this->input->post('id');

        $rs = $this->crud->del_admin_drug_opd($id);
        if ($rs) {
            $json = '{"success": true}';
        } else {
            $json = '{"success": false}';
        }

        render_json($json);
    }

    public function  save_admin_drug_opd()
    {
        $data = $this->input->post('items');
        if ($data['action'] == 'insert') {
            $rs = $this->crud->save_admin_drug_opd($data);
            if ($rs) {
                $json = '{"success": true,"id":' . $rs . '}';
            } else {
                $json = '{"success": false}';
            }
        } else if ($data['action'] == 'update') {
            $rs = $this->crud->update_admin_drug_opd($data);
            if ($rs) {
                $json = '{"success": true}';
            } else {
                $json = '{"success": false}';
            }
        }

        render_json($json);
    }

    public function  get_admin_drug_opd()
    {
        $id = $this->input->post('id');
        $rs = $this->crud->get_admin_drug_opd($id);
        $rows = json_encode($rs);
        $json = '{"success": true, "rows": ' . $rows . '}';
        render_json($json);
    }
}