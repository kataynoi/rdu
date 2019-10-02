<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *

 */
class Droug_opd_model extends CI_Model
{
    var $table = "drug_opd";
    var $order_column = Array('id','didstd','didstd_19','dname','dname_thai','drug_detail','sound','vdo','note','use',);

    function make_query()
    {
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("didstd_19", $_POST["search"]["value"]);$this->db->or_like("dname", $_POST["search"]["value"]);$this->db->or_like("dname_thai", $_POST["search"]["value"]);
            $this->db->group_end();

        }

        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('', '');
        }
    }

    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    /* End Datatable*/
    public function del_droug_opd($id)
        {
        $rs = $this->db
            ->where('id', $id)
            ->delete('drug_opd');
        return $rs;
        }

        

    public function save_droug_opd($data)
            {

                $rs = $this->db
                    ->set("id", $data["id"])->set("didstd", $data["didstd"])->set("didstd_19", $data["didstd_19"])->set("dname", $data["dname"])->set("dname_thai", $data["dname_thai"])->set("drug_detail", $data["drug_detail"])->set("sound", $data["sound"])->set("vdo", $data["vdo"])->set("note", $data["note"])->set("use", $data["use"])
                    ->insert('drug_opd');

                return $this->db->insert_id();

            }
    public function update_droug_opd($data)
            {
                $rs = $this->db
                    ->set("id", $data["id"])->set("didstd", $data["didstd"])->set("didstd_19", $data["didstd_19"])->set("dname", $data["dname"])->set("dname_thai", $data["dname_thai"])->set("drug_detail", $data["drug_detail"])->set("sound", $data["sound"])->set("vdo", $data["vdo"])->set("note", $data["note"])->set("use", $data["use"])->where("id",$data["id"])
                    ->update('drug_opd');

                return $rs;

            }
    public function get_droug_opd($id)
                {
                    $rs = $this->db
                        ->where('id',$id)
                        ->get("drug_opd")
                        ->row();
                    return $rs;
                }
}