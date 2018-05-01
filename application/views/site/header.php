<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">  
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $( "#text_search" ).autocomplete({
        source: "<?php echo site_url('product/search/1')?>",
    });
});
</script>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">8Mobile</a>
        </div>
        <form class="navbar-form navbar-left" method="get" action="<?php echo base_url('product/search')?>">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập để tìm kiếm" name="key_search" value="<?php echo isset($key) ? $key : ''?>" id="text_search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php foreach ($list_parent as $row) {?>
                    <li><a href="<?php echo base_url('product/catalog/'.$row->id) ?>" style="text-transform: uppercase;"><?php echo $row->name ?></a></li>
                <?php } ?>
                <li><a href="<?php echo base_url('contact') ?>">LIÊN HỆ</a></li>
                <li><a href="<?php echo base_url('cart') ?>"><span class="glyphicon glyphicon-shopping-cart"></span></span> GIỎ HÀNG <span class="badge"><?php echo $total_items ?></a></li>
                <?php if(isset($user_info)){?>
                    <li><a href="<?php echo base_url('user')?>"><code><?php echo $user_info->name ?></code></a></li>
                    <li><a href="<?php echo base_url('user/logout')?>">THOÁT</a></li>
                <?php }else{ ?>
                    <li><a href="<?php echo base_url('user/register')?>">ĐĂNG KÝ</a></li>
                    <li><a href="<?php echo base_url('user/login')?>">ĐĂNG NHẬP</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    $( document ).ready(function() {
        if($(window).width() < 481) 
        {
            $('.ui-autocomplete').css('top','102px');
            $('.ui-autocomplete').css('left','15px');
            $('.ui-autocomplete').css('right','15px');
            $('.ui-autocomplete').css('width','100%');
        }
        else if($(window).width() < 769)
        {
            $('.ui-autocomplete').css('top','42px');
            $('.ui-autocomplete').css('left','118px');
        }
        else
        {
            $('.ui-autocomplete').css('top','42px');
            $('.ui-autocomplete').css('left','200px');
        }
    });
</script>




