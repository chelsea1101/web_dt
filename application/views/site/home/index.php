<div class="slide">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 carousel">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php $i = 0; ?>
                        <?php foreach ($slide_list as $row) {
                            $itemClass = "item";
                            if ($i++ == 0)
                            {
                                $itemClass = "item active";
                            }
                            ?>
                            <div class="<?php echo $itemClass ?>">
                                <a href="<?php echo base_url('product/view/'.$row->product_id) ?>">
                                    <img src="<?php echo base_url('upload/slide/'.$row->image)?>" alt="<?php echo $row->descript ?>">
                                </a>
                            </div>
                        <?php } ?>
                        

                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 sales">
                <div class="col-xs-12 col-sm-12 col-md-12 hidden-xs box_promo" style="background-color:#f0ad4e; padding: 20px">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 181px"></span>
                    <h3><b>CHẤT LƯỢNG ĐẢM BẢO</b></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="promo">
    <div class="container">
        <div class="col-xs-12 col-sm-6 col-md-3 box_promo" style="background-color:#e67e22">
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            <h4>30 NGÀY ĐỔI TRẢ</h4>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 box_promo" style="background-color:#d35400">
            <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
            <h4>MIỄN PHÍ VẬN CHUYỂN</h4>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 box_promo" style="background-color:#e74c3c">
            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            <h4>THANH TOÁN AN TOÀN</h4>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 box_promo" style="background-color:#c0392b">
            <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
            <h4>QUÀ TẶNG HẤP DẪN</h4>
        </div>
    </div>
</div>
<div class="list_product">
    <div class="container">
        <div class="title">
            <a class="btn btn-danger" href="list_product.html">SẢN PHẨM HOT<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="float: right;"></span></a>
        </div>
        <?php foreach ($product_hot as $row) {?>
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
                    <?php if($row->status == 1){ ?>
                    <a type="button" class="btn btn-success btn-lg btn-block" style="margin-top: 15px">Còn hàng</a>
                    <?php }else{ ?>
                    <a type="button" class="btn btn-danger btn-lg btn-block" style="margin-top: 15px">Hết hàng</a>
                    <?php } ?>

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
</div>

<div class="list_product">
    <div class="container">
        <div class="title">
            <a class="btn btn-danger" href="list_product.html">SẢN PHẨM MUA NHIỀU<span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="float: right;"></span></a>
        </div>
        <?php foreach ($product_buy as $row) {?>
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
                    <?php if($row->status == 1){ ?>
                    <a type="button" class="btn btn-success btn-lg btn-block" style="margin-top: 15px">Còn hàng</a>
                    <?php }else{ ?>
                    <a type="button" class="btn btn-danger btn-lg btn-block" style="margin-top: 15px">Hết hàng</a>
                    <?php } ?>
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
</div>