<?php 
	$this->load->view('admin/order/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper" id="main_order">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>
				Danh sách đơn hàng		
			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="12">
				<form class="list_filter form" action="<?php echo admin_url('order/index') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td class="label" style="width:100px;">
									<label for="filter_id">Mã đơn hàng</label>
								</td>
								<td class="item" >
									<input name="id" value="<?php if(isset($filter_id)) echo $filter_id ?>" id="filter_id" type="text" style="width:55px;">
								</td>
								<td class="label" style="width:100px;">
									<label for="filter_id">Tên khách hàng</label>
								</td>
								<td class="item" style="width:155px;">
									<input name="name" value="<?php if(isset($filter_iname)) echo $filter_iname ?>" id="filter_iname" type="text" style="width:155px;">
								</td>
								
							</tr>
							<tr>
								<td class="label" style="width:100px;">
									<label for="filter_id">Email</label>
								</td>
								<td class="item" style="width:155px;">
									<input name="email" value="<?php if(isset($filter_email)) echo $filter_email ?>" id="filter_email" type="text" style="width:155px;">
								</td>
								<td class="label" style="width:100px;">
									<label for="filter_id">Số điện thoại</label>
								</td>
								<td class="item" style="width:155px;">
									<input name="phone" value="<?php if(isset($filter_phone)) echo $filter_phone ?>" id="filter_phone" type="text" style="width:155px;">
								</td>
								<td style="width:150px">
								<input type="submit" class="button blueB" value="Lọc">
								<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('order') ?>'; ">
								</td>
							</tr>
							<tr>
								<td class="label" style="width:100px;">
									<label for="filter_id">Trạng thái đơn hàng</label>
								</td>
								<td style="width:150px">
									<select name="status">
										<option value="">Tất cả</option>
										<option value="0" <?php echo (isset($filter_status) && $filter_status == 0) ? 'selected' : '' ?> style='color: blue'>Chờ xử lý</option>
										<option value="1" <?php echo (isset($filter_status) && $filter_status == 1) ? 'selected' : '' ?> style='color: gray'>Đang vận chuyển</option>
										<option value="2" <?php echo (isset($filter_status) && $filter_status == 2) ? 'selected' : '' ?> style='color: green'>Hoàn thành</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã đơn hàng</td>
					<td>Tên khách hàng</td>
					<td>Email</td>
					<td>Số điện thoại</td>
					<td>Địa chỉ</td>
					<td>Giới tính</td>
					<td>Số tiền</td>
					<td>Ghi chú</td>
					<td>Trạng thái</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="12">
						<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('order/delete_all')?>">
									<span style="color:white;">Xóa hết</span>
								</a>
						</div>
							
					    <div class="pagination">
			               	<?php echo $create_pagination ?>
		               	</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($list as $row) {?>

			    <tr class="row_<?php echo $row->id?>">
					<td>
						<input type="checkbox" name="id[]" value="<?php echo $row->id ?>">
					</td>

					<td class="textC">
						<?php echo $row->id ?>
					</td>

					<td class="textC">
						<?php echo $row->user_name ?>
					</td>

					<td class="textC">
						<?php echo $row->user_email ?>
					</td>

					<td class="textC">
						<?php echo $row->user_phone ?>
					</td>

					<td class="textC">
						<?php echo $row->user_place ?>
					</td>

					<td class="textC">
						<?php echo ($row->user_gender == 0) ? "Nữ" : "Nam" ?>
					</td>

					<td class="textC">
						<?php echo number_format($row->total) ?>
					</td>

					<td class="textC">
						<?php echo $row->note ?>
					</td>

					<td class="textC">
						<?php 
						if($row->status == 0){
							echo "<p style='color: blue'>Chờ xử lý</p>";
						}
						elseif ($row->status == 1) {
							echo "<p style='color: gray'>Đang vận chuyển</p>";
						}
						elseif ($row->status == 2) {
							echo "<p style='color: green'>Hoàn thành</p>";
						}
						// elseif ($row->status == 3){
						// 	echo "<p style='color: red'>Hủy đơn hàng</p>";
						// }
						?>
					</td>

					<td class="textC"><?php echo $row->created ?></td>
					
					<td class="option textC">
						<a href="<?php echo admin_url('order/view/'.$row->id) ?>" class="tipS" title="Xem chi tiết đơn hàng">
							<img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
			 			</a>
						<a href="<?php echo ($row->status == 2) ? '' : admin_url('order/edit/'.$row->id) ?>" title="<?php echo ($row->status == 2) ? 'Đơn hàng đã hoàn thành' : 'Chỉnh sửa' ?>" class="tipS">
							<img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
						</a>
						<a href="<?php echo admin_url('order/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action">
						    <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
						</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
	</div>
	
</div>