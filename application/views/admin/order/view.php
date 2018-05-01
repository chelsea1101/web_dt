<?php 
	$this->load->view('admin/order/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper" id="main_order">
	<div class="widget">
	
		<div class="title">
			<h6>
				Chi tiết đơn hàng	
			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr>
				<tr>
					<td style="width:60px;">Mã đơn hàng</td>
					<td>Tên sản phẩm</td>
					<td>Hình ảnh</td>
					<td>Số lượng</td>
					<td>Giá tiền</td>
				</tr>
			</thead>
			
			
			<tbody class="list_item">
				<?php foreach ($orders as $row) {?>

			    <tr class="row_<?php echo $row->id?>">

					<td class="textC">
						<?php echo $row->order_id ?>
					</td>

					<td class="textC">
						<?php echo $row->product->name ?>
					</td>

					<td class="textC">
						<img src="<?php echo base_url('upload/product/'.$row->product->image) ?>" alt="<?php echo $row->product->name ?>" style="max-width: 200px">
					</td>

					<td class="textC">
						<?php echo $row->quantity ?>
					</td>

					<td class="textC">
						<?php echo number_format($row->total) ?>
					</td>

				</tr>
				<?php } ?>
			</tbody>
			
		</table>
	</div>
	
</div>