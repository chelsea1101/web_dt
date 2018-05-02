<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Trang chủ</a>
                </li>
                <li class="active">Thanh toán</li>
            </ol>
        </div>
    </div>
</div>
<div id="center_space" style="min-height: 600px;overflow: auto;">
    <div id="checkout">
        <center>
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h1>Thông tin thanh toán</h1>
                    <hr>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                        <form class="form-horizontal" action="<?php echo base_url('order/checkout') ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tổng tiền:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo number_format($total_price) ?> đ" readonly="readonly" name="total">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="<?php echo isset($user->email) ? $user->email : set_value('email')?>">
                                    <div style="color: #c12e2a"><?php echo form_error('email') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Họ và tên:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên" value="<?php echo isset($user->name) ? $user->name : set_value('name')?>">
                                    <div style="color: #c12e2a"><?php echo form_error('name') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="gender">Giới tính:</label>
                                <div class="col-sm-10"> 
                                    
                                    <select class="form-control" id="gender" name="gender">
                                        <?php if(!empty($user)) { ?>
                                        <option value="1" <?php echo  ($user->gender == 1) ? 'selected' : ''?>>Nam</option>
                                        <option value="0" <?php echo  ($user->gender == 0) ? 'selected' : ''?>>Nữ</option>
                                        <?php } else{ ?>
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?php echo isset($user->phone) ? $user->phone : set_value('phone')?>">
                                    <div style="color: #c12e2a"><?php echo form_error('phone') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="place">Địa chỉ:</label>
                                <div class="col-sm-10"> 
                                    <textarea class="form-control" rows="5" id="place" name="place"><?php echo isset($user->place) ? $user->place : set_value('place')?></textarea>
                                </div>
                                <div style="color: #c12e2a"><?php echo form_error('place') ?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="note">Ghi chú:</label>
                                <div class="col-sm-10"> 
                                    <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                                </div>
                                <div style="color: #c12e2a"><?php echo form_error('note') ?></div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-danger btn-lg">THANH TOÁN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>