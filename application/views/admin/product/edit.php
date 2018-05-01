<?php 
	$this->load->view('admin/product/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?php echo public_url('admin/images')?>/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật Sản phẩm</h6>
					</div>
					
				    <ul class="tabs">
		                <li><a href="#tab1">Thông tin chung</a></li>
		                <li><a href="#tab2">Thông số cấu hình</a></li>
		                <li><a href="#tab3">Khác</a></li>
					</ul>
					
					<div class="tab_container">
					     <div id='tab1' class="tab_content pd0">
					        <div class="formRow">
								<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo">
										<input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo $product->name?>" />
									</span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
								<div class="formRight">
									<select name="catalog" class="left">
										<option value=""></option>
											<!-- kiem tra danh muc co danh muc con hay khong -->
											<?php  
											foreach($catalogs as $row){
											?>
										      	<optgroup label="<?php echo $row->name ?>">
										      		<?php 
										      		foreach ($row->subs as $sub) {
										      		?>
										            	<option value="<?php echo $sub->id ?>" <?php echo  ($sub->id == $product->catalog_id) ? 'selected' : ''?>><?php echo $sub->name ?></option>
										            <?php 
										        	} 
										        	?>
									            </optgroup>
								            <?php
								            	}
								            ?>
									</select>
									<span name="cat_autocheck" class="autocheck"></span>
									<div name="cat_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
								<div class="formRight">
									<div class="left">
										<input type="file"  id="image" name="image"  ><br><br>
										<img src="<?php echo base_url('upload/product/'.$product->image)?>" style="width: 100px; height: 100px;">
									</div>
									<div name="image_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<?php $image_list = json_decode($product->image_list); ?>
							<div class="formRow">
								<label class="formLeft">Ảnh kèm theo:</label>
								<div class="formRight">
									<div class="left">
										<input type="file"  id="image_list" name="image_list[]" multiple><br>
										<?php if(is_array($image_list)){ ?>
										<?php foreach ($image_list as $img) {?>
										<img src="<?php echo base_url('upload/product/'.$img)?>" style="width: 100px; height: 100px; margin: 10px">
										<?php }} ?>
									</div>
									<div name="image_list_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<?php $image_features = json_decode($product->image_features); ?>
							<div class="formRow">
								<label class="formLeft">Ảnh tính năng nổi bật:</label>
								<div class="formRight">
									<div class="left">
										<input type="file"  id="image_features" name="image_features[]" multiple><br>
										<?php foreach ($image_features as $img) {?>
										<img src="<?php echo base_url('upload/product/'.$img)?>" style="width: 200px; height: 100px; margin: 10px">
										<?php } ?>
									</div>
									<div name="image_features_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<!-- Price -->
							<div class="formRow">
								<label class="formLeft" for="param_price">
									Giá :
									<span class="req">*</span>
								</label>
								<div class="formRight">
									<span class="oneTwo">
										<input name="price" value="<?php echo $product->price?>" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" />
										<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?php echo public_url('admin/crown')?>/images/icons/notifications/information.png'/>
									</span>
									<span name="price_autocheck" class="autocheck"></span>
									<div name="price_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<!-- Price -->
							<div class="formRow">
								<label class="formLeft" for="param_discount">
									Giảm giá (%) 
									<span></span>:
								</label>
								<div class="formRight">
									<span>
										<input name="discount" value="<?php echo $product->discount?>" style='width:100px' id="param_discount" class="format_number"  type="text" />
										<img class='tipS' title='Phần trăm giảm giá' style='margin-bottom:-8px'  src='<?php echo public_url('admin/crown')?>/images/icons/notifications/information.png'/>
									</span>
									<span name="discount_autocheck" class="autocheck"></span>
									<div name="discount_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_color">
									Màu sắc :
								</label>
								<div class="formRight">
									<span class="oneFour">
										<input name="color" id="param_color" value="<?php echo $product->color?>" type="text" />
									</span>
									<span name="color_autocheck" class="autocheck"></span>
									<div name="color_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<!-- warranty -->
							<div class="formRow">
								<label class="formLeft" for="param_warranty">
									Bảo hành :
								</label>
								<div class="formRight">
									<span class="oneFour">
										<input name="warranty" id="param_warranty" value="<?php echo $product->warranty?>" type="text" />
									</span>
									<span name="warranty_autocheck" class="autocheck"></span>
									<div name="warranty_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_gifts">
									Quà tặng:
								</label>
								<div class="formRight">
									<span class="oneTwo">
										<textarea name="gifts" id="param_gifts" rows="4" cols="">
											<?php echo $product->gifts?>
										</textarea>
									</span>
									<span name="gifts_autocheck" class="autocheck"></span>
									<div name="gifts_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>					         
							<div class="formRow hide"></div>
				 		</div>
													 						 
						<div id='tab2' class="tab_content pd0">
							<div class="formRow">
								<label class="formLeft">Thông số kĩ thuật:</label>
								<div class="formRight">
									<textarea name="specs" id="param_specs" class="editor">
										<?php echo $product->specs?>
									</textarea>
									<div name="specs_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>
				    		<div class="formRow hide"></div>
				    		<div class="formRow">
								<label class="formLeft">Giới thiệu sản phẩm:</label>
								<div class="formRight">
									<textarea name="descript" id="param_descript" class="editor">
										<?php echo $product->descript?>
									</textarea>
									<div name="descript_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>
				    		<div class="formRow hide"></div>
						</div>

						<div id='tab3' class="tab_content pd0" >
													     			
							<div class="formRow">
								<label class="formLeft" for="param_is_hot">
									Sản phẩm hot :
								</label>
								<div class="formRight">
									<span class="oneFour">
										<input name="is_hot" id="param_is_hot" value="<?php echo $product->is_hot?>" type="text" /></span>
									<span name="is_hot_autocheck" class="autocheck"></span>
									<div name="is_hot_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_status">
									Tình trạng còn hàng :
								</label>
								<div class="formRight">
									<span class="oneFour">
										<input name="status" id="param_status" value="<?php echo $product->status?>" type="text" />
									</span>
									<span name="status_autocheck" class="autocheck"></span>
									<div name="status_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="formRow">
								<label class="formLeft" for="param_active">
									Trạng thái :
								</label>
								<div class="formRight">
									<span class="oneFour">
										<input name="active" id="param_active" value="<?php echo $product->active?>" type="text" />
									</span>
									<span name="active_autocheck" class="autocheck"></span>
									<div name="active_error" class="clear error"></div>
								</div>
								<div class="clear"></div>
							</div>
						    <div class="formRow hide"></div>
						</div>
	        		</div>
	        		
	        		<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
		<div class="clear mt30"></div>

