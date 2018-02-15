<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Breadcrumb class
 *
 * DESCRIPTION	: Class to show breadcrumb navigation
 *
 **/
 
class Breadcrumb
{
	protected $data = array();
 
	/**
	 * Class Constructor
	 *
	 * @return void
	 * @author Yudhi - Manix
	 **/
	function __construct() 
	{
 
	}
 
    /**
	 * add new crumb element
	 *
	 * @param  string $title The crumb title
	 * @param  string $uri Crumb url path 
	 * @return void
	 * @author Yudhi - Manix
	 **/
 
	public function add($title, $uri='') 
	{
		$this->data[] = array('title'=>$title, 'uri'=>$uri);
		return $this;
	}
 
	/**
	 * Fetch crumb data
	 *
	 * @return void
	 * @author Yudhi - Manix
	 **/
 
	public function fetch() 
	{
		return $this->data;
	}
 
	/**
	 * Reset crumb data
	 *
	 * @return void
	 * @author Yudhi - Manix
	 **/
	public function reset() 
	{
		$this->data = array();
	}
 
 
	/**
	 * Dislpay all crumb element
	 *
	 * @param  string $home_site first path title
	 * @param  string $id id of ul html
	 * @return void
	 * @author Yudhi - Manix
	 **/
	public function show($home_site ="home", $id = "breadcrumb"  ) 
	{
		$ci = &get_instance();
		$site = $home_site;
		$breadcrumbs = $this->data;
		$out  = '<ul id="'.$id.'">';
		if ($breadcrumbs && count($breadcrumbs) > 0) {
			$i=1;
			foreach ($breadcrumbs as $crumb): 
 
				if ($i != count($breadcrumbs)) {
					$out .= '<li><a href="' .site_url($crumb['uri']). '">'. $crumb['title'] .'</a></li>';
				} else {
					$out .= '<li><a href="#">'. $crumb['title'] .'</a></li>';
				}
				$i++;
			endforeach;
		} else {
			$out .= '<li class="selected">' . $site . '</li>';
		}
		$out .= '</ul>';
		return $out;	
	}
 
}
 
// END  Breadcrumb class