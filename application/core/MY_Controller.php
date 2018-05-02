<?php 
Class MY_Controller extends CI_Controller
{
	public $data = array();
	
	function __construct()
	{
		parent::__construct();

		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin':
			{
				$this->load->helper('admin');
				$this->_check_login();
				// $this->load->model('admin_model');
				// if(!$this->session->userdata('login'))
				// {
				// 	redirect(admin_url());
				// }

				// $admin_id = $this->session->userdata('login');
				// $admin = $this->admin_model->get_info($admin_id);
				// $this->data['admin'] = $admin;
				

				break;
			}
			
			default:
			{
				$this->load->library('cart');
				$this->data['total_items'] = $this->cart->total_items();

				$this->load->model('catalog_model');
				$input = array();
				$input['order'] = array('id','ASC');
				$input['where'] = array('parent_id' => 0);
				$list_parent = $this->catalog_model->get_list($input);
				$this->data['list_parent'] = $list_parent;

				//ktra user login
				$user_id_login = $this->session->userdata('user_id_login');
				$this->data['user_id_login'] = $user_id_login;
				if($user_id_login)
				{
					$this->load->model('user_model');
					$user_info = $this->user_model->get_info($user_id_login);
					$this->data['user_info'] = $user_info;
				}

				$this->load->model('config_model');
				$config = $this->config_model->get_info(1);
				$this->data['config'] = $config;
			}
		}
	}

	private function _check_login()
	{
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);

		$login = $this->session->userdata('login');
		if(!$login && $controller != 'login')
		{
			redirect(admin_url('login'));
		}
		if($login && $controller == 'login')
		{
			redirect(admin_url('home'));
		}
	}
}
?>