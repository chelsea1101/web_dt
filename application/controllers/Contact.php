<?php 
Class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model');
	}

	function index()
	{
		$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post())
			{
				$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
				$this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
				$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
				$this->form_validation->set_rules('place', 'Địa chỉ', 'required');
				$this->form_validation->set_rules('content', 'Nội dung', 'required');

				if($this->form_validation->run())
				{

					$data = array(
						'user_name' => $this->input->post('name'),
						'user_phone' => $this->input->post('phone'),
						'user_place' => $this->input->post('place'),
						'content' => $this->input->post('content'),
						'user_email' => $this->input->post('email'),
					);
					if($this->contact_model->create($data))
						$this->session->set_flashdata('message', 'Gửi yêu cầu thành công');
					else
						$this->session->set_flashdata('message', 'Không thành công');
					redirect(base_url('home'));
				}
			}

		$this->data['temp'] = 'site/contact/index';
		$this->load->view('site/layout', $this->data);
	}
}
?>