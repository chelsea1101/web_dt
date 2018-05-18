<div class="promo">
    <div class="container">
        <div class="col-xs-6 col-sm-6 col-md-3 box_promo" style="background-color:#e67e22">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            <h4>30 NGÀY ĐỔI TRẢ</h4>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 box_promo" style="background-color:#d35400">
            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            <h4>MIỄN PHÍ VẬN CHUYỂN</h4>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 box_promo" style="background-color:#e74c3c">
            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            <h4>THANH TOÁN AN TOÀN</h4>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 box_promo" style="background-color:#c0392b">
            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
            <h4>QUÀ TẶNG HẤP DẪN</h4>
        </div>
    </div>
</div>
<center>
    <h1>Kết quả tìm kiếm</h1>
    <p>Từ khóa "<?php echo $key; ?>"</p>

</center>
<div id="wrapper" style="min-height: 1000px;">
    <div class="list_product">
        <div class="container">
            <hr>
            <div class="title">
                <a class="btn btn-danger" href="">(<?php echo $total_rows ?> sản phẩm)</a>
            </div>
            <?php foreach ($list as $row) {?>
                <div class="col-xs-6 col-sm-6 col-md-3 box_product">
                    <a href="<?php echo base_url('product/view/'.$row->id) ?>" class="thumbnail"><img src="<?php echo base_url('/upload/product/'.$row->image) ?>" alt="<?php echo $row->name ?>"></a>
                    <center class="price_product">
                        <h4><b><a href="<?php echo base_url('product/view/'.$row->id) ?>"><?php echo $row->name ?></a></b></h4>
                        <?php 
                        if($row->discount > 0) 
                        {
                            $price_new = $row->price - ($row->price * ($row->discount / 100));
                        ?>
                        <del><?php echo number_format($row->price) ?> đ</del>
                        <span><?php echo number_format($price_new) ?> đ</span>
                        <?php
                        }
                        else
                        {
                        ?>
                        <span><?php echo number_format($row->price) ?> đ</span>
                        <?php 
                        }
                        ?>
                        
                    </center>  
                    <div class="info_product">
                        <center>
                            <center class="price_product_hover">
                                <a href="<?php echo base_url('product/view/'.$row->id) ?>" class="btn btn-warning btn-lg btn-block">Xem chi tiết</a>
                            </a>
                                <h4><b><a href="<?php echo base_url('product/view/'.$row->id) ?>"><?php echo $row->name ?></a></b></h4>
                                <?php 
                                if($row->discount > 0) 
                                {
                                    $price_new = $row->price - ($row->price * ($row->discount / 100));
                                ?>
                                <del><?php echo number_format($row->price) ?> đ</del>
                                <span><?php echo number_format($price_new) ?> đ</span>
                                <?php
                                }
                                else
                                {
                                ?>
                                <span><?php echo number_format($row->price) ?> đ</span>
                                <?php 
                                }
                                ?>
                                <br><br>
                            </center>
                            <a href="<?php echo base_url('product/view/'.$row->id) ?>">
                                <p>Màu sắc: <?php echo $row->color ?></p>
                                <p>Bảo hành: <?php echo $row->warranty ?></p>
                                <p style="display: inline-block;">Khuyến mại: </p>
                                <p><?php echo $row->gifts ?></p>
                            </a>
                        </center>
                    </div>
                </div>
            <?php } ?>    
        </div>
        <br>

    </div>
</div>