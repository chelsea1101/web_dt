<?php 
	$this->load->view('admin/config/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<h6>Cập nhật cấu hình website
			</h6>
		</div>

		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="formRow">
					<label class="formLeft" for="param_name">Email:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="email" id="param_name" value="<?php echo $info->email?>" _autocheck="true" type="text"></span>
						<span name="logo_autocheck" class="autocheck"></span>
						<div name="logo_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Tên website:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="title_website" id="param_name" value="<?php echo $info->title_website?>" _autocheck="true" type="text"></span>
						<span name="title_website_autocheck" class="autocheck"></span>
						<div name="title_website_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Địa chỉ:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="place" id="param_name" value="<?php echo $info->place?>" _autocheck="true" type="text"></span>
						<span name="place_autocheck" class="autocheck"></span>
						<div name="place_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Số điện thoại hotline:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="hotline" id="param_name" value="<?php echo $info->hotline?>" _autocheck="true" type="text"></span>
						<span name="hotline_autocheck" class="autocheck"></span>
						<div name="hotline_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Đường dẫn địa chỉ:<span class="req"></span></label>
					<div class="formRight">
						<textarea name="place_link" id="param_place_link" rows="6">
							<?php echo $info->place_link?>
						</textarea>
						<div name="place_link_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Mô tả:<span class="req"></span></label>
					<div class="formRight">
						<textarea rows="6" name="descript" id="param_specs">
							<?php echo $info->descript?>
						</textarea>
						<div name="specs_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Facebook:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="facebook" id="param_name" value="<?php echo $info->facebook?>" _autocheck="true" type="text"></span>
						<span name="facebook_autocheck" class="autocheck"></span>
						<div name="facebook_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Youtube:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="youtube" id="param_name" value="<?php echo $info->youtube?>" _autocheck="true" type="text"></span>
						<span name="youtube_autocheck" class="autocheck"></span>
						<div name="youtube_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Instagram:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="instagram" id="param_name" value="<?php echo $info->instagram?>" _autocheck="true" type="text"></span>
						<span name="instagram_autocheck" class="autocheck"></span>
						<div name="instagram_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Twitter:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="twitter" id="param_name" value="<?php echo $info->twitter?>" _autocheck="true" type="text"></span>
						<span name="twitter_autocheck" class="autocheck"></span>
						<div name="twitter_error" class="clear error"></div>
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