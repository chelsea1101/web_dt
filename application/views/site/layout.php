<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('site/head');?>
</head>
<body>
    <div class="menu">
        <?php $this->load->view('site/header') ?>
    </div>
    <div class="container">
    	<?php if(isset($message)) {?>
	    	<!-- <script type="text/javascript">alert('<?php echo $message ?>')</script> -->
	    	<div class="alert alert-success">
	    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $message ?></strong>
			</div>
	    <?php } ?>
    </div>
    <?php $this->load->view($temp, $this->data) ?>
    <div class="footer">
        <?php $this->load->view('site/footer') ?>
    </div>
</body>
</html>