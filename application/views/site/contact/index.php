<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url() ?>">Trang chủ</a>
                </li>
                <li class="active">Liên hệ</li>
                <hr>
            </ol>
        </div>
    </div>
</div>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form">
                    <form action="<?php echo base_url('contact/index') ?>" method="post"> 
                        <h3>Cửa hàng <?php echo $config->title_website ?></h3>
                        <p>Địa chỉ: <?php echo $config->place ?></p>
                        <p style="font-weight: bold">TỔNG ĐÀI HỖ TRỢ: <?php echo $config->hotline ?></p>
                        <p>Email hỗ trợ: <span style="font-weight: bold"><?php echo $config->email ?></span></p>
                        <p style="color:#C00;font-style:italic">Với mong muốn ngày càng phục vụ khách hàng tốt hơn, chúng tôi rất mong muốn nhận được ý kiến phản hồi từ Quý khách mua hàng.</p>
                        <p style="color:#C00;font-style:italic;font-weight:bold">Nếu Quý khách có điều gì chưa hài lòng đừng ngần ngại liên hệ với chúng tôi:</p>
                        Họ và tên: <input type="text" name="name"  class="form-control" value="<?php echo set_value('name')?>" required>
                        <div style="color: #c12e2a"><?php echo form_error('name') ?></div>
                        Điện thoại: <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone')?>" required>
                        <div style="color: #c12e2a"><?php echo form_error('phone') ?></div>
                        Email: <input type="email" name="email" class="form-control" value="<?php echo set_value('email')?>" required>
                        <div style="color: #c12e2a"><?php echo form_error('email') ?></div>
                        Địa chỉ: <input type="text" name="place" class="form-control" value="<?php echo set_value('place')?>" required>
                        <div style="color: #c12e2a"><?php echo form_error('place') ?></div>
                        Yêu cầu: <textarea name="content" class="form-control" rows="5"><?php echo set_value('content')?></textarea>
                        <div style="color: #c12e2a"><?php echo form_error('content') ?></div>
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8" style="padding-top: 20px;">
                <?php echo $config->place_link ?>
            </div> 
        </div>
    </div>
</div>