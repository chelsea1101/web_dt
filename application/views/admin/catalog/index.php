<?php 
	$this->load->view('admin/catalog/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data) ?>
		<div class="title">
			<h6>Danh sách Danh mục</h6>
		 	<div class="num f12">Tổng số: <b><?php echo count($list); ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tên danh mục</td>
					<td>Danh mục cha</td>
					<td>Vị trí</td>
					<td>Trạng thái</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>

 			
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
						<span title="<?php echo $row->name ?>" class="tipS">
							<?php echo $row->name ?>
						</span>
					</td>
					
					
					<td>
						<span title="" class="tipS">
							<?php foreach ($list_parent as $row_parent) {
								if($row->parent_id == $row_parent->id)
									echo $row_parent->name;
							} ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->position ?>" class="tipS">
							<?php echo $row->position ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->active ?>" class="tipS">
							<?php echo $row->active ?>
						</span>
					</td>
					
					
					<td class="option">
						<a href="<?php echo admin_url('catalog/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo admin_url('catalog/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
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
