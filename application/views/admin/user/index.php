<?php 
	$this->load->view('admin/user/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data) ?>
		<div class="title">
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total; ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tên</td>
					<td>Email</td>
					<td>Điện thoại</td>
					<td>Địa chỉ</td>
					<td>Giới tính</td>
					<td>Thời gian tạo</td>
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
						<span title="<?php echo $row->email ?>" class="tipS">
							<?php echo $row->email ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->phone ?>" class="tipS">
							<?php echo $row->phone ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->place ?>" class="tipS">
							<?php echo $row->place ?>
						</span>
					</td>

					<td>
						<span class="tipS">
							<?php echo ($row->gender == 1 ? 'Nam' : 'Nữ')  ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->created ?>" class="tipS">
							<?php echo $row->created ?>
						</span>
					</td>
					
					
					<td class="option">
						<a href="<?php echo admin_url('user/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo admin_url('user/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
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
