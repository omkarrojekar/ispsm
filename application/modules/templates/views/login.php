
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>ISPSM | Admin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="CodedThemes" />

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url();?>admin_assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
            	<?php echo form_open('admin/submit_login') ?>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img src="<?= base_url();?>assets/images/logo/logos.png" alt="Logo" width="80%">
                    </div>
                    <h3 class="mb-4">Admin Login</h3>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username');?>">
                        <?php echo form_error('username',"<p class='text text-danger text-left'>","</p>");?>
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control" placeholder="password" name="pword">
                        <?php echo form_error('pword',"<p class='text text-danger text-left'>","</p>");?>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4" name="submit" value="Submit" type="submit">Login</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url();?>admin_assets/js/vendor-all.min.js"></script><script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>admin_assets/js/pcoded.min.js"></script>

</body>

</html>
