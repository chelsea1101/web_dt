<?php 
	$this->load->view('admin/contact/head', $this->data);
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
					<td>Họ và tên</td>
					<td>Email</td>
					<td>Điện thoại</td>
					<td>Địa chỉ</td>
					<td>Nội dung</td>
					<td>Ngày tạo</td>
				</tr>
			</thead>
			
 			
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
						<span title="<?php echo $row->user_name ?>" class="tipS">
							<?php echo $row->user_name ?>
						</span>
					</td>
					
					
					<td>
						<span title="<?php echo $row->user_email ?>" class="tipS">
							<?php echo $row->user_email ?>
						</span>
					</td>
					
					<td>
						<span title="<?php echo $row->user_phone ?>" class="tipS">
							<?php echo $row->user_phone ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->user_place ?>" class="tipS">
							<?php echo $row->user_place ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->content ?>" class="tipS">
							<?php echo $row->content ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->created ?>" class="tipS">
							<?php echo get_date($row->created) ?>
						</span>
					</td>

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>
<div class="clear mt30"></div>
