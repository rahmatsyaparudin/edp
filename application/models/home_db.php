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
   public function insert_file($data)
    {
    	$this->db->trans_start();
		$query = $this->db->insert('file_list', $data);
		$this->db->trans_complete();
    }

    public function file_select_all($limit, $offset)
    {
        $this->db->select('file_id, a.name AS fileName, file_name, file_desc, location, a.timestamp, b.name AS userName'); 
        $this->db->from('file_list a');
        $this->db->join('user b', 'a.username = b.username');        
        $this->db->order_by('a.timestamp', 'DESC');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false; 
    }

    public function user_select_all()
    {
        $where = "status in (1,0) AND isDeleted IS NULL";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }

    public function setting_select_all()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('status', 1);
        $query = $this->db->get()->result();
        return $query;
    }

    public function user_get_byId($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function supported_format()
    {
        $this->db->select('file_format');
        $this->db->from('setting');
        $query = $this->db->get();
        return $query->row()->file_format;
    }

    public function user_login($username)
    {
        $where = "username = '".$username."' AND status = 1";
        $this->db->select('username, name, password, status, isDeleted, isAdmin');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get()->result();
        return $query;
    }

    public function user_login_check_row($username)
    {
        $where = " username = '".$username."' AND status = 1";
        $this->db->select('name, username, password, status, isDeleted, isAdmin');
        $this->db->from('user');
        $this->db->where($where);
        $query = $this->db->get()->row();
        return $query;
    }

    public function select_file_fullscreen($id)
    {
        $this->db->select('location');
        $this->db->from('file_list');
        $this->db->where('file_id', $id);
        $query = $this->db->get()->row()->location;
        return $query;
    }

    public function total_rows(){
        $query = $this->db->get('file_list')->num_rows();
        return $query;
    }

    public function data($number,$offset){
        $query = $this->db->get('file_list',$number,$offset)->result();
        return $query;
    }
}