<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="logologin" style="position:relative;">
    <img class="imganimationlogin" src="<?= base_url() ?>assets/images/ufa_odin_1.png">
    <div style="position: absolute;top: 16px;right: 16px;display: flex;column-gap: 8px;">
        <a href="<?= site_url('lang/th') ?>"><img src="assets/images/th.png" class="lang"></a>
        <a href="<?= site_url('lang/en') ?>"><img src="assets/images/en.png" class="lang"></a>
    </div>
</div>
<form action="#" method="post" id="login_form" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="containinlogin">
        <div style="text-align: center;margin-top: 10px;">
            <h4 class="textlogin"><?= lang('Lang.login.login') ?></h4>
        </div>

        <div style="margin-top: 10px;">
            <label for="exampleInputEmail1"><?= lang('Lang.login.username') ?></label>
            <div class="iconlogin">
                <i class="fal fa-user" style="font-size: 20px;"></i>
            </div>
            <input type="text" class="form-control loginform01" name="login_user" placeholder="<?= lang('Lang.login.username') ?>">
        </div>
        <div style="margin-top: 20px;">
            <label for="exampleInputEmail1"><?= lang('Lang.login.password') ?></label>
            <div class="iconlogin">
                <i class="fal fa-lock" style="font-size: 20px;"></i>
            </div>
            <input type="password" class="form-control loginform01" name="login_password" placeholder="<?= lang('Lang.login.password') ?>">
        </div>

    </div>
    <div style="text-align: center; margin-top: 40px;">
        <button type="submit" class="mcolor colorbtn01"><i class="fal fa-sign-in"></i> <?= lang('Lang.login.login') ?></button>
    </div>
</form>
<div onclick="location.href='<?= site_url('register') ?>'" class="needregister bkcolor"><i class="fal fa-user-plus"></i> <?= lang('Lang.register.register') ?></div>
<div onclick="location.href='<?= site_url('forgot') ?>'" class="needregister bkcolor"><i class="fal fa-lock"></i> <?= lang('Lang.forgot.forgot') ?></div>

<script>
    $(function() {
        $("#login_form").validate({
            rules: {
                login_user: {
                    required: true
                },
                login_password: {
                    required: true
                }
            },
            messages: {
                login_user: {
                    required: '<?= lang('Lang.login.username_is_required') ?>',
                },
                login_password: {
                    required: '<?= lang('Lang.login.password_is_required') ?>',
                }
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const method = $(form).attr('method')
                $.ajax({
                    url: '<?= base_url('/login/submit') ?>',
                    method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        spinner('show')
                    },
                    success: function(response) {
                        spinner('hide')
                        try {
                            const {
                                status,
                                msg,
                                data
                            } = JSON.parse(response)
                            if (!status) {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
                            } else {
                                swalFlashAlert(msg)
                                setTimeout(function() {
                                    
                                    window.location = './'
                                }, 1000)
                            }
                        } catch (err) {
                            console.log(err);
                            swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Login 88']) ?>')
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Login 92']) ?>')
                    }
                })
            },
        })
    });
</script>

<?= $this->endSection(); ?>