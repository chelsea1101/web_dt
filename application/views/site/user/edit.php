<center>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Chỉnh sửa thông tin thành viên</h1>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="<?php echo base_url('user/edit') ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" value="<?php echo $user->email?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mật khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nếu thay đổi mật khẩu thì nhập dữ liệu">
                            <div style="color: #c12e2a"><?php echo form_error('password') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="re_password"> Gõ lại mật khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="re_password" id="re_password">
                            <div style="color: #c12e2a"><?php echo form_error('re_password') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Họ và tên:</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên" value="<?php echo $user->name?>">
                            <div style="color: #c12e2a"><?php echo form_error('name') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gender">Giới tính:</label>
                        <div class="col-sm-10"> 
                            <select class="form-control" id="gender" name="gender">
                                <option value="1" <?php echo  ($user->gender == 1) ? 'selected' : ''?>>Nam</option>
                                <option value="0" <?php echo  ($user->gender == 0) ? 'selected' : ''?>>Nữ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $user->phone?>">
                            <div style="color: #c12e2a"><?php echo form_error('phone') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="place">Địa chỉ:</label>
                        <div class="col-sm-10"> 
                            <textarea class="form-control" rows="5" id="note" name="place"><?php echo $user->place?></textarea>
                            <div style="color: #c12e2a"><?php echo form_error('place') ?></div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-danger btn-lg">CHỈNH SỬA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</center>
