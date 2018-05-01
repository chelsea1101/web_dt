<?php 
	Class Home extends MY_Controller{
		function index()
		{
			$this->load->model('slide_model');
			$slide_list = $this->slide_model->get_list();
			$this->data['slide_list'] = $slide_list;

			$this->load->model('product_model');
			$input = array();
			$input['limit'] = array(8, 0);
			$input['where'] = array('is_hot' => 1);
			$product_hot = $this->product_model->get_list($input);
			$this->data['product_hot'] = $product_hot;
			// pre($product_hot);
			
			$input = array();
			$input['limit'] = array(8, 0);
			$input['order'] = array('buyed', 'DESC');
			$product_buy = $this->product_model->get_list($input);
			$this->data['product_buy'] = $product_buy;

			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			
			$this->data['temp'] = 'site/home/index'; 
			$this->load->view('site/layout', $this->data);
		}
	}

?>