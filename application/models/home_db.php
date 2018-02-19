<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home_db CI_Model Class
 * 
 * @access public
 * @author Rahmat Syaparudin
 * @return void
 */
class Home_db extends CI_MODEL
{
    /**
     * Insert File Model Function
     * 
     * @access public
     * @author Rahmat Syaparudin
     * @return void
     */
    public function insert_file($data)
    {
    	$this->db->trans_start();
		$query = $this->db->insert('file_list', $data);
		$this->db->trans_complete();
    }

    /**
     * File Select All Model Function
     * 
     * @access public
     * @author Rahmat Syaparudin
     * @return void
     */
    public function file_select_all()
    {
        $query =   "SELECT file_id, a.name AS 'fileName', file_name, file_desc, location, a.timestamp, b.name AS 'userName' 
                    FROM file_list a 
                    INNER JOIN user b USING(username) 
                    WHERE a.status = '1' 
                    ORDER BY a.timestamp DESC";
        return $query;
    }

    function user_select_all()
    {
        $query = "SELECT * FROM user WHERE status in (1,0) AND isDeleted IS NULL ORDER BY timestamp DESC";
        return $query;
    }

    function setting_select_all()
    {
        $query = "SELECT * FROM setting WHERE status = '1'";
        return $query;
    }

    function user_get_byId($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $id);
        $query = $this->db->get();
        return $query->row();
    }

     function supported_format()
    {
        $this->db->select('file_format');
        $this->db->from('setting');
        $query = $this->db->get();
        return $query->row()->file_format;
    }

    function user_login($username)
    {
        $query = "SELECT name, username, password, status, isDeleted 
                  FROM user 
                  WHERE username = '".$username."' AND status = 1";
        return $query;
    }
}