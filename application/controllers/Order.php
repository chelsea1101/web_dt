<?php 
Class Order extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function checkout()
	{
		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();
		
		if($total_items <= 0)
		{
			redirect();
		}
		$total_price = 0;
		foreach ($carts as $row) {
			$total_price = $total_price + $row['subtotal'];
		}
		$this->data['total_price'] = $total_price;

		$user_id = 0;
		$user = '';
		
		if($this->session->userdata('user_id_login'))
		{
			$user_id = $this->session->userdata('user_id_login');
			$this->load->model('user_model');
			$user = $this->user_model->get_info($user_id);
		}
		
		$this->data['user'] = $user;

		$this->load->library('form_validation');
		$this->load->helper('form');

		if($this->input->post())
		{

			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('place', 'Địa chỉ', 'required');
			$this->form_validation->set_rules('email', 'Email nhận hàng', 'required|valid_email');

			if($this->form_validation->run())
			{
				$data = array(
					'user_id' => $user_id,
					'user_name' => $this->input->post('name'),
					'user_email' => $this->input->post('email'),
					'user_phone' => $this->input->post('phone'),
					'user_place' => $this->input->post('place'),
					'user_gender' => $this->input->post('gender'),
					'note' => $this->input->post('note'),
					'status' => '0',
					'total' => $total_price
				);
				$this->load->model('order_model');
				$this->order_model->create($data);

				$order_id = $this->db->insert_id(); //lay id cua order vua them
				$this->load->model('order_detail_model');
				foreach ($carts as $row) {
					$data = array(
						'order_id' => $order_id,
						'product_id' => $row['id'],
						'quantity' => $row['qty'],
						'total ' => $row['subtotal'],
					);
					$this->order_detail_model->create($data);
				}

				$this->cart->destroy();
				$this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gửi hàng cho bạn');
				
				redirect(base_url());
			}
		}

		$this->data['temp'] = 'site/order/checkout';
		$this->load->view('site/layout', $this->data);
	}
}
?>