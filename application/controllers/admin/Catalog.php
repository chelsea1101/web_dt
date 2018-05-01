<?php 
Class Catalog extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('catalog_model');
	}
	function index()
	{
		$list = $this->catalog_model->get_list();
		$this->data['list'] = $list;

		$input = array();
		$input['where'] = array('parent_id' => 0);
		$list_parent = $this->catalog_model->get_list($input);
		$this->data['list_parent'] = $list_parent;
		// pre($list_parent);

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/catalog/index';
		$this->load->view('admin/main', $this->data);
	}
	function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required');
			

			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$position = $this->input->post('position');
				$active = $this->input->post('active');
				$data = array(
					'name' => $name,
					'parent_id' => $parent_id,
					'position' => intval($position),
					'active' => $active
				);
				if($this->catalog_model->create($data))
					$this->session->set_flashdata('message', 'Thêm mới thành công');
				else
					$this->session->set_flashdata('message', 'Không thêm thành công');
				redirect(admin_url('catalog'));
			}
		}

		//lay ds dm cha
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/catalog/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id = $this->uri->rsegment(3);
		$info = $this->catalog_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại danh mục');
			redirect(admin_url('catalog'));
		}
		$this->data['info'] = $info;

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required');
			

			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$parent_id = $this->input->post('parent_id');
				$position = $this->input->post('position');
				$active = $this->input->post('active');
				$data = array(
					'name' => $name,
					'parent_id' => $parent_id,
					'position' => intval($position),
					'active' => $active
				);
				if($this->catalog_model->update($id, $data))
					$this->session->set_flashdata('message', 'Cập nhật thành công');
				else
					$this->session->set_flashdata('message', 'Không cập nhật thành công');
				redirect(admin_url('catalog'));
			}
		}

		//lay ds dm cha
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$list = $this->catalog_model->get_list($input);
		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/catalog/edit';
		$this->load->view('admin/main', $this->data);
	}
	function delete()
	{
		$id = $this->uri->rsegment('3');
		$id = intval($id);

		$info = $this->catalog_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại danh mục');
			redirect(admin_url('catalog'));
		}
		//ktra danh muc co sp ko
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
		if($product)
		{
			$this->session->set_flashdata('message', 'Danh mục '.$info->name.' này có chứa sản phẩm, cần xóa các sản phẩm trước khi xóa danh mục');
			redirect(admin_url('catalog'));
		}

		$this->catalog_model->delete($id);

		$this->session->set_flashdata('message', 'Xóa thành công');
			redirect(admin_url('catalog'));
	}
}

?>