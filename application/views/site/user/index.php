<center>
    <div class="container">
        <?php if(isset($message)) {?>
            <!-- <script type="text/javascript">alert('<?php echo $message ?>')</script> -->
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $message ?></strong>
            </div>
        <?php } ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Thông tin thành viên</h1>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" value="<?php echo $user->email ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Họ và tên:</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên" value="<?php echo $user->name ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gender">Giới tính:</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="gender" id="gender" value="<?php echo ($user->gender == 1 ? 'Nam' : 'Nữ')  ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $user->phone ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="place">Địa chỉ:</label>
                        <div class="col-sm-10"> 
                            <textarea class="form-control" rows="5" id="note" name="place" disabled><?php echo $user->place ?></textarea>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                            <a href="<?php echo base_url('user/edit/') ?>"><button type="button" class="btn btn-danger" style="font-size: 18px;">SỬA THÔNG TIN</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Các đơn hàng đã mua</h1>
            <hr>
            <div class="table-responsive">
                <?php foreach ($orders as $row_orders) { ?>
                <table class="table" style="font-size: 16px;">
                    <thead>
                        <tr class="danger">
                            <th>Mã đơn hàng:</th>
                            <th><?php echo $row_orders->id ?></th>
                            <th></th>
                            <th>Tình trạng:</th>
                            <th>
                                <?php 
                                if($row_orders->status == 0){
                                    echo "Chờ xử lý";
                                }
                                elseif ($row_orders->status == 1) {
                                    echo "Đang vận chuyển";
                                }
                                elseif ($row_orders->status == 2) {
                                    echo "Hoàn thành";
                                }?>
                                    
                            </th>
                        </tr>
                        <tr>
                            <th width="10%"></th>
                            <th width="30%">Sản phẩm</th>
                            <th width="15%">Đơn giá</th>
                            <th width="10%">Số lượng</th>
                            <th width="15%">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders_detail as $row_orders_detail) { 
                                foreach ($products as $row_product) {?>
                        <tr>
                            <td width="10%"><img src="<?php echo base_url('/upload/product/'.$row_product->image) ?>" alt="<?php echo $row_product->name ?>" width = 100px></td>
                            <td width="30%"><a href=""><?php echo $row_product->name ?></a></td>
                            <td width="15%"><?php echo number_format($row_product->price - ($row_product->price * ($row_product->discount / 100)))?> đ</td>
                            <td width="10%"><?php echo $row_orders_detail->quantity ?></td>
                            <td width="15%"><?php echo number_format($row_orders_detail->total)?> đ</td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                    <tbody>
                        <tr class="danger">
                            <td width="10%"></td>
                            <td width="30%"></td>
                            <td width="15%">Tổng tiền</td>
                            <td width="10%"></td>
                            <td width="15%"><?php echo number_format($row_orders->total)?> đ</td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div> -->
    </div>
</center>
