<?php 
	$this->load->view('admin/slide/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<h6>Thêm mới Ảnh bìa
			</h6>
		</div>

		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="formRow">
					<label class="formLeft" for="param_name">Mô tả:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="descript" id="param_descript" value="<?php echo set_value('descript')?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Gắn với sản phẩm:<span class="req"></span></label>
					<div class="formRight">
						<select name="product_id" class="left">
							<option value=""></option>
							<?php  
							foreach($products as $row){
							?>
							<option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
				            <?php
				            	}
				            ?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Ảnh:<span class="req"></span></label>
					<div class="formRight">
						<div class="left">
							<input type="file"  id="image" name="image"  >
						</div>
						<div name="image_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Vị trí:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="position" id="param_position" value="<?php echo set_value('position')?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formSubmit">
           			<input type="submit" value="Thêm mới" class="redB">
           		</div>
			
			</fieldset>
		</form>
	</div>
</div>