<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php $this->load->view('admin/head'); ?>
</head>
<body>
	<div id="left_content">
		<?php $this->load->view('admin/left'); ?>
	</div>
	<div id="rightSide">
		<?php $this->load->view('admin/header'); ?>


		<?php $this->load->view($temp, $this->data); ?>

		<?php $this->load->view('admin/footer'); ?>
	</div>
	<div class="clear"></div>

</body>
</html>