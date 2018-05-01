<?php 
	$this->load->view('admin/slide/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data) ?>
		<div class="title">
			<h6>Danh sách liên hệ</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total; ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Mô tả</td>
					<td style="width:450px;">Ảnh</td>
					<td>Gắn với sản phẩm</td>
					<td>Vị trí</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
						<span title="<?php echo $row->descript ?>" class="tipS">
							<?php echo $row->descript ?>
						</span>
					</td>
					
					
					<td>
						<span title="" class="tipS">
							<img src="<?php echo base_url('upload/slide/'.$row->image) ?>" style="width: 100%;">
						</span>
					</td>
					
					<td>
						<span title="" class="tipS">
							<?php 
							foreach ($product as $row_product) {
								if($row->product_id == $row_product->id) 
									echo $row_product->name;
							}
							?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->position ?>" class="tipS">
							<?php echo $row->position ?>
						</span>
					</td>

					<td class="option">
						<a href="<?php echo admin_url('slide/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo admin_url('slide/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>
<div class="clear mt30"></div>
