<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 introduction">
            <h4>GIỚI THIỆU</h4>
            <h5><?php echo $config->descript ?></h5>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-4 catalog">
            <h4>DANH MỤC SẢN PHẨM</h4>
            <?php foreach ($list_parent as $row) {?>
                <a class="btn btn-warning btn-block" href="<?php echo base_url('product/catalog/'.$row->id) ?>"><?php echo $row->name ?></a>
            <?php } ?>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-4 connect">
            <h4>LIÊN KẾT</h4>
            <h5>Tổng đài hỗ trợ: 19001009</h5>
            <h5>Mạng xã hội:</h5>
            <ul>
                <li><a href="<?php echo $config->facebook ?>"><img src="<?php echo public_url()?>/site/images/004-facebook.png" alt="facebook"></a></li>
                <li><a href="<?php echo $config->youtube ?>"><img src="<?php echo public_url()?>/site/images/001-youtube.png" alt="youtube"></a></li>
                <li><a href="<?php echo $config->instagram ?>"><img src="<?php echo public_url()?>/site/images/002-instagram.png" alt="instagram"></a></li>
                <li><a href="<?php echo $config->twitter ?>"><img src="<?php echo public_url()?>/site/images/003-twitter.png" alt="twitter"></a></li>
            </ul>
        </div>
    </div>
    <br>
    <center><h5>@ 2018 Trần Tiến Đạt</h5></center>
</div>