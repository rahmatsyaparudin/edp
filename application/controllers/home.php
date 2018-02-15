<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->model(array('home_db'));
	}

	public function index()
	{
		$this->timeline();
	}

	function timeline()
	{	
		//$userSession = array('nama' => 'Administrator');
		//$this->session->set_userdata($userSession);
		
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'timeline_main';
		$this->load->view('template', $view);
	}

	function signin()
	{	
		$userSession = array('nama' => 'Administrator');
		$this->session->set_userdata($userSession);
		
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'login_main';
		$this->load->view('template', $view);
	}

	function upload()
	{	
		$userSession = array('nama' => 'Administrator');
		$this->session->set_userdata($userSession);
		$message = $this->session->flashdata('message');
		$message = '';
		
		if($this->input->post('uploadFile') != '')
		{
			$filename = $_FILES['fileToUpload']['name'];
				    
			$config['allowed_types'] = 'pdf';
			$config['upload_path'] = './uploads/';
			$config['file_name'] = $filename;
			$uploadPath = './uploads/';

			$this->load->library('upload', $config);

			if (file_exists($uploadPath.$filename))
			{
				$message = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>'.$filename.' is already exist</div>';		       	
			}
			else
			{
				if ($this->upload->do_upload('fileToUpload'))
		        {
		        	
		        	$file_name = $this->input->post('file_name');
		        	$file_desc = $this->input->post('file_desc');
		        	$fileToUpload = $this->input->post('fileToUpload');
		        	$location = $uploadPath.$filename;
		        	$username = 'admin';
		        	$description  = empty($file_desc) ? NULL : $file_desc;
		        	$status = 1;

		        	$data = array(
		        		'file_name' =>  $file_name, 
		        		'file_desc' =>  $description, 
		        		'location' =>  $location, 
		        		'status' =>  $status, 
		        		'username' =>  $username,
		        	);

		        	$this->home_db->insert_file($data);

		        	$message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>'.$filename.' successfully uploaded</div>';
		        }
		        else
		        {
		            $message = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>The file you uploaded is not  *.pdf file format</div>';		         
				}
			}				
		}
					
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['message'] = $message;
		$view['content'] = $dir.'upload_main';
		$this->load->view('template', $view);
	}
	
}
?>