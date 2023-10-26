<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<style>
    .w-input {
        width: 80%;
    }

    .w-ref {
        width: 20%;
    }

    @media only screen and (max-width: 767px) {
        .w-input {
            width: 60%;
        }

        .w-ref {
            width: 40%;
        }
    }
</style>

<div style="padding: 5px;">
    <div class="logologin" style="padding-top: 10px;position:relative">
        <img class="imganimationlogin" src="<?= $logo ?>">
        <div style="position: absolute;top: 16px;right: 16px;display: flex;column-gap: 8px;">
            <a href="https://lin.ee/zWj44TZ" target="_blank" rel="noreferrer"><img src="<?= base_url() ?>assets/images/line_circle.png" class="lang"></a>
            <a href="<?= site_url('lang/th') ?>"><img src="assets/images/th.png" class="lang"></a>
            <a href="<?= site_url('lang/en') ?>"><img src="assets/images/en.png" class="lang"></a>
        </div>
    </div>
    <div style="text-align: center;margin-top: 10px;">
        <h4 class="textlogin"><?= lang('Lang.forgot.forgot') ?></h4>
    </div>
    <div id="hidefinish" style="margin-top: 30px;">
        <table style="width: 100%;text-align: center;">
            <tbody>
                <tr>
                    <td class="tdstepregister headstep1 active">
                        <b>1</b><br><span><?= lang('Lang.forgot.telephone') ?></span>
                    </td>
                    <td class="tdstepregister headstep2">
                        <b>2</b><br><span><?= lang('Lang.forgot.set_password') ?></span>
                    </td>
                    <td class="tdstepregister headstep3">
                        <b style="padding: 0 5px;"><i class="fal fa-check"></i></b><br><span><?= lang('Lang.forgot.succeed') ?></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- ---------------------step1--------------------- -->
    <div class="stepre01 slideto containinlogin">
        <form action="#" method="post" id="validate_phone" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 30px;">
                <label for="forgot_user"><?= lang('Lang.register.mobile_number') ?></label>
                <div class="iconlogin">
                    <i class="fal fa-user" style="font-size: 20px;"></i>
                </div>
                <input type="text" maxlength="10" class="form-control loginform01" name="forgot_user" id="forgot_user" placeholder="<?= lang('Lang.register.mobile_number') ?>">
            </div>
            <div class="btnofregister">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="tdbtnregister">
                                <button type="button" onclick="location.href='<?= site_url('login') ?>'" class="btnbackregister bkcolor"><?= lang('Lang.forgot.back') ?></button>
                            </td>
                            <td class="tdbtnregister">
                                <button type="submit" id="btn-step1" class="btnnextregister mcolor">Request OTP</button>
                            </td>
                            <!-- <td class="tdbtnregister">
                                <button type="buttton" onclick="stepOneToTwo('0840476456', 'ASDFGH')" id="btn-step1" class="btnnextregister mcolor">Request OTP</button>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- ---------------------End step1--------------------- -->



    <!-- ---------------------step2----------------------------- -->
    <div class="stepre02 slideto containinlogin" style="display: none;">
        <form action="#" method="post" id="submit_forgot_pass" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 30px;">
                <label for="forgot_otp" id="otp_code"><?= lang('Lang.forgot.otp_code') ?></label>
                <div style=" display: flex;align-items: center;column-gap: 8px;">
                    <div class="w-input">
                        <div class="iconlogin">
                            <i class="fal fa-history" style="font-size: 20px;"></i>
                        </div>
                        <input type="text" class="form-control loginform01" name="forgot_otp" id="forgot_otp" placeholder="<?= lang('Lang.forgot.otp_code') ?>">
                    </div>
                    <div id="otp_ref" class="w-ref"></div>
                </div>


            </div>
            <div style="margin-top: 10px;">
                <label for="forgot_password">รหัสผ่านใหม่</label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" class="form-control loginform01" name="forgot_password" id="forgot_password" placeholder="รหัสผ่านใหม่">
            </div>
            <div class="btnofregister">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td colspan="2" style="padding: 0 10px;padding-bottom: 15px;">
                                <a href="https://lin.ee/zWj44TZ" target="_blank" rel="noreferrer" class="btnbackregister bkcolor" style="display: block;text-align: center;text-decoration: none;color: white;"><?= lang('Lang.forgot.contact_us') ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdbtnregister">
                                <button type="button" onclick="backToStep1()" class="btnbackregister bkcolor"><?= lang('Lang.forgot.back') ?></button>
                            </td>
                            <td class="tdbtnregister">
                                <button type="submit" id="btn-step2" class="btnnextregister mcolor"><?= lang('Lang.forgot.confirm') ?></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- ---------------------END step2--------------------- -->


    <!-- ---------------------step3--------------------- -->
    <div class="stepre03 slideto containinlogin" style="display: none;">
        <div style="text-align: center;margin-top: 20px;
               margin-bottom: 10px;"><i class="far fa-check checkfinish"></i></div>
        <div class="finishregister">
            <span><?= lang('Lang.forgot.reset_password_is_succeed') ?></span> <br>
            <?= lang('Lang.forgot.go_to_login') ?> <i class="fad fa-spinner-third fa-spin "></i>
        </div>
    </div>
    <!-- ---------------------END step3--------------------- -->
</div>

<script type="text/javascript">
    var username
    var otpref
    var x

    $(function() {
        $.validator.addMethod(
            'alpha_numeric',
            function(value, element) {
                return this.optional(element) || /^[\w.]+$/i.test(value)
            }
        )

        $("#validate_phone").validate({
            rules: {
                forgot_user: {
                    required: true,
                    digits: true
                },
            },
            messages: {
                forgot_user: {
                    required: '<?= lang('Lang.register.username_is_required') ?>',
                    digits: '<?= lang('Lang.register.username_is_numeric') ?>'
                },
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const user = formData.get('forgot_user')
                const method = $(form).attr('method')
                $.ajax({
                    url: '<?= base_url('/forgot/request-otp') ?>',
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
                            if (status === false && msg === 'notfound') {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.dialog.user_not_found') ?>')
                                return
                            }
                            if (status === true) {
                                console.log(JSON.parse(response));
                                stepOneToTwo(user, data)
                            } else {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
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

        $("#submit_forgot_pass").validate({
            rules: {
                forgot_password: {
                    required: true,
                    rangelength: [6, 20],
                    alpha_numeric: true
                },
                forgot_otp: {
                    required: true
                }
            },
            messages: {
                forgot_password: {
                    required: '<?= lang('Lang.forgot.password_is_required') ?>',
                    rangelength: '<?= lang('Lang.forgot.password_is_min_length') ?>',
                    alpha_numeric: '<?= lang('Lang.forgot.password_is_alpha_numeric') ?>',
                },
                forgot_otp: {
                    required: '<?= lang('Lang.forgot.otp_is_required') ?>',
                }
            },
            submitHandler: function(form) {
                const method = $(form).attr('method')
                const formData = new FormData(form)
                formData.set('forgot_user', username)
                formData.set('otpref', otpref)
                $.ajax({
                    url: '<?= base_url('/forgot/submit') ?>',
                    method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        clearInterval(x)
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
                                stepTwoToThree()
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: '<?= lang('Lang.forgot.re_pasword_error') ?>',
                                    confirmButtonText: '<?= lang('Lang.dialog.request_otp') ?>',
                                    showCancelButton: true,
                                    cancelButtonText: '<?= lang('Lang.dialog.retry') ?>',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        setTimeout(function() {
                                            backToStep1()
                                        }, 500)
                                    }
                                })
                            }
                        } catch (err) {
                            console.log(err)
                            swalError(`<?= lang('Lang.dialog.confirm_btn') ?>', ${err}`)
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Repass:126']) ?>')
                    }
                })
            },
        })

    });

    // go step1 to step2
    function stepOneToTwo(user, data) {
        $(".stepre01").hide();
        $(".stepre02").show();
        $(".headstep1").removeClass("active");
        $(".headstep2").addClass("active");

        username = user
        otpref = data
        $('#otp_ref').html(`<?= lang('Lang.forgot.otp_ref') ?> ${otpref}`)
        $('#otp_code').html(`<?= lang('Lang.forgot.otp_code') ?> ${otpref}`)

        const timer = localStorage.getItem('kCountdown') ? Number(localStorage.getItem('kCountdown')) : 1000 * 60 * 9.5
        let second = 1000 // 1 second
        // Update the count down every 1 second
        x = setInterval(function() {
            // Find the distance between second and the timer
            const distance = timer - second
            second += 1000
            // Time calculations for minutes and seconds
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
            const seconds = Math.floor((distance % (1000 * 60)) / 1000)
            $('#otp_code').html(`<?= lang('Lang.forgot.otp_code') ?> (${minutes}m ${seconds}s)`)
            // If the count down is finished, redirect forgot page.
            if (distance < 0) {
                backToStep1()
            }
        }, 1000)
    }

    // go step2 to step3
    function stepTwoToThree() {
        $(".stepre02").hide();
        $(".stepre03").show();
        $(".headstep2").removeClass("active");
        $(".headstep3").addClass("active");

        setTimeout(function() {
            window.location = '/login'
        }, 2000)
    }

    // Back step 1
    function backToStep1() {
        clearInterval(x)
        $(".stepre02").hide();
        $(".stepre01").show();
        $(".headstep2").removeClass("active");
        $(".headstep1").addClass("active");
    }

    $(".stepre02").hide();
    $(".stepre03").hide();
</script>

<?= $this->endSection(); ?>