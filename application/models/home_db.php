<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_db extends CI_MODEL
{
    public function show_navbar()
    {
        $query = $this->db->query("SELECT * FROM gkk_navigation WHERE nav_status = 1");
        return $query->result_array();
    }

    function insert_file($data)
    {
    	$this->db->trans_start();
		$query = $this->db->insert('file_list', $data);
		$this->db->trans_complete();
    }

    function file_select_all()
    {
        $query = "SELECT file_id, file_name, file_desc, location, timestamp, name FROM file_list a INNER JOIN user b USING(username) WHERE a.status = '1' ORDER BY timestamp DESC";
        return $query;
    }

}