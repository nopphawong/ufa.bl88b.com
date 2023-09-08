<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter();
?>

<!-- Cantainer all content----------------------------------------------- -->
<div class="containall">
    <div data-aos="fade-right" class="contentmain boxcolor">

        <!-- ส่วนหัว /ข้อมูลส่วนตัว----------------------------------------------- -->
        <div class="headmain">
            <div class="text-center">
            <img class="imganimationlogin" style="margin:1em auto;" src="<?= base_url() ?>assets/images/ufa_odin_1.png">
            </div>
     
            <table width="100%">
                <tr>
                    <!-- <td style="width: 15%;text-align: center; padding-left: 15px;  ">
                        <img src="<?= base_url() ?>assets/images/logo.png" width="50px">
                    </td> -->
                    <td style="width: 50%;text-align: left; font-size: 18px;padding-left: 15px;">
                        <i class="fas fa-user" style="font-size: 16px;color: #fad275;"></i> <?= session()->data->name ?><br>
                        <img src="<?= base_url() ?>assets/fonts/kbank.svg" width="17px"> <span><?= $formatter->bank_ac_no_format(session()->data->bankno) ?></span>
                    </td>
                    <td style="width: 15%;text-align: right; ">
                        <table align="right">
                            <tr>
                                <td class="righttopmain">
                                    <span class="bglangbtn">
                                        <img onclick="location.href='<?= site_url('language') ?>'" class="languagebtn" src="<?= base_url() ?>assets/fonts/translatearcha1682.svg">
                                    </span>
                                </td>
                                <td class="paddinglefttop">
                                    <button class="logoutbtn" onclick="confirmLogout(event)"><i class="fal fa-power-off"></i></button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="containmoney">
            <table width="100%">
                <!-- <tr>
                    <td style="width: 15%;text-align: center; padding-left: 15px;  ">
                        <img src="<?= base_url() ?>assets/images/logo.png" width="50px">
                    </td>
                    <td style="width: 50%;text-align: right; font-size: 18px;">
                        <i class="fas fa-user" style="font-size: 16px;color: #fad275;"></i> <?= session()->data->name ?><br>
                        <img src="<?= base_url() ?>assets/fonts/kbank.svg" width="17px"> <span><?= $formatter->bank_ac_no_format(session()->data->bankno) ?></span>
                    </td>
                </tr> -->
                <tr>
                    <td width="50%" style="padding-left: 20px;">
                        <a href="<?= site_url('/') ?>">
                            <i style="cursor: pointer;" class="fal fa-wallet"></i>
                        </a>
                    </td>
                    <td width="50%" style="text-align: right;">
                        <span style="font-size: 17px;cursor:pointer;" onclick="refreshCredit()"><i class="fas fa-sync-alt" style="font-weight:500;"></i> <?= lang('Lang.home.credit_balance') ?> </span>
                        <br>
                        <span id="total_credit" style="color:#ecc568; font-size: 35px;">
                            <?= number_to_currency(session()->webbalance, 'THB', 'th', 2); ?>
                        </span>
                    </td>
                </tr>
            </table>
            <hr style="margin: 5px; border-top:1px solid #4a506d;">
            <!-- <div style="padding-left: 20px;margin-top: 10px; margin-bottom: 15px;">
                <i class="fad fa-gift" style="color:#fad275;"></i> โปรโมชั่น : ไม่รับโบนัส
            </div> -->
            <!-- <table width="100%">
                <tr>
                    <td width="50%" style="text-align: center;">
                        <button class="btnfriend mcolor" onclick="location.href='<?= site_url('affiliate') ?>'"><i class="fal fa-users-medical"></i>
                            <?= lang('Lang.home.affiliate') ?></button>
                    </td>
                    <td width="50%" style="text-align: center;">
                        <button class="btncommis bkcolor" onclick="location.href='<?= site_url('commission') ?>'"><i class="fal fa-hands-usd"></i>
                            <?= lang('Lang.home.commission') ?></button>
                    </td>
                </tr>
            </table> -->
        </div>
        <!-- END  ส่วนหัว /ข้อมูลส่วนตัว----------------------------------------------- -->

        <!-- ถ้าเรียกใช้แท็บ >> กลับหน้าหลัก -->
        <div class="backtohome button-resize-1" id="containbacktohome">
            <span onclick="location.href='<?= site_url('/') ?>'" style="cursor: pointer;">
                <i class="fas fa-home-lg-alt homebtn"></i> <i class="fal fa-long-arrow-left" style="font-weight: bold; color:#c5c5c5;">
                </i> <?= lang('Lang.home.back_to_home') ?></span>
            &nbsp;&nbsp;&nbsp;
            <span id="backtohistory" onclick="opentab('history')" style="cursor: pointer;">
                <i class="fas fa-history homebtn"></i> <i class="fal fa-long-arrow-left" style="font-weight: bold; color: #c5c5c5;">
                </i> <?= lang('Lang.home.bact_to_history') ?></span>
        </div>
        <!-- ------------------------ -->

        <?= $this->renderSection('content') ?>

    </div>
</div>
<!-- Cantainer all content----------------------------------------------- -->


<div class="heightmobile"></div>


<a href="https://lin.ee/zWj44TZ" target="_blank" rel="noreferrer" class="tip_trigger">
    <div class="linebtn"><img src="<?= base_url() ?>assets/fonts/chat2.svg" style="width: 70px;"></div>
</a>

<div class="myAlert-top alert">
    <i class="fad fa-check-circle" style="color: #d2b882; font-size: 30px;"></i>
    <br>
    <strong style="color: white;">
        <?= lang('Lang.dialog.copied') ?> </strong>
</div>

<div class="modal" id="play_game" role="dialog">
    <div class="modal-dialog" role="document" style="top: 22vh;">
        <div class="modal-content contentmain" style="background: #111111f2;box-shadow: 0 0 20px 0 #51411970;">
            <form action="#" method="post" id="form1" enctype="multipart/form-data" target="_blank">
                <div class="containinlogin">
                    <div style="text-align: center;margin-top: 10px;">
                        <h4 class="textlogin"><?= lang('Lang.play_game.play_game') ?></h4>
                    </div>
                    <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="btnSignIn">
                    <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">
                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="">
                    <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="">
                    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="">
                    <div style="margin-top: 10px;">
                        <label for="exampleInputEmail1"><?= lang('Lang.play_game.username') ?></label>
                        <div class="iconlogin">
                            <i class="fal fa-user" style="font-size: 20px;"></i>
                        </div>
                        <input type="text" class="form-control loginform01" name="txtUserName" id="txtUserName" value="<?= session()->data->webuser ?>" readonly>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="exampleInputEmail1"><?= lang('Lang.play_game.password') ?></label>
                        <div class="iconlogin">
                            <i class="fal fa-lock" style="font-size: 20px;"></i>
                        </div>
                        <div class="iconlogin2" onclick="toggleShowPassword()">
                            <i class="fal fa-eye" style="font-size: 20px;"></i>
                        </div>
                        <input type="password" class="form-control loginform02" name="password" id="password" value="<?= session()->data->webpass ?>">
                    </div>
                </div>
                <div style="text-align: center; margin-top: 40px;">
                    <button type="button" id="btnlogin" onclick="submitPlayGames()" class="mcolor colorbtn01"><?= lang('Lang.play_game.confirm') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // NOTE: Refresh Credit
    function refreshCredit() {
        $.ajax({
            url: '<?= base_url('/refresh') ?>',
            method: 'get',
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
                        const {
                            data
                        } = JSON.parse(response)
                        const thBath = new Intl.NumberFormat('th-TH', {
                            style: 'currency',
                            currency: 'THB',
                        })
                        $('#total_credit').html(thBath.format(data.webbalance))
                        $('#withdrawable').html(thBath.format(data.webbalance))
                    }
                } catch (err) {
                    console.log(err);
                }
            },
            error: function(err) {
                console.log(err);
                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Logout:261']) ?>')
            }
        })
    }

    // NOTE: Logout
    function confirmLogout(e) {
        e.preventDefault()
        Swal.fire({
            icon: 'question',
            title: '<?= lang('Lang.home.confirm_logout') ?>',
            confirmButtonText: '<?= lang('Lang.dialog.confirm_btn') ?>',
            showCancelButton: true,
            cancelButtonText: '<?= lang('Lang.dialog.cancel_btn') ?>',
        }).then((result) => {
            if (result.isConfirmed) {
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
            }
        })
    }

    function opentab(cityName) {
        var i, tabcontent, tablinks
        tabcontent = document.getElementsByClassName('tabcontent')
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = 'none'
        }
        tablinks = document.getElementsByClassName('tablinks')
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(' active', '')
        }
        document.getElementById(cityName).style.display = 'block'
        // evt.currentTarget.className += " active";

        $('#backtohistory').hide()
        if ($('#slip').css('display') == 'block') {
            $('#backtohistory').show()
        } else {
            $('#backtohistory').hide()
        }

        if ($('#section01').css('display') == 'block') {
            $('#containbacktohome').hide()
        } else {
            $('#containbacktohome').show()
        }
    }

    $(document).ready(function() {
        $('.copybtn').click(function(event) {
            var $tempElement = $('<input>')
            $('body').append($tempElement)
            $tempElement.val($(this).closest('.copybtn').find('span').text()).select()
            document.execCommand('Copy')
            $tempElement.remove()
        })
    })

    function myAlertTop() {
        $('.myAlert-top').show()
        setTimeout(function() {
            $('.myAlert-top').hide()
        }, 2000)
    }
</script>

<?= $footer ?>