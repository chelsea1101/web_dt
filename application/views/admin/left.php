<div id="leftSide" style="padding-top:30px;">
	<div class="sideProfile">
		<a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url('admin') ?>/images/user.png" /></a>
		<span>Xin chào: <strong>Admin!</strong></span>
		<div class="clear"></div>
	</div>
	<div class="sidebarSep"></div>		    
	    <!-- Left navigation -->
		
	<ul id="menu" class="nav">

		<li class="home">
	
		<a href="<?php echo admin_url() ?>" class="active" id="current">
			<span>Bảng điều khiển</span>
			<strong></strong>
		</a>
		
					
		</li>
		<li class="tran">
		
			<a href="admin/tran.html" class=" exp" >
				<span>Quản lý bán hàng</span>
				<strong>1</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo admin_url('order') ?>">Đơn hàng</a>
				</li>
			</ul>
						
		</li>
		<li class="product">
			<a href="admin/product.html" class=" exp" >
				<span>Sản phẩm</span>
				<strong>2</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo admin_url('product') ?>">Sản phẩm</a>
				</li>
				<li >
					<a href="<?php echo admin_url('catalog') ?>">Danh mục</a>
				</li>
			</ul>
						
		</li>
		<li class="account">
		
			<a href="admin/account.html" class=" exp" >
				<span>Tài khoản</span>
				<strong>2</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo admin_url('admin') ?>">Ban quản trị</a>
				</li>
				<li >
					<a href="<?php echo admin_url('user') ?>">Thành viên</a>
				</li>
			</ul>			
		</li>
		<li class="support">
		
			<a href="admin/support.html" class=" exp" >
				<span>Liên hệ</span>
				<strong>1</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo admin_url('contact') ?>">Liên hệ</a>
				</li>
			</ul>				
		</li>

		<li class="content">
		
			<a href="admin/content.html" class=" exp" >
				<span>Nội dung</span>
				<strong>2</strong>
			</a>
			
			<ul class="sub">
				<li >
					<a href="<?php echo admin_url('slide') ?>">Ảnh bìa</a>
				</li>
				<li >
					<a href="<?php echo admin_url('config') ?>">Cấu hình</a>
				</li>
			</ul>
						
		</li>

	</ul>
</div>
<div class="clear"></div>