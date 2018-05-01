<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?php echo base_url('product/catalog/'.$catalog->id) ?>"><?php echo $catalog->name ?></a>
                </li>
                <li class="active"><?php echo $product->name ?></li>
                <hr>
            </ol>
        </div>
    </div>
</div>
<div class="single_product">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="image_list" class="carousel slide" data-ride="carousel" style="border: 2px solid #eee">
                            <!-- Indicators -->

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php if(is_array($image_list)){ ?>
                                    <?php $i = 0; ?>
                                    <?php foreach ($image_list as $img) {
                                        $itemClass = "item";
                                        if ($i++ == 0)
                                        {
                                            $itemClass = "item active";
                                        }
                                        ?>
                                        <div class="<?php echo $itemClass ?>">
                                            <a href="<?php echo base_url('product/view/'.$product->id) ?>">
                                                <img src="<?php echo base_url('upload/product/'.$img)?>" alt="<?php echo $img ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#image_list" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#image_list" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1">
                <h3><b><?php echo $product->name ?></b></h3>
                <hr>
                <h5><b>Tình trạng: </b><?php echo ($product->status == 1 ? "<span style='color: green; font-weight: bold'>Còn hàng</span>" : "<span style='color: #d9534f; font-weight: bold'>Hết hàng</span>") ?></h5>
                <h5><b>Màu sắc: </b><?php echo $product->color ?></h5>
                <h5><b>Bảo hành: </b><?php echo $product->warranty ?></h5>
                <p style="display: inline-block;">Khuyến mại: </p>
                <h5><?php echo $product->gifts ?></h5>
                <hr>
                <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#specs">Thông số kỹ thuật</button>
                <div class="modal fade" id="specs" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thông số kỹ thuật</h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo $product->specs ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="price_product_2">
                    <?php 
                    if($product->discount > 0) 
                    {
                        $price_new = $product->price - ($product->price * ($product->discount / 100));
                    ?>
                    <del><?php echo number_format($product->price) ?> đ</del>
                    <span><?php echo number_format($price_new) ?> đ</span>
                    <?php
                    }
                    else
                    {
                    ?>
                    <span><?php echo number_format($product->price) ?> đ</span>
                    <?php 
                    }
                    ?>
                </div>
                <br>
                <?php if($product->status == 1){ ?>
                <a href="<?php echo base_url('cart/add/'.$product->id) ?>"><button type="button" class="btn btn-danger" style="font-size: 24px;">MUA HÀNG</button></a>
                <?php } ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9">
                <h3>Đặc điểm nổi bật</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
                            <div id="image_features" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner" role="listbox">
                                    <?php if(is_array($image_features)){ ?>
                                        <?php $i = 0; ?>
                                        <?php foreach ($image_features as $img_features) {
                                            $itemClass = "item";
                                            if ($i++ == 0)
                                            {
                                                $itemClass = "item active";
                                            }
                                            ?>
                                            <div class="<?php echo $itemClass ?>">
                                                <a href="<?php echo base_url('product/view/'.$product->id) ?>">
                                                    <img src="<?php echo base_url('upload/product/'.$img_features)?>" alt="<?php echo $img_features ?>">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#image_features" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#image_features" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </center>
                    </div>
                </div>
                <hr>
                <h3>Giới thiệu sản phẩm</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo $product->descript ?>
                    </div>
                </div>

                <hr>
                <h3>Bình luận </h3>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <h3>Các sản phẩm khác</h3>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php foreach ($list_product_involve as $row) {?>
                            <div class="col-xs-6 col-sm-6 col-md-12 box_product" style="border: none;height: auto;">
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
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>