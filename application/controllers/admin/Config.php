<?php 
Class Config extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
	}
	function index()
	{
		$list = $this->config_model->get_list();
		$this->data['list'] = $list;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/config/index';
		$this->load->view('admin/main', $this->data);
	}

	function edit()
	{
		// $this->load->library('form_validation');
		// $this->load->helper('form');

		$id = $this->uri->rsegment(3);
		$info = $this->config_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('config'));
		}
		$this->data['info'] = $info;

		if($this->input->post())
		{
		
			$email = $this->input->post('email');
			$title_website = $this->input->post('title_website');
			$place = $this->input->post('place');
			$place_link = $this->input->post('place_link');
			$hotline = $this->input->post('hotline');
			$descript = $this->input->post('descript');
			$facebook = $this->input->post('facebook');
			$youtube = $this->input->post('youtube');
			$instagram = $this->input->post('instagram');
			$twitter = $this->input->post('twitter');

			$data = array(
				'email' => $email,
				'title_website' => $title_website,
				'place' => $place,
				'place_link' => $place_link,
				'hotline' => $hotline,
				'descript' => $descript,
				'facebook' => $facebook,
				'youtube' => $youtube,
				'instagram' => $instagram,
				'twitter' => $twitter
			);
			if($this->config_model->update($id, $data))
				$this->session->set_flashdata('message', 'Cập nhật thành công');
			else
				$this->session->set_flashdata('message', 'Không cập nhật thành công');
			redirect(admin_url('config'));

		}

		//lay ds dm cha
		// $input = array();
		// $input['where'] = array('parent_id' => 0);
		// $list = $this->config_model->get_list($input);
		// $this->data['list'] = $list;

		$this->data['temp'] = 'admin/config/edit';
		$this->load->view('admin/main', $this->data);
	}
}

?>