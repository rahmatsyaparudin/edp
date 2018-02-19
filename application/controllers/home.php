<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home CI_Controller Class
 * 
 * @access public
 * @author Rahmat Syaparudin
 * @return void
 * @url http://yoursite.com/home/
 */
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation', 'aes128', 'pagination'));
		$this->load->model(array('home_db'));
	}

	public function index()
	{
		$view['message'] = $this->session->flashdata('message');
		$this->timeline();
	}

	public function timeline()
	{
		$total_row = $this->home_db->total_rows();
		$page_num = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		
		$config = array();
		$config['base_url'] = base_url().'home/timeline/page';
		$config['total_rows'] = $total_row;
		$config['per_page'] = 6;	
		$config['uri_segment'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['first_url'] = '1';
		$config['full_tag_open'] = "<ul class='pagination pagination-sm pagination-centered'>";
      	$config['full_tag_close'] ="</ul>";
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	    $config['next_link'] = 'Next';
	    $config['next_tag_open'] = "<li>";
	    $config['next_tagl_close'] = "</li>";
	    $config['prev_link'] = 'Previous';
	    $config['prev_tag_open'] = "<li>";
	    $config['prev_tagl_close'] = "</li>";
	    $config['first_tag_open'] = "<li>";
	    $config['first_tagl_close'] = "</li>";
	    $config['last_tag_open'] = "<li>";
	    $config['last_tagl_close'] = "</li>";
	    $config['first_link'] = 'First';
    	$config['last_link'] = 'Last';
    	$offset = ($config['per_page'] * $page_num) - $config['per_page'];
		$this->pagination->initialize($config);
		
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'timeline_main';
		$view['results'] = $this->home_db->file_select_all($config["per_page"], $offset);
		$view['pages'] = $this->pagination->create_links();
		$this->load->view('template', $view);
	}

	public function viewFullscreen($id)
	{	
		$data = $this->home_db->select_file_fullscreen($id);

		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['data'] = $data;
		$view['content'] = $dir.'viewFullscreen_main';
		$this->load->view('template', $view);
	}

	public function signin()
	{	
		if($this->session->userdata("isLogin")==TRUE){redirect('home/signout');}
		$message = '';		
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
		$isSignIn = trim($this->input->post('signin'));	
		$verify_password = $this->aes128->aesEncrypt($password);

		if ($this->input->post('signin'))
		{
			if (empty($username) && empty($password))
			{
				$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i>Login Failed! Username & Password must be fill</div>';
			}
			else
			{
				if (empty($username))
				{
					$message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>Login Failed! Username must be fill</div>';
				}
				else if (empty($password))
				{
					$message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>Login Failed! Password must be fill</div>';
				}
				else if (!empty($username) && !empty($password))
				{
					$getUser = '';
					$getPassword = '';
					$getName = '';
					$getStatus = 0;
					$getDeleted = 0;
					$isAdmin = 0;

					$data = $this->home_db->user_login($username);
					$cekRow = $this->home_db->user_login_check_row($username);
					foreach ($data as $row)
					{
						$getUser = $row->username;
						$getPassword = $row->password;
						$getName = $row->name;
						$getStatus = $row->status;
						$getDeleted = $row->isDeleted;
						$getAdmin = $row->isAdmin;
						$getAdmin  = empty($getAdmin) ? 0 : $getAdmin;
					}

					if ($username != $getUser)
					{
						$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-remove"></i>Sorry! The username '.$username.' doesnt exist</div>';
					}
					else if ($verify_password != $getPassword)
					{
						$message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>Sorry! your password doesnt match</div>';
					}
					else if ($username == $getUser && $verify_password == $getPassword)
					{
						if ($getStatus == 0)
						{
							$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-remove"></i>Sorry! your account has been disabled. Please contact your Administrator</div>';
						}
						else
						{
							$message = '<div class="alert alert-success alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>You have successfully logged in</div>';	
							$userSession = array(
								'name' => $getName, 
								'username' => $getUser,
								'isAdmin' => $getAdmin,
								'isLogin' => TRUE
							);
							$this->session->set_userdata($userSession);
							echo '<meta http-equiv="refresh" content="4;url='.base_url().'home/upload">';
						}						
					}
					else
					{
						$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-remove"></i>Sorry! wrong details</div>';
					}
				}
				else
				{
					$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i>You have no authorize</div>';
				}
			}
		}

		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'signin_main';
		$view['message'] = $message;
		$view['username'] = $username;
		$view['password'] = $password;
		$this->load->view('template', $view);
	}

	public function signout() 
	{
		$userSession = array(
			'isLogin' => FALSE,
			'username' => '',
			'name' => ''
		);
		$this->session->unset_userdata($userSession);
		$this->session->sess_destroy();
		redirect('home/signin');
	}

	public function upload()
	{
		if($this->session->userdata("isLogin")!=TRUE){redirect('home/signin');}

		$message = '';

		if($this->input->post('uploadFile') != '')
		{
			$file = $_FILES['fileToUpload']['name'];
			$filename = preg_replace('/[^a-z0-9](?![^.]*$)/i', '_', $file);
	    	
	    	$data = $this->home_db->setting_select_all();
	    	foreach ($data as $row) 
			{
				$uploadPath = $row->path_to_upload.'/';
				$uploadPathToServer = './'.$row->path_to_upload.'/';
				$fileformat = ''.$row->file_format.'|'; 
			}
			
			$config['allowed_types'] = $fileformat;
			$config['upload_path'] = $uploadPathToServer;
			$config['file_name'] = $filename;
			$config['overwrite'] = FALSE;
			
			$this->load->library('upload', $config);

			if (empty($filename))
			{
				$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i>You have not selected a file yet</div>';
			}
			else
			{
				if (file_exists($uploadPath.$filename))
				{
					$message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>'.$filename.' is already exist</div>';
				}
				else
				{
					if ($this->upload->do_upload('fileToUpload'))
			        {
			        	$name = $this->input->post('name');
			        	$file_desc = $this->input->post('file_desc');
			        	$fileToUpload = $this->input->post('fileToUpload');
			        	$location = $uploadPath.$filename;
			        	$getUser = $this->session->userdata('username'); 
			        	$description  = empty($file_desc) ? NULL : $file_desc;
			        	$status = 1;

			        	$data = array(
			        		'name' =>  $name,
			        		'file_name' =>  $filename, 
			        		'file_desc' =>  $description, 
			        		'location' =>  $location, 
			        		'status' =>  $status, 
			        		'username' =>  $getUser,
			        	);

			        	$this->home_db->insert_file($data);
			        	$message = '<div class="alert alert-success alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>'.$filename.' successfully uploaded</div>';
			        }
			        else
			        {
			            $message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>The file you uploaded is not supported</div>';		         
					}
				}	
			}							
		}
				
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'upload_main';
		$view['message'] = $message;
		$this->load->view('template', $view);
	}

	public function user()
	{	
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = $dir.'user_js';
		$view['content'] = $dir.'user_main';
		$this->load->view('template', $view);
	}

	function jsonUser()
	{
		$data = $this->home_db->user_select_all();
		$number = 1;
		$aaData = array();
		if (!empty($data))
		{
			foreach ($data as $row) 
			{
				if ($row->status == 1) $status='<label class="btn btn-xs btn-success"><i class="fa fa-check-square-o"></i> Enable</label>'; 
				else  $status='<label class="btn btn-xs btn-danger"><i class="fa fa-times-circle-o"></i> Disable</label>'; 

				$aaData[] = array(
					$number++,
					$row->username,
					$row->name,
					$row->email,
					$status,
					$row->timestamp,
					'<a href="#" class="btn btn-warning btn-xs" title="Edit" data-toggle="modal" data-target="#modalUser" data-whatever="'.$row->username.'"><i class="fa fa-edit"></i></a>
				    <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>'
				);
			}
		}
		$result['aaData'] = $aaData;
		echo json_encode($result);
		return;
	}

	function jsonUserEdit($id='')
	{
		$data = $this->home_db->user_get_byId($id);		
		echo json_encode($data);
		return;
	}
}
?>