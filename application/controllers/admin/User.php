<?php 
Class User extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	function index()
	{
		$input = array();
		$list = $this->user_model->get_list($input);
		$this->data['list'] = $list;

		$total = $this->user_model->get_total();
		$this->data['total'] = $total;
		
		//lay nd cua bien message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/user/index';
		$this->load->view('admin/main', $this->data);
	}

	function check_email()
	{
		$email = $this->input->post('email');
		$where = array('email' => $email);
		if($this->user_model->check_exists($where))
		{
			$this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
			return false;
		}
		return true;
	}

	function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			$this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('place', 'Địa chỉ', 'required');
			$this->form_validation->set_rules('gender', 'Giới tính', 'required');

			if($this->form_validation->run())
			{
				$password = $this->input->post('password');
				$password = md5($password);

				$data = array(
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'place' => $this->input->post('place'),
					'gender' => $this->input->post('gender'),
					'password' => $password,
					'email' => $this->input->post('email'),
				);
				if($this->user_model->create($data))
					$this->session->set_flashdata('message', 'Tạo thành viên thành công');
				else
					$this->session->set_flashdata('message', 'Không tạo thành công');
				redirect(base_url('admin/user'));
			}
		}

		$this->data['temp'] = 'admin/user/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id = $this->uri->rsegment('3');
		$id = intval($id); 
		
		$info = $this->user_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại thành viên');
			redirect(admin_url('user'));
		}
		$this->data['info'] = $info;
		
		if($this->input->post())
		{
			$password = $this->input->post('password');

			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			if($password)
			{
				$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
			}
			
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('place', 'Địa chỉ', 'required');

			if($this->form_validation->run())
			{
				$data = array(
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'place' => $this->input->post('place'),
					'gender' => $this->input->post('gender')
				);

				if($password)
				{
					$data['password'] = md5($password);
				}

				if($this->user_model->update($id, $data))
					$this->session->set_flashdata('message', 'Chỉnh sửa thành viên thành công');
				else
					$this->session->set_flashdata('message', 'Không chỉnh sửa thành công');
				redirect(admin_url('user'));
			}
		}

		$this->data['temp'] = 'admin/user/edit';
		$this->load->view('admin/main', $this->data);
	}
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);

		$info = $this->user_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại thành viên');
			redirect(admin_url('user'));
		}

		$this->user_model->delete($id);

		$this->session->set_flashdata('message', 'Xóa thành công');
			redirect(admin_url('user'));
	}
}
?>