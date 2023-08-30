<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div style="padding: 5px;">
    <div class="logologin" style="padding-top: 10px;position:relative">
        <img class="imganimationlogin" src="<?= base_url() ?>assets/images/ufa_odin_1.png">
        <div style="position: absolute;top: 16px;right: 16px;display: flex;column-gap: 8px;">
            <a href="<?= site_url('lang/th') ?>"><img src="assets/images/th.png" class="lang"></a>
            <a href="<?= site_url('lang/en') ?>"><img src="assets/images/en.png" class="lang"></a>
        </div>
    </div>
    <div style="text-align: center;margin-top: 10px;">
        <h4 class="textlogin">สมัครสมาชิก</h4>
    </div>
    <div id="hidefinish" style="margin-top: 30px;">
        <table style="width: 100%;text-align: center;">
            <tbody>
                <tr>
                    <td class="tdstepregister headstep1 active">
                        <b>1</b><br><span>โทรศัพท์</span>
                    </td>
                    <td class="tdstepregister headstep2">
                        <b>2</b><br><span>ตั้งรหัสผ่าน</span>
                    </td>
                    <td class="tdstepregister headstep3">
                        <b>3</b><br><span>บัญชีธนาคาร</span>
                    </td>
                    <td class="tdstepregister headstep4">
                        <b style="padding: 0 5px;"><i class="fal fa-check"></i></b><br><span>สำเร็จ</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




    <!-- ---------------------step1--------------------- -->
    <div class="stepre01 slideto containinlogin">
        <form action="#" method="post" id="validate_phone" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 30px;">
                <label for="username">เบอร์มือถือ</label>
                <div class="iconlogin">
                    <i class="fal fa-user" style="font-size: 20px;"></i>
                </div>
                <input type="text" maxlength="10" class="form-control loginform01" name="username" id="username" placeholder="กรอกเบอร์มือถือ">
            </div>
            <div class="btnofregister">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="tdbtnregister">
                                <button type="button" onclick="location.href='<?= site_url('login') ?>'" class="btnbackregister bkcolor">ย้อนกลับ</button>
                            </td>
                            <td class="tdbtnregister">
                                <button type="submit" id="btn-step1" class="btnnextregister mcolor">ถัดไป </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- ---------------------End step1--------------------- -->



    <!-- ---------------------step2----------------------------- -->
    <div class="stepre02 slideto containinlogin" style="display: none;">
        <form action="#" method="post" id="validate_password" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 30px;">
                <label for="password">รหัสผ่าน</label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" maxlength="10" class="form-control loginform01" name="password" id="password" aria-describedby="emailHelp" placeholder="รหัสผ่าน">
            </div>
            <div style="margin-top: 10px;">
                <label for="confirm_password">ยืนยันรหัสผ่าน</label>
                <div class="iconlogin">
                    <i class="fal fa-lock" style="font-size: 20px;"></i>
                </div>
                <input type="password" maxlength="10" class="form-control loginform01" name="confirm_password" id="confirm_password" aria-describedby="emailHelp" placeholder="ยืนยันรหัสผ่าน">
            </div>
            <div class="btnofregister">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="tdbtnregister">
                                <button type="button" id="btn-back1" class="btnbackregister bkcolor">ย้อนกลับ</button>
                            </td>
                            <td class="tdbtnregister">
                                <button type="submit" id="btn-step2" class="btnnextregister mcolor">ถัดไป</button>
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
        <form action="#" method="post" id="verify_bank" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 30px;">
                <label for="exampleInputEmail1">ธนาคาร</label>
                <div class="iconlogin">
                    <i class="fal fa-university font-size: 20px;"></i>
                </div>
                <input type="text" readonly class="form-control loginform01 open_select_bank" name="financial_name" style="cursor: pointer;" placeholder="เลือกธนาคาร">
                <input type="text" name="financial_id" id="financial_id" value="" hidden="">

            </div>
            <div style="margin-top: 10px;">
                <label for="account_number">หมายเลขบัญชี</label>
                <div style="display: flex;column-gap: 8px;">
                    <div style="flex: 1;">
                        <div class="iconlogin">
                            <i class="fal fa-sort-numeric-up-alt" style="font-size: 20px;"></i>
                        </div>
                        <input type="text" maxlength="15" class="form-control loginform01" name="account_number" id="account_number" placeholder="กรอกหมายเลขบัญชี">
                    </div>
                    <button type="submit" id="btn-verify" class="btnnextregister mcolor" style="width: 30%;height: 38px;padding: 0;">ตรวจสอบ</button>
                </div>

            </div>
        </form>
        <form action="#" method="post" id="register_submit" enctype="multipart/form-data" autocomplete="off">
            <div style="margin-top: 10px;">
                <label for="exampleInputEmail1">ชื่อบัญชี</label>
                <div class="iconlogin">
                    <i class="fal fa-user" style="font-size: 20px;"></i>
                </div>
                <input type="text" class="form-control loginform01" name="account_name" id="account_name" placeholder="ชื่อบัญชี" readonly>
            </div>

            <div class="btnofregister">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="tdbtnregister">
                                <button type="button" id="btn-back2" class="btnbackregister bkcolor">ย้อนกลับ</button>
                            </td>
                            <td class="tdbtnregister">
                                <button type="submit" id="btn-step3" class="btnnextregister mcolor">ยืนยัน</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <!-- ---------------------END step3--------------------- -->



    <!-- ---------------------step4--------------------- -->
    <div class="stepre04 slideto containinlogin" style="display: none;">
        <div style="text-align: center;margin-top: 20px;
               margin-bottom: 10px;"><i class="far fa-check checkfinish"></i></div>
        <div class="finishregister">
            <span>สมัครสมาชิกสำเร็จ</span> <br>
            กำลังพาท่านเข้าสู่ระบบ กรุณารอสักครู่ <i class="fad fa-spinner-third fa-spin "></i>
        </div>
    </div>
    <!-- ---------------------END step4--------------------- -->
</div>


<!-- --------------------- Bank popup--------------------- -->
<div class="bankselectpopup" style="padding: 0px 20px; display: block;">
    <div class="inbankselectpopup bkcolor">
        <button class="btnclosebankselect"><i class="fal fa-times"></i></button>
        <table>
            <tbody>
                <tr>
                    <td><img class="selectbank" name="กรุงเทพ (BBL)" alt="BBL" src="<?= base_url() ?>assets/images/bank/bbl.svg"><br> กรุงเทพ (BBL)</td>
                    <td><img class="selectbank" name="กสิกรไทย (KBANK)" alt="KBANK" src="<?= base_url() ?>assets/images/bank/kbank.svg"><br> กสิกรไทย (KBANK)</td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="กรุงไทย (KTB)" alt="KTB" src="<?= base_url() ?>assets/images/bank/ktb.svg"><br> กรุงไทย (KTB)</td>
                    <td><img class="selectbank" name="ทหารไทย (TMB)" alt="TMB" src="<?= base_url() ?>assets/images/bank/tmb.svg"><br> ทหารไทย (TMB)</td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="ไทยพาณิชย์ (SCB)" alt="SCB" src="<?= base_url() ?>assets/images/bank/scb.svg"><br> ไทยพาณิชย์ (SCB)</td>
                    <td><img class="selectbank" name="ซีไอเอ็มบีไทย (CIMB)" alt="CIMB" src="<?= base_url() ?>assets/images/bank/cimb.svg"><br> ซีไอเอ็มบีไทย (CIMB)
                    </td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="ยูโอบี (UOB)" alt="UOB" src="<?= base_url() ?>assets/images/bank/uobt.svg"><br> ยูโอบี (UOB)</td>
                    <td><img class="selectbank" name="กรุงศรีอยุธยา (BAY)" alt="BAY" src="<?= base_url() ?>assets/images/bank/bay.svg"><br> กรุงศรีอยุธยา (BAY)
                    </td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="ออมสิน (GSB)" alt="GSB" src="<?= base_url() ?>assets/images/bank/gsb.svg"><br> ออมสิน (GSB)</td>
                    <td><img class="selectbank" name="ธกส. (BAAC)" alt="BAAC" src="<?= base_url() ?>assets/images/bank/baac.svg"><br> ธกส. (BAAC)</td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="ธนชาต (TBANK)" alt="TBANK" src="<?= base_url() ?>assets/images/bank/tnc.svg"><br> ธนชาต (TBANK)</td>
                    <td><img class="selectbank" name="ทิสโก้ (TISCO)" alt="TISCO" src="<?= base_url() ?>assets/images/bank/tisco.svg"><br> ทิสโก้ (TISCO)</td>
                </tr>
                <tr>
                    <td><img class="selectbank" name="เกียรตินาคิน (KKP)" alt="KKP" src="<?= base_url() ?>assets/images/bank/kkp.svg"><br> เกียรตินาคิน (KKP)</td>
                    <td><img class="selectbank" name="แลนด์แอนด์เฮ้าส์ (LHFG)" alt="LHFG" src="<?= base_url() ?>assets/images/bank/lhfg.svg"><br> แลนด์แอนด์เฮ้าส์ (LHFG)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- --------------------- END Bank popup--------------------- -->


<script type="text/javascript">
    var username
    var password
    var financial_id
    var account_number
    var account_name

    $(function() {
        $.validator.addMethod(
            'alpha_numeric',
            function(value, element) {
                return this.optional(element) || /^[\w.]+$/i.test(value)
            }
        )

        $("#validate_phone").validate({
            rules: {
                username: {
                    required: true,
                    digits: true,
                    minlength: 10
                },
            },
            messages: {
                username: {
                    required: '<?= lang('Lang.register.username_is_required') ?>',
                    digits: '<?= lang('Lang.register.username_is_numeric') ?>',
                    minlength: '<?= lang('Lang.register.username_is_required') ?>',
                },
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const method = $(form).attr('method')
                $.ajax({
                    url: '<?= base_url('/register/validate-phone') ?>',
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
                            // NOTE: Not requrest OTP.
                            stepOneToTwo(JSON.parse(response))

                            // NOTE: If using OTP.
                            // const {
                            //     status,
                            //     msg,
                            //     data
                            // } = JSON.parse(response)

                            // if (!status) {
                            //     swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
                            // } else {
                            //     console.log(data);
                            // }
                        } catch (err) {
                            console.log(err);
                            swalError(`<?= lang('Lang.dialog.confirm_btn') ?>', ${err}`)
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Register  validate_phone']) ?>')
                    }
                })
            },
        })

        $("#validate_password").validate({
            rules: {
                password: {
                    required: true,
                    rangelength: [6, 20],
                    alpha_numeric: true
                },
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: '<?= lang('Lang.register.password_is_required') ?>',
                    rangelength: '<?= lang('Lang.register.password_is_min_length') ?>',
                    alpha_numeric: '<?= lang('Lang.register.password_is_alpha_numeric') ?>'
                },
                confirm_password: {
                    equalTo: '<?= lang('Lang.register.confrim_password_is_matches') ?>'
                }
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const pass = formData.get('password')
                stepTwoToThree(pass)
            },
        })

        $("#verify_bank").validate({
            rules: {
                financial_name: {
                    required: true
                },
                account_number: {
                    required: true,
                    digits: true
                },
            },
            messages: {
                financial_name: {
                    required: '<?= lang('Lang.register.bank_is_select') ?>'
                },
                account_number: {
                    required: '<?= lang('Lang.register.bankno_is_required') ?>',
                    digits: '<?= lang('Lang.register.bankno_is_numeric') ?>',
                },
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const method = $(form).attr('method')
                $.ajax({
                    url: '<?= base_url('/register/verify-bank') ?>',
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
                                financial_id = data.bankShort
                                account_number = data.accNo
                                account_name = data.accName
                                $('#account_name').val(account_name)
                                $('#btn-verify').prop('disabled', true);
                                $('#btn-verify').removeClass('mcolor');
                                $('#btn-verify').addClass('bkcolor');
                                $('#btn-verify').html('<?= lang('Lang.register.verify_done') ?>')
                                $('#account_number').attr('readonly', true);
                            }
                        } catch (err) {
                            console.log(err);
                            swalError(`<?= lang('Lang.dialog.confirm_btn') ?>', ${err}`)
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Register verify_bank']) ?>')
                    }
                })
            },
        })

        $("#register_submit").validate({
            rules: {
                account_name: {
                    required: true
                },
            },
            messages: {
                account_name: {
                    required: '<?= lang('Lang.register.verify_bank_account_number') ?>',
                },
            },
            submitHandler: function(form) {
                const method = $(form).attr('method')
                const formData = new FormData(form)
                formData.set('username', username)
                formData.set('password', password)
                formData.set('financial_id', financial_id)
                formData.set('account_number', account_number)
                $.ajax({
                    url: '<?= base_url('/register/submit') ?>',
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
                                msg
                            } = JSON.parse(response)

                            if (!status) {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
                            } else {
                                stepThreeToFour()
                            }
                        } catch (err) {
                            console.log(err);
                            swalError('<?= lang('Lang.dialog.confirm_btn') ?>', err)
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Register register_submit']) ?>')
                    }
                })
            },
        })
    });

    // go step1 to step2
    function stepOneToTwo(data) {
        username = data.tel
        $(".stepre01").hide();
        $(".stepre02").show();
        $(".headstep1").removeClass("active");
        $(".headstep2").addClass("active");
    }

    // go step2 to step3
    function stepTwoToThree(pass) {
        password = pass
        $(".stepre02").hide();
        $(".stepre03").show();
        $(".headstep2").removeClass("active");
        $(".headstep3").addClass("active");
    }

    // go step3 to step4
    function stepThreeToFour() {
        $(".stepre03").hide();
        $(".stepre04").show();
        $(".headstep3").removeClass("active");
        $(".headstep4").addClass("active");

        setTimeout(function() {
            window.location = '/login'
        }, 2000)
    }

    // back step2 to step1
    document.getElementById("btn-back1").onclick = function() {
        $(".stepre02").hide();
        $(".stepre01").show();
        $(".headstep2").removeClass("active");
        $(".headstep1").addClass("active");
    };

    // back step3 to step2
    document.getElementById("btn-back2").onclick = function() {
        $(".stepre03").hide();
        $(".stepre02").show();
        $(".headstep3").removeClass("active");
        $(".headstep2").addClass("active");
    };

    $('.selectbank').click(function() {
        $('#financial_id').val($(this).attr('alt'));
        $('.open_select_bank').val($(this).attr('name'));
        $('.inbankselectpopup').addClass("closeanimationselectbank");
        setTimeout(function() {
            $('.bankselectpopup').hide();
        }, 400);
    });

    $('.btnclosebankselect').click(function() {
        $('.inbankselectpopup').addClass("closeanimationselectbank");
        setTimeout(function() {
            $('.bankselectpopup').hide();
        }, 400);
    });

    $('.open_select_bank').click(function() {
        $('.inbankselectpopup').removeClass("closeanimationselectbank");
        $('.bankselectpopup').show();
    });

    $(".stepre02").hide();
    $(".stepre03").hide();
    $(".stepre04").hide();
    $('.bankselectpopup').hide();
</script>

<?= $this->endSection(); ?>