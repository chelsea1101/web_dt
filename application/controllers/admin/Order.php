<?php 
Class Order extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('order_model');
		$this->load->model('order_detail_model');
	}

	function index()
	{
		
		$input = array();
		//ktra co loc ko
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
		if($id > 0 )
		{
			$input['where']['id'] = $id;
			$this->data['filter_id'] = $this->input->get('id');////////
		}
		$name = $this->input->get('name');
		if($name)
		{
			$input['like'] = array('user_name', $name);
			$this->data['filter_iname'] = $this->input->get('name');////////
		}
		$phone = $this->input->get('phone');
		if($phone)
		{
			$input['like'] = array('user_phone', $phone);
			$this->data['filter_phone'] = $this->input->get('phone');////////
		}
		$email = $this->input->get('email');
		if($email)
		{
			$input['like'] = array('user_email', $email);
			$this->data['filter_email'] = $this->input->get('email');////////
		}

		$total_rows = $this->order_model->get_total($input); 
		$this->data['total_rows'] = $total_rows;

		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows; //tong sp tren website
		$config['base_url'] = admin_url('order/index'); //link hien thi ra ds sp
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

		$list = $this->order_model->get_list($input);
		$this->data['list'] = $list;
		
		$this->data['create_pagination'] = $this->pagination->create_links(); //tao nut ph.trang


		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/order/index';
		$this->load->view('admin/main', $this->data);
	}
	
	function view()
	{
		$id = $this->uri->rsegment('3');

		$info = $this->order_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
			redirect(admin_url('info'));
		}
		$input = array();
		$input['where'] = array('order_id' => $id);
		$orders = $this->order_detail_model->get_list($input);

		$total_rows = $this->order_detail_model->get_total($input); 
		$this->data['total_rows'] = $total_rows;

		$this->load->model('product_model');
        foreach ($orders as $row)
        {
            //thông tin sản phẩm
            $product = $this->product_model->get_info($row->product_id);
            // $product->image = public_url('upload/product/'.$product->image);
            // $product->_url_view = site_url('product/view/'.$product->id);
            	
            // $row->_price = number_format($product->price);
            // $row->_total = number_format($row->total);

            $row->product = $product;
           
        }


        $this->data['info']   = $info;
        $this->data['orders'] = $orders;

        $this->data['temp'] = 'admin/order/view';
		$this->load->view('admin/main', $this->data);
		
	}

	function edit()
	{
		$id = $this->uri->rsegment('3');

		$info = $this->order_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
			redirect(admin_url('info'));
		}
		$this->data['info'] = $info;

		if($this->input->post())
		{
		
			$status = $this->input->post('status');

			if($status == 2)
			{
				$input = array();
				$input['where'] = array('order_id' => $id);
				$orders = $this->order_detail_model->get_list($input);
				$this->load->model('product_model');
		        foreach ($orders as $row)
		        {
		            //thông tin sản phẩm
		            $product = $this->product_model->get_info($row->product_id);
		            // $product->image = public_url('upload/product/'.$product->image);
		            // $product->_url_view = site_url('product/view/'.$product->id);
		            	
		            // $row->_price = number_format($product->price);
		            // $row->_total = number_format($row->total);
		            
		   			$data = array();
					$data['buyed'] = $product->buyed + 1;
					$this->product_model->update($product->id, $data);
		            
		            $row->product = $product;
		        }

			}

			$data = array(
				'status' => $status
			);
			if($this->order_model->update($id, $data))
				$this->session->set_flashdata('message', 'Cập nhật thành công');
			else
				$this->session->set_flashdata('message', 'Không cập nhật thành công');
			redirect(admin_url('order'));

		}

		$this->data['temp'] = 'admin/order/edit';
		$this->load->view('admin/main', $this->data);
	}
	
	function delete()
	{
		$id = $this->uri->rsegment(3);
		$this->_delete($id);

		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('order'));
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
		$order = $this->order_model->get_info($id);
		if(!$order)
		{
			$this->session->set_flashdata('message', 'Không tồn tại đơn hàng');
			redirect(admin_url('order'));
		}
		$this->order_model->delete($id);

	}
}
?>