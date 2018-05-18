<?php 
Class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');
	}

	function index()
	{
		$input = array();

		//ktra co loc ko
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
		// if($id > 0 )
		// {
		// 	$input['where']['id'] = $id;
		// 	$this->data['filter_id'] = $this->input->get('id');////////
		// }
		$name = $this->input->get('name');
		if($name)
		{
			$input['like'] = array('name', $name);
			$this->data['filter_iname'] = $this->input->get('name');////////
		}
		$catalog_id = $this->input->get('catalog');
		$catalog_id = intval($catalog_id);
		if($catalog_id > 0)
		{
			$input['where']['catalog_id'] = $catalog_id;
			// $this->data['catalog_id'] = $this->input->get('catalog');////////
		}

		$total_rows = $this->product_model->get_total($input); 
		$this->data['total_rows'] = $total_rows;

		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows; //tong sp tren website
		if (!empty($_GET)) {
			$config['reuse_query_string'] = FALSE;
			$config['suffix'] = '?name='.$name.'&catalog='.$catalog_id;
			$config['base_url'] = admin_url('product/index/'); //link hien thi ra ds sp
			$config['first_url'] = $config['base_url'] . '/' . $config['suffix'];

		}
		$config['base_url'] = admin_url('product/index'); //link hien thi ra ds sp
		$config['per_page'] = 5; //slg hien thi tren 1 trang
		$config['uri_segment'] = 4; //pahn doan hien thi so trang tren url
		$config['next_link'] = "Tiếp";
		$config['prev_link'] = "Trước";
		$config['first_link'] = "Đầu tiên";
		$config['last_link'] = "Cuối cùng";

		$this->pagination->initialize($config); //khoi tao cac cau hinh ph.trang

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		$input['limit'] = array($config['per_page'], $segment);

		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['create_pagination'] = $this->pagination->create_links(); //tao nut ph.trang

		// ds danh muc sp
		$this->load->model('catalog_model');
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalogs = $this->catalog_model->get_list($input);
		foreach ($catalogs as $row) 
		{
			$input['where'] = array('parent_id' => $row->id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		$this->data['catalogs'] = $catalogs;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/main', $this->data);
	}
	function add()
	{
		// ds danh muc sp
		$this->load->model('catalog_model');
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalogs = $this->catalog_model->get_list($input);
		foreach ($catalogs as $row) 
		{
			$input['where'] = array('parent_id' => $row->id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		$this->data['catalogs'] = $catalogs;

		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('catalog', 'Thể loại', 'required');
			$this->form_validation->set_rules('price', 'Giá', 'required');
			$this->form_validation->set_rules('warranty', 'Bảo hành', 'required');
			$this->form_validation->set_rules('specs', 'Thông số', 'required');
			$this->form_validation->set_rules('descript', 'Giới thiệu sản phẩm', 'required');

			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$catalog_id = $this->input->post('catalog');
				$price = $this->input->post('price');
				$price = str_replace(',', '', $price);

				//lay ten file anh dc update len
				$this->load->library('upload_library');
				$upload_path = './upload/product';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				
				$image = '';
				if(isset($upload_data['file_name']))
				{
					$image = $upload_data['file_name'];
					
				}

				//upload anh kem theo
				$image_list = array();
				// $upload_path = './upload/product/image_list';
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);


				//upload anh noi bat
				$image_features = array();
				// $upload_path = './upload/product/image_features';
				$image_features = $this->upload_library->upload_file($upload_path, 'image_features');
				$image_features = json_encode($image_features);

				$discount = $this->input->post('discount');
				$color = $this->input->post('color');
				$warranty = $this->input->post('warranty');
				$gifts = $this->input->post('gifts');
				$specs = $this->input->post('specs');
				$descript = $this->input->post('descript');
				$is_hot = $this->input->post('is_hot');
				$status = $this->input->post('status');

				//luu du lieu can them
				$data = array(
					'name' => $name,
					'catalog_id' => $catalog_id,
					'price' => $price,
					'image' => $image,
					'image_list' => $image_list,
					'image_features' => $image_features,
					'discount' => $discount,
					'color' => $color,
					'warranty' => $warranty,
					'gifts' => $gifts,
					'specs' => $specs,
					'descript' => $descript,
					'is_hot' => $is_hot,
					'status' => $status
					
				);
				if($this->product_model->create($data))
					$this->session->set_flashdata('message', 'Thêm mới thành công');
				else
					$this->session->set_flashdata('message', 'Không thêm thành công');
				redirect(admin_url('product'));
			}
		}

		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/main', $this->data);
	}
	function edit()
	{

		$id = $this->uri->rsegment('3');
		$product = $this->product_model->get_info($id);
		if(!$product)
		{
			$this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
			redirect(admin_url('product'));
		}
		$this->data['product'] = $product;


		// ds danh muc sp
		$this->load->model('catalog_model');
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalogs = $this->catalog_model->get_list($input);
		foreach ($catalogs as $row) 
		{
			$input['where'] = array('parent_id' => $row->id);
			$subs = $this->catalog_model->get_list($input);
			$row->subs = $subs;
		}
		$this->data['catalogs'] = $catalogs;

		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('catalog', 'Thể loại', 'required');
			$this->form_validation->set_rules('price', 'Giá', 'required');
			$this->form_validation->set_rules('warranty', 'Bảo hành', 'required');
			$this->form_validation->set_rules('specs', 'Thông số', 'required');
			$this->form_validation->set_rules('descript', 'Giới thiệu sản phẩm', 'required');

			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$catalog_id = $this->input->post('catalog');
				$price = $this->input->post('price');
				$price = str_replace(',', '', $price);

				//lay ten file anh dc update len
				$this->load->library('upload_library');
				$upload_path = './upload/product';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				
				$image = '';
				if(isset($upload_data['file_name']))
				{
					$image = $upload_data['file_name'];
					
				}

				//upload anh kem theo
				$image_list = array();
				// $upload_path = './upload/product/image_list';
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list_json = json_encode($image_list);


				//upload anh noi bat
				$image_features = array();
				// $upload_path = './upload/product/image_features';
				$image_features = $this->upload_library->upload_file($upload_path, 'image_features');
				$image_features_json = json_encode($image_features);

				$discount = $this->input->post('discount');
				$color = $this->input->post('color');
				$warranty = $this->input->post('warranty');
				$gifts = $this->input->post('gifts');
				$specs = $this->input->post('specs');
				$descript = $this->input->post('descript');
				$is_hot = $this->input->post('is_hot');
				$status = $this->input->post('status');

				//luu du lieu can them
				$data = array(
					'name' => $name,
					'catalog_id' => $catalog_id,
					'price' => $price,
					'discount' => $discount,
					'color' => $color,
					'warranty' => $warranty,
					'gifts' => $gifts,
					'specs' => $specs,
					'descript' => $descript,
					'is_hot' => $is_hot,
					'status' => $status
				);

				if($image != '')
				{
					$data['image'] = $image;
				}
				if(!empty($image_list))
				{
					$data['image_list'] = $image_list_json;
				}
				if(!empty($image_features))
				{
					$data['image_features'] = $image_features_json;
				}

				if($this->product_model->update($product->id, $data))
					$this->session->set_flashdata('message', 'Cập nhật thành công');
				else
					$this->session->set_flashdata('message', 'Không cập nhật thành công');
				redirect(admin_url('product'));
			}
		}

		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/main', $this->data);
	}
	function delete()
	{
		$id = $this->uri->rsegment(3);
		$this->_delete($id);

		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('product'));
	}
	function delete_all()
	{
		$ids = $this->input->post('ids');
		foreach ($ids as $id) {
			$this->_delete($id);
		}
		
	}
	private function _delete($id)
	{
		$product = $this->product_model->get_info($id);
		if(!$product)
		{
			$this->session->set_flashdata('message', 'Không tồn tại sản phẩm');
			redirect(admin_url('product'));
		}

		//ktra sp co anh bia ko
		$this->load->model('slide_model');
		$slide = $this->slide_model->get_info_rule(array('product_id' => $id), 'id');
		if($slide)
		{
			$this->session->set_flashdata('message', 'Sản phẩm '.$product->name.' này có chứa ảnh bìa, cần xóa ảnh bìa trước khi xóa sản phẩm');
			redirect(admin_url('product'));
		}

		//ktra sp co cthd ko
		$this->load->model('order_detail_model');
		$order_detail = $this->order_detail_model->get_info_rule(array('product_id' => $id), 'id');
		if($order_detail)
		{
			$this->session->set_flashdata('message', 'Sản phẩm '.$product->name.' này có chứa trong chi tiết đơn hàng, cần xóa trong chi tiết đơn hàng trước khi xóa sản phẩm');
			redirect(admin_url('product'));
		}

		$this->product_model->delete($id);

		$image = './upload/product/'.$product->image;
		if(file_exists($image))
		{
			unlink($image);
		}

		$image_list = json_decode($product->image_list);
		if(is_array($image_list))
		{
			foreach ($image_list as $img) 
			{
				$image = './upload/product/'.$img;
				if(file_exists($image))
				{
					unlink($image);
				}
			}
		}

		$image_features = json_decode($product->image_features);
		if(is_array($image_features))
		{
			foreach ($image_features as $img) 
			{
				$image = './upload/product/'.$img;
				if(file_exists($image))
				{
					unlink($image);
				}
			}
		}

	}
}
?>