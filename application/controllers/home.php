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
	/**
	 * __construct controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation', 'aes128'));
		$this->load->model(array('home_db'));
	}

	/**
	 * Index controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/index
	 */
	public function index()
	{
		$view['message'] = $this->session->flashdata('message');
		$this->timeline();
	}

	/**
	 * Timeline controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/timeline
	 */
	public function timeline()
	{	
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'timeline_main';
		$this->load->view('template', $view);
	}

	/**
	 * Signin controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/signin
	 */
	function signin()
	{	
		if($this->session->userdata("isLogin")==TRUE){redirect('home/signout');}
		$message = '';
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$isSignIn = $this->input->post('signin');	

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
					$message = '<div class="alert alert-success alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>You have successfully logged in</div>';	
					$userSession = array(
						'nama' => 'Administrator',
						'isLogin' => TRUE
					);
					$this->session->set_userdata($userSession);
					echo '<meta http-equiv="refresh" content="4;url='.base_url().'home/upload">';
				}
				else
				{
					$message = '<div class="alert alert-danger alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i>You have no authorize</div>';

				}
			}
		}

		$view['message'] = $message;
		$view['username'] = $username;
		$view['password'] = $password;
		
		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'signin_main';
		$this->load->view('template', $view);
	}

	/**
	 * Upload controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/upload
	 */
	function upload()
	{
		if($this->session->userdata("isLogin")!=TRUE){redirect('home/signin');}

		$message = '';

		if($this->input->post('uploadFile') != '')
		{
			$filename = $_FILES['fileToUpload']['name'];
			$filename = preg_replace('/\s+/', '_', $filename);
	    
			$uploadPath = './uploads/'; #Hardcode
			$config['allowed_types'] = 'pdf'; #Hardcode
			$config['upload_path'] = $uploadPath;
			$config['file_name'] = $filename;
			
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
			        	
			        	$file_name = $this->input->post('file_name');
			        	$file_desc = $this->input->post('file_desc');
			        	$fileToUpload = $this->input->post('fileToUpload');
			        	$location = $uploadPath.$filename;
			        	$username = 'admin'; #Hardcode
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
			        	$message = '<div class="alert alert-success alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>'.$filename.' successfully uploaded</div>';
			        }
			        else
			        {
			            $message = '<div class="alert alert-warning alert-dismissible" id="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-warning"></i>The file you uploaded is not supported</div>';		         
					}
				}	
			}
							
		}
					
		$view['message'] = $message;

		$dir = 'home/';
		$view['dir'] = $dir;
		$view['js'] = '';
		$view['content'] = $dir.'upload_main';
		$this->load->view('template', $view);
	}



	/**
	 * Signout controller Function
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/signout
	 */
	public function signout() 
	{
		$userSession = array(
			'isLogin' => FALSE,
			'username' => ''
		);
		$this->session->unset_userdata($userSession);
		$this->session->sess_destroy();
		redirect('home/signin');
		#echo '<meta http-equiv="refresh" content="0; url='.base_url().'home/timeline">';
	}
}
?>