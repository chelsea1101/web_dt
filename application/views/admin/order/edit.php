<?php 
	$this->load->view('admin/order/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<h6>Cập nhật Đơn hàng
			</h6>
		</div>

		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="formRow">
					<label class="formLeft" for="param_name">Mã đơn hàng:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="id" id="param_id" value="<?php echo $info->id?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Tên khách hàng:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="user_name" id="param_user_name" value="<?php echo $info->user_name?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Email:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="user_email" id="param_user_email" value="<?php echo $info->user_email?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Số điện thoại:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="user_phone" id="param_user_phone" value="<?php echo $info->user_phone?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Địa chỉ:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="user_place" id="param_user_place" value="<?php echo $info->user_place?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Giới tính:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="user_gender" id="param_user_gender" value="<?php echo ($info->user_gender == 1 ? 'Nam' : 'Nữ')  ?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Số tiền:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="total" id="param_total" value="<?php echo $info->total?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Ghi chú:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="note" id="param_note" value="<?php echo $info->note?>" _autocheck="true" type="text" readonly></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Tình trạng:<span class="req"></span></label>
					<div class="formRight">
						<select class="form-control" id="status" name="status">
							<option value="0" <?php echo  ($info->status == 0) ? 'selected' : ''?>>Chờ xử lý</option>
	                        <option value="1" <?php echo  ($info->status == 1) ? 'selected' : ''?>>Đang vận chuyển</option>
	                        <option value="2" <?php echo  ($info->status == 2) ? 'selected' : ''?>>Hoàn thành</option>
<!-- 	                        <option value="3" <?php echo  ($info->status == 3) ? 'selected' : ''?>>Hủy đơn hàng</option> -->
	                    </select>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formSubmit">
           			<input type="submit" value="Cập nhật" class="redB">
           		</div>
			
			</fieldset>
		</form>
	</div>
</div>