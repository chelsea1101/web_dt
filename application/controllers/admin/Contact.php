<?php 
Class Contact extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
	}
	function index()
	{
		$input = array();
		$list = $this->contact_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->contact_model->get_total();
		$this->data['total'] = $total;
		
		//lay nd cua bien message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/contact/index';
		$this->load->view('admin/main', $this->data);
	}

}
?>