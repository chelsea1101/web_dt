<div id="center_space" style="min-height: 1000px;overflow: auto;">
    <div id="cart">
        <center>
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h1>Giỏ hàng của bạn</h1>
                    <hr>
                    <div class="table-responsive">
                        <?php if($total_items > 0) {?>
                        <form method="post" action="<?php echo base_url('cart/update') ?>">
                            <table class="table" style="font-size: 16px;">
                                <thead>
                                    <tr class="danger">
                                        <th width="10%"></th>
                                        <th width="30%">Sản phẩm</th>
                                        <th width="15%">Đơn giá</th>
                                        <th width="10%">Số lượng</th>
                                        <th width="25%">Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_price = 0; ?>
                                    <?php foreach ($carts as $row) {?>
                                    <?php $total_price = $total_price + $row['subtotal']; ?>
                                    <tr>
                                        <td width="10%"><img src="<?php echo base_url('upload/product/'.$row['image'])?>" class="img-thumbnail"></td>
                                        <td width="30%"><a href="<?php echo base_url('product/view/'.$row['id']) ?>"><?php echo $row['name'] ?></a></td>
                                        <td width="15%"><?php echo number_format($row['price']) ?> đ</td>
                                        <td width="10%"><input type="number" name="qty_<?php echo $row['id'] ?>" min="0" max="10" value="<?php echo $row['qty'] ?>"></td>
                                        <td width="25%"><?php echo number_format($row['subtotal']) ?> đ</td>
                                        <td width="8%"><a class="btn btn-danger" href="<?php echo base_url('cart/delete/'.$row['id']) ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="30%"></td>
                                        <td width="15%">Tổng tiền</td>
                                        <td width="10%"><?php echo $total_items ?> (sp)</td>
                                        <td width="25%"><?php echo number_format($total_price) ?> đ</td>
                                        <td width="8%"><a href="<?php echo base_url('cart/delete') ?>" style="color: #c12e2a">Xóa hết</a></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="30%"><a href="<?php echo base_url() ?>"><button type="button" name="btnGoHome" class="btn btn-danger">Về trang chủ</button></a></td>
                                        <td width="15%"><button type="submit" name="btnUpdate" class="btn btn-danger">Cập nhật</button></td>
                                        <td width="10%"></td>
                                        <td width="25%"><a href="<?php echo base_url('order/checkout') ?>"><button type="button" name="btnCheckout" class="btn btn-warning">MUA HÀNG</button></a></td>
                                        <td width="8%"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <?php } else{?>
                            <h5>Không có sản phẩm nào trong giỏ hàng</h5>
                        <?php } ?>
                    </div>
                    <hr>
                </div>
                
            </div>
        </center>
    </div>
</div>