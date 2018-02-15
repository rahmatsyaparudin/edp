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
        $query =   "SELECT file_id, file_name, file_desc, location, timestamp, name 
                    FROM file_list a 
                    INNER JOIN user b USING(username) 
                    WHERE a.status = '1' 
                    ORDER BY timestamp DESC";
        return $query;
    }

}