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
<!--         <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Các đơn hàng đã mua</h1>
            <hr>

        </div> -->
    </div>
</center>
