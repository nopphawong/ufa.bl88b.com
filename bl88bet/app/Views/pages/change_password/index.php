<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- password section -->
<div id="password" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-lock"></i> <?= lang('Lang.change_password.change_password') ?></div>
    <div class="containprocess " style="padding: 0 30px;">
        <form action="#" method="post" id="change_pass_form" enctype="multipart/form-data">
            <div style="margin-top: 10px;">
                <label for="exampleInputEmail1"><?= lang('Lang.change_password.current_password') ?></label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" class="form-control loginform01" id="current_password" name="current_password" placeholder="<?= lang('Lang.change_password.current_password_placeholder') ?>">
            </div>
            <div style="margin-top: 20px;">
                <label for="exampleInputEmail1"><?= lang('Lang.change_password.new_password') ?></label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" class="form-control loginform01" id="new_password" name="new_password" placeholder="<?= lang('Lang.change_password.new_password_placeholder') ?>">
            </div>
            <div style="margin-top: 20px;">
                <label for="exampleInputEmail1"><?= lang('Lang.change_password.confirm_password') ?></label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" class="form-control loginform01" id="confirm_password" name="confirm_password" placeholder="<?= lang('Lang.change_password.confirm_password_placeholder') ?>">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="mcolor colorbtn01"><i class="fal fa-sign-in"></i> <?= lang('Lang.change_password.re_login') ?></button>
            </div>
        </form>
    </div>
</div>
<!-- End password section -->

<script>
    $(function() {
        opentab('password')

        $.validator.addMethod(
            'alpha_numeric',
            function(value, element) {
                return this.optional(element) || /^[\w.]+$/i.test(value)
            }
        )

        $("#change_pass_form").validate({
            rules: {
                current_password: {
                    required: true,
                    alpha_numeric: true
                },
                new_password: {
                    required: true,
                    rangelength: [6, 20],
                    alpha_numeric: true
                },
                confirm_password: {
                    equalTo: "#new_password"
                }
            },
            messages: {
                current_password: {
                    required: '<?= lang('Lang.change_password.password_is_required') ?>',
                    alpha_numeric: '<?= lang('Lang.change_password.password_is_alpha_numeric') ?>',
                },
                new_password: {
                    required: '<?= lang('Lang.change_password.new_password_is_required') ?>',
                    rangelength: '<?= lang('Lang.change_password.password_is_min_length') ?>',
                    alpha_numeric: '<?= lang('Lang.change_password.password_is_alpha_numeric') ?>',
                },
                confirm_password: {
                    equalTo: '<?= lang('Lang.change_password.confrim_password_is_matches') ?>',
                }
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                $.ajax({
                    url: '<?= base_url('/change-password/submit') ?>',
                    method: 'post',
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
                                msg
                            } = JSON.parse(response)
                            if (status === true) {
                                // swalFlashAlert(msg)
                                setTimeout(function() {
                                    $.ajax({
                                        url: '<?= base_url('/logout') ?>',
                                        method: 'get',
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        success: function() {
                                            setTimeout(function() {
                                                window.location = '/login'
                                            }, 500)
                                        },
                                        error: function(err) {
                                            console.log(err);
                                            swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Logout:261']) ?>')
                                        }
                                    })
                                }, 1000)
                            } else {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.change_password.change_pasword_error') ?>', msg)
                            }
                        } catch (err) {
                            console.log(err)
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['ChangePass:126']) ?>', err)
                    }
                })
            },
        })
    });
</script>

<?= $this->endSection(); ?>