<?php 
Class Slide extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('slide_model');
	}

	function index()
	{
		
		$list = $this->slide_model->get_list();
		$this->data['list'] = $list;

		$this->load->model('product_model');
		// $id = $list['product_id'];
		// $product = $this->product_model->get_info($id);

		// pre($list);
		// $this->data['product'] = $product;
		$product = array();
		foreach ($list as $row) {

			// $this->product_model->get_info($row->product_id);
			array_push($product,$this->product_model->get_info($row->product_id));
		}

		// for ($i=0; $i < count($product); $i++) { 
		// 	echo $product[$i]->name;
		//  foreach ($product as $row) {
		// // pre($row->name);
		// 	echo $row->name;
		// }
		$this->data['product'] = $product;
		$total = $this->slide_model->get_total();
		$this->data['total'] = $total;
		
		//lay nd cua bien message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/slide/index';
		$this->load->view('admin/main', $this->data);
	}
	
	function add()
	{

		$this->load->helper('form');

		$this->load->model('product_model');
		$products = $this->product_model->get_list();
		$this->data['products'] = $products;

		if($this->input->post())
		{
			$descript = $this->input->post('descript');
			$product_id = $this->input->post('product_id');
			$position = $this->input->post('position');

			$this->load->library('upload_library');
			$upload_path = './upload/slide';
			$upload_data = $this->upload_library->upload($upload_path, 'image');
			
			$image = '';
			if(isset($upload_data['file_name']))
			{
				$image = $upload_data['file_name'];
				
			}

			$data = array(
				'descript' => $descript,
				'product_id' => $product_id,
				'position' => intval($position),
				'image' => $image
			);
			if($this->slide_model->create($data))
				$this->session->set_flashdata('message', 'Thêm mới thành công');
			else
				$this->session->set_flashdata('message', 'Không thêm thành công');
			redirect(admin_url('slide'));
		}

		$this->data['temp'] = 'admin/slide/add';
		$this->load->view('admin/main', $this->data);
	}

	function edit()
	{
		$this->load->helper('form');

		$this->load->model('product_model');
		$products = $this->product_model->get_list();
		$this->data['products'] = $products;

		$id = $this->uri->rsegment(3);
		$info = $this->slide_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại ảnh bìa');
			redirect(admin_url('catalog'));
		}
		$this->data['info'] = $info;

		if($this->input->post())
		{
			$descript = $this->input->post('descript');
			$product_id = $this->input->post('product_id');
			$position = $this->input->post('position');

			$this->load->library('upload_library');
			$upload_path = './upload/slide';
			$upload_data = $this->upload_library->upload($upload_path, 'image');
			
			$image = '';
			if(isset($upload_data['file_name']))
			{
				$image = $upload_data['file_name'];
				
			}

			$data = array(
				'descript' => $descript,
				'product_id' => $product_id,
				'position' => intval($position)
			);

			if($image != '')
			{
				$data['image'] = $image;
			}

			if($this->slide_model->update($id, $data))
				$this->session->set_flashdata('message', 'Thêm mới thành công');
			else
				$this->session->set_flashdata('message', 'Không thêm thành công');
			redirect(admin_url('slide'));
		}

		// //lay ds dm cha
		// $input = array();
		// $input['where'] = array('parent_id' => 0);
		// $list = $this->catalog_model->get_list($input);
		// $this->data['list'] = $list;

		$this->data['temp'] = 'admin/slide/edit';
		$this->load->view('admin/main', $this->data);
	}

	function delete()
	{
		$id = $this->uri->rsegment(3);
		

		$slide = $this->slide_model->get_info($id);
		if(!$slide)
		{
			$this->session->set_flashdata('message', 'Không tồn tại ảnh bìa');
			redirect(admin_url('slide'));
		}
		$this->slide_model->delete($id);

		$image = './upload/slide/'.$slide->image;
		if(file_exists($image))
		{
			unlink($image);
		}

		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('slide'));
	}
}
?>