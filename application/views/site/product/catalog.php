<?php 
    $price_from_select = isset($price_from) ? intval($price_from) : 0;
    $price_to_select = isset($price_to) ? intval($price_to) : 0;
?>
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Trang chủ</a>
                </li>
                <li class="active"><?php echo $catalog->name ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- <div class="promo">
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
</div> -->

<div id="wrapper" style="min-height: 1000px;">
    <div class="list_product">
        <div class="container">
            <center>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-inline" action="<?php echo base_url('product/catalog/'.$catalog->id) ?>" method="get">
                            <div class="form-group">
                                <label for="price_from">Giá từ</label>
                                <select class="form-control" id="price_from" name="price_from">
                                    <?php for($i = 0; $i <= 50000000; $i = $i + 2000000){ ?>
                                    <option <?php echo ($price_from_select == $i) ? 'selected' : '' ?> value="<?php echo $i?>"><?php echo number_format($i) ?> đ</option>
                                    <?php } ?>  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price_to">Giá đến</label>
                                <select class="form-control" id="price_to" name="price_to">
                                    <?php for($i = 0; $i <= 50000000; $i = $i + 2000000){ ?>
                                    <option <?php echo ($price_to_select == $i) ? 'selected' : '' ?> value="<?php echo $i?>"><?php echo number_format($i) ?> đ</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Hãng</label>
                                <select class="form-control" id="manufacturer" name="manufacturer">
                                    <option ></option>
                                    <?php foreach ($catalog_subs as $sub) {?>
                                        <option <?php if(isset($manufacturer)) {echo ($manufacturer == $sub->id) ? 'selected' : '' ;}?> value="<?php echo $sub->id ?>"><?php echo $sub->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="order">Sắp xếp</label>
                                <select class="form-control" id="order" name="order">
                                    <option <?php if(isset($order)) {echo ($order == 1) ? 'selected' : '' ;}?> value="1">Giá từ thấp đến cao</option>
                                    <option <?php if(isset($order)) {echo ($order == 2) ? 'selected' : '' ;}?> value="2">Giá từ cao đến thấp</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">Lọc</button>
                            <a href="<?php base_url('product/catalog/'.$catalog->id) ?>" class="btn btn-info">Reset</a>
                        </form>
                    </div>
                </div>
            </center>
            <div class="title">
                <a class="btn btn-danger" href=""><?php echo $catalog->name ?> (<?php echo $total_rows ?> sản phẩm)</a>
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
        <br>
        <center>
            <?php echo $this->pagination->create_links() ?>
        </center>
    </div>
</div>