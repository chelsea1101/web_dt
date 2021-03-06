<?php 
Class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	function view()
	{
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		if(!$product)
		{
			redirect();
		}
		$this->data['product'] = $product;

		$image_list = @json_decode($product->image_list);
		$this->data['image_list'] = $image_list;

		$image_features = @json_decode($product->image_features);
		$this->data['image_features'] = $image_features;

		$data = array();
		$data['view'] = $product->view + 1;
		$this->product_model->update($product->id, $data);

		$this->load->model('catalog_model');
		$catalog = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog'] = $catalog;

		$input = array();
		$input['limit'] = array(4, 0);
		$input['where'] = array('catalog_id' => $product->catalog_id);
		$list_product_involve = $this->product_model->get_list($input);
		$this->data['list_product_involve'] = $list_product_involve;

		$this->data['temp'] = 'site/product/view';
		$this->load->view('site/layout', $this->data);
	}

	function catalog()
	{
		$id = intval($this->uri->rsegment(3));
		$this->load->model('catalog_model');
		$catalog = $this->catalog_model->get_info($id);
		if(!$catalog)
		{
			redirect();
		}
		$this->data['catalog'] = $catalog;
		$this->data['id'] = $id;
		



		$input = array();

		//ktra dmuc cha
		if($catalog->parent_id == 0)
		{
			$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => $id);
			$input_catalog['order'] = array('position','ASC');
			$catalog_subs = $this->catalog_model->get_list($input_catalog);
			$this->data['catalog_subs'] = $catalog_subs;
			// pre($catalog_subs);
			if(!empty($catalog_subs))
			{
				$catalog_subs_id = array();
				foreach ($catalog_subs as $sub) {
					$catalog_subs_id[] = $sub->id;
				}
				$this->db->where_in('catalog_id', $catalog_subs_id);

			}
			else
			{
				$input['where'] = array('catalog_id' => $id);
			}
			
		}
		else
		{
			$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => $catalog->parent_id);
			$input_catalog['order'] = array('position','ASC');
			$catalog_subs = $this->catalog_model->get_list($input_catalog);
			$this->data['catalog_subs'] = $catalog_subs;

			$input['where'] = array('catalog_id' => $id);
		}

		$is_get = 1;
		//loc
		if($this->input->get())
		{
			$price_from = intval($this->input->get('price_from'));
			$price_to = intval($this->input->get('price_to'));
			$manufacturer = $this->input->get('manufacturer');
			$order = $this->input->get('order');

			$this->data['price_from'] = $price_from;
			$this->data['price_to'] = $price_to;
			$this->data['manufacturer'] = $manufacturer;
			$this->data['order'] = $order;

			// $input['where'] = array('price >=' => $price_from, 'price <=' => $price_to, 'catalog_id' => $manufacturer);

			if(empty($manufacturer))
			{
				if(($price_from >=0) && ($price_to >=0) && ($price_from < $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >=' => $price_from, '(price - (discount * price)/100) <=' => $price_to);
				}
				if(($price_from >=0) && ($price_to ==0) && ($price_from > $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >=' => $price_from);
				}
				if(($price_from >=0) && ($price_to >=0) && ($price_from == $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) =' => $price_from);
				}
				if(($price_from >0) && ($price_to !=0) && ($price_from > $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >' => 1000000000000000);
				}
				if(($price_from == 0) && ($price_to ==0))
				{
					$input['where'] = array();
				}
			}
			else
			{
				if(($price_from >=0) && ($price_to >=0) && ($price_from < $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >=' => $price_from, '(price - (discount * price)/100) <=' => $price_to, 'catalog_id' => $manufacturer);
				}
				if(($price_from >=0) && ($price_to ==0) && ($price_from > $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >=' => $price_from, 'catalog_id' => $manufacturer);
				}
				if(($price_from >=0) && ($price_to >=0) && ($price_from == $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) =' => $price_from, 'catalog_id' => $manufacturer);
				}
				if(($price_from >0) && ($price_to !=0) && ($price_from > $price_to))
				{
					$input['where'] = array('(price - (discount * price)/100) >' => 1000000000000000, 'catalog_id' => $manufacturer);
				}
				if(($price_from == 0) && ($price_to ==0))
				{
					$input['where'] = array('catalog_id' => $manufacturer);
				}
			}
			if($order == 1)
				$input['order'] = array('(price - (discount * price)/100)','ASC');
			elseif($order == 2)
				$input['order'] = array('(price - (discount * price)/100)','DESC');
			elseif($order == 3)
				$input['order'] = array('buyed','DESC');
			elseif($order == 4)
				$input['where'] = array('is_hot' => 1);
			elseif($order == 5)
				$input['where'] = array('discount >' => 0);
			// $curent_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			// $path = parse_url($curent_url)['query'];
			// pre(parse_url($curent_url)['path']);
			$is_get = 0;

		}

		if(!isset($order))
		{
			$input['order'] = array('(price - (discount * price)/100)','ASC');
		}
		$total_rows = $this->product_model->get_total($input); 
		$this->data['total_rows'] = $total_rows;

		$this->load->library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows; //tong sp tren website
		if ($is_get == 0) {
			$config['reuse_query_string'] = FALSE;
			$config['suffix'] = '?price_from='.$price_from.'&price_to='.$price_to.'&manufacturer='.$manufacturer.'&order='.$order;
			$config['base_url'] = base_url('product/catalog/'.$id); //link hien thi ra ds sp
			$config['first_url'] = $config['base_url'] . '/' . $config['suffix'];

		}
		$config['base_url'] = base_url('product/catalog/'.$id); 
		// $config['first_url'] = $config['base_url'] . $config['suffix'];
		$config['per_page'] = 8; //slg hien thi tren 1 trang
		$config['uri_segment'] = 4; //pahn doan hien thi so trang tren url



		$config['full_tag_open'] = '<ul class="pagination"><li>';
    	$config['full_tag_close'] = '</li></ul>';

		$config['prev_link'] = "Trước";
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';

	    $config['next_link'] = "Tiếp";
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';

	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';

	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';

	    $config['first_link'] = "Đầu tiên";
	    $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";

		$config['last_link'] = "Cuối cùng";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config); //khoi tao cac cau hinh ph.trang

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		
		$input['limit'] = array($config['per_page'], $segment);
		

		if(isset($catalog_subs_id))
		{
			$this->db->where_in('catalog_id', $catalog_subs_id);
		}
		
		$curent_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$reset = 'http://localhost:3030'.parse_url($curent_url)['path'];
		$this->data['reset'] = $reset;

		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;

		$input_price_max = array();
		$input_price_max['order'] = array('price','DESC');
		$input_price_max['limit'] = array(1,0);
		$list_price_max = $this->product_model->get_list($input_price_max);

		foreach ($list_price_max as $row) {
			$price_max = $row->price;
		}
		$this->data['price_max'] = $price_max;

		$this->data['temp'] = 'site/product/catalog';
		$this->load->view('site/layout', $this->data);
	}

	function search()
	{
		if($this->uri->rsegment('3') == 1)
		{
			//lay dlieu tu autocomplete
			$key = $this->input->get('term');
		}
		else
		{
			$key = $this->input->get('key_search');
		}
		$this->data['key'] = trim($key);

		$input = array();
		$input['like'] = array('name', $key);
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;

		$total_rows = $this->product_model->get_total($input); 
		$this->data['total_rows'] = $total_rows;

		
		if($this->uri->rsegment('3') == 1)
		{
			//autocomplete
			$result = array();
			foreach ($list as $row) {
				$item = array();
				$item['id'] = $row->id;
				$item['label'] = $row->name;
				$item['value'] = $row->name;
				$result[] = $item;
			}
			die(json_encode($result));
		}
		else
		{
			$this->data['temp'] = 'site/product/search';
			$this->load->view('site/layout', $this->data);
		}	
	}

}

?>