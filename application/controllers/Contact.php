<?php 
Class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		

		$this->data['temp'] = 'site/contact/index';
		$this->load->view('site/layout', $this->data);
	}
}
?>