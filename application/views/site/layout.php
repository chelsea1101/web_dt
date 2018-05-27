<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('site/head');?>
</head>
<body>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '165151460847062',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/vi_VN/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-customerchat" page_id="230167837576005"></div>
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