<?php 
	Class Home extends MY_Controller{
		function index()
		{
			$this->load->model('slide_model');
			$slide_list = $this->slide_model->get_list();
			$this->data['slide_list'] = $slide_list;

			$this->load->model('catalog_model');
			$input = array();
			$input['where'] = array('parent_id' => 1);
			$list_phone = $this->catalog_model->get_list($input);

			$list_phone_id = array();
			foreach ($list_phone as $row) {
				$list_phone_id[] = $row->id;
			}
			$this->db->where_in('catalog_id', $list_phone_id);

			$input['limit'] = array(4, 0);
			$input['where'] = array('is_hot' => 1);
			$this->load->model('product_model');
			$product_hot = $this->product_model->get_list($input);
			$this->data['product_hot'] = $product_hot;

			$input2['limit'] = array(4, 0);
			$input2['order'] = array('buyed', 'DESC');
			$product_buy = $this->product_model->get_list($input2);
			$this->data['product_buy'] = $product_buy;

			$input2['limit'] = array(4, 0);
			$input2['where'] = array('discount > ' => 0);
			$input2['order'] = array('discount', 'ASC');
			$product_sale = $this->product_model->get_list($input2);
			$this->data['product_sale'] = $product_sale;
			
			$input['where'] = array('parent_id' => 2);
			$list_phone = $this->catalog_model->get_list($input);

			$list_accessories_id = array();
			foreach ($list_phone as $row) {
				$list_accessories_id[] = $row->id;
			}
			$this->db->where_in('catalog_id', $list_accessories_id);
			$input['limit'] = array(8, 0);
			$input['where'] = array('is_hot' => 1);
			$product_accessories_hot = $this->product_model->get_list($input);
			$this->data['product_accessories_hot'] = $product_accessories_hot;

			

			// foreach ($list_phone as $row) {

			// 	$this->load->model('product_model');
			// 	$input = array();
			// 	$input['limit'] = array(8, 0);
			// 	$input['where'] = array('is_hot' => 1);
			// 	$product_hot = $this->product_model->get_list($input);
			// 	$this->data['product_hot'] = $product_hot;

			// 	$input = array();
				
			// }
			

			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			
			$this->data['temp'] = 'site/home/index'; 
			$this->load->view('site/layout', $this->data);
		}
	}

?>