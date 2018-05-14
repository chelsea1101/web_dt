<?php 
	$this->load->view('admin/config/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data) ?>
		<div class="title">
			<h6>Cấu hình website</h6>
		 	<div class="num f12">Tổng số: <b>1</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td>Mã số</td>
					<td>Email</td>
					<td>Tên website</td>
					<td>Địa chỉ</td>
					<td>Số điện thoại hotline</td>
					<td>Mô tả</td>
					<td>Facebook</td>
					<td>Youtube</td>
					<td>Instagram</td>
					<td>Twitter</td>
					<td>Hành động</td>
				</tr>
			</thead>
 			
			<tbody>
				<?php foreach ($list as $row):?>
				<tr>
					
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
						<span title="<?php echo $row->email ?>" class="tipS">
							<?php echo $row->email ?>
						</span>
					</td>
					
					
					<td>
						<span title="<?php echo $row->title_website ?>" class="tipS">
							<?php echo $row->title_website ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->place ?>" class="tipS">
							<?php echo $row->place ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->hotline ?>" class="tipS">
							<?php echo $row->hotline ?>
						</span>
					</td>
					
					<td>
						<span title="<?php echo $row->descript ?>" class="tipS">
							<?php echo $row->descript ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->facebook ?>" class="tipS">
							<?php echo $row->facebook ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->youtube ?>" class="tipS">
							<?php echo $row->youtube ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->instagram ?>" class="tipS">
							<?php echo $row->instagram ?>
						</span>
					</td>

					<td>
						<span title="<?php echo $row->twitter ?>" class="tipS">
							<?php echo $row->twitter ?>
						</span>
					</td>
					
					<td class="option">
						<a href="<?php echo admin_url('config/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>
<div class="clear mt30"></div>
