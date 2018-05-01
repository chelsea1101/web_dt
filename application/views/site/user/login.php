<center style="min-height: 500px">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Thành viên đăng nhập</h1>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="<?php echo base_url('user/login') ?>" method="post">
                    <?php if(!empty(form_error('login'))){ ?>
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo form_error('login') ?></strong>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" value="<?php echo set_value('email')?>">
                            <div style="color: #c12e2a"><?php echo form_error('email') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Mật khẩu:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                            <div style="color: #c12e2a"><?php echo form_error('password') ?></div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-danger btn-lg">ĐĂNG NHẬP</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</center>
