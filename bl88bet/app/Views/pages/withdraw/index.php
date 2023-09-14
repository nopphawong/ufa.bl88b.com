<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter()
?>

<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- Withdraw section -->
<div id="withdraw" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-minus-circle"></i> <?= lang('Lang.withdraw.withdraw') ?></div>
    <div style="padding: 20px;">
        <table class="tablewd01" align="center">
            <tr>
                <td style="text-align: left;">
                    <span style="font-size: 20px; font-weight: bold;"><?= lang('Lang.withdraw.withdraw_to') ?></span> <br>
                    <?= lang('Lang.withdraw.username', [session()->data->name]) ?> <br>
                    <?= lang('Lang.withdraw.bank_account_number', [$formatter->bank_ac_no_format(session()->data->bankno)]) ?> <br>
                    <?= lang('Lang.withdraw.bank_name', [$formatter->bank_name_format(session()->data->bankid)]) ?>
                </td>
                <td style="text-align: center;">
                    <img src="<?= base_url() ?>assets/fonts/kbank.svg" width="70px">
                </td>
            </tr>
        </table>
    </div>
    <div style="padding: 0px 25px;">
        <div class="wdsec02">
            <table class="tablewd01" align="center">
                <tr>
                    <td> <?= lang('Lang.withdraw.withdrawable_amount') ?></td>
                    <td style="text-align: right;"> <?= lang('Lang.withdraw.minimum_withdrawal') ?></td>
                </tr>
                <tr>
                    <td><span id="withdrawable"><?= number_to_currency(session()->webbalance, 'THB', 'th', 2); ?></span>
                    </td>
                    <td style="text-align: right;"> <?= number_to_currency(50, 'THB', 'th', 2); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <form action="#" method="post" id="withdraw_form" enctype="multipart/form-data">
        <div class="tablewd01" style=" margin: 10px auto;">
            <div style="padding: 20px;">
                <div class="form-group">
                    <span style="font-size: 15px;">
                        <?= lang('Lang.withdraw.withdraw_amount') ?>
                    </span>
                    <input type="text" name="withdraw_amount" class="form-control loginform01 number" placeholder="฿ 0.00" style="padding: 10px; margin-top: 10px;">
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: -10px;  padding:0px 30px;">
            <button class="mcolor colorbtn01"><i class="fal fa-hand-holding-usd"></i> <?= lang('Lang.withdraw.confirm') ?></button>
        </div>
    </form>
</div>
<!-- End Withdraw section -->

<script>
    $(function() {
        opentab('withdraw');

        $.validator.addMethod(
            'check_credit',
            function(value, element) {
                return Number(value) <= Number('<?= session()->webbalance ?>')
            }
        )

        $("#withdraw_form").validate({
            rules: {
                withdraw_amount: {
                    required: true,
                    min: 1,
                    number: true,
                    digits: true,
                    check_credit: true
                }
            },
            messages: {
                withdraw_amount: {
                    required: '<?= lang('Lang.withdraw.amount_is_required') ?>',
                    min: '<?= lang('Lang.withdraw.amount_is_min') ?>',
                    number: '<?= lang('Lang.withdraw.amount_is_digits') ?>',
                    digits: '<?= lang('Lang.withdraw.amount_is_digits') ?>',
                    check_credit: '<?= lang('Lang.withdraw.amount_is_less_than_credit') ?>',
                }
            },
            submitHandler: function(form) {
                const formData = new FormData(form)
                const method = $(form).attr('method')
                $.ajax({
                    url: '<?= base_url('/withdraw/submit') ?>',
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
                                deposit_id
                            } = JSON.parse(response)
                            if (!status) {
                                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
                            } else {
                                swalFlashAlert(msg)
                                setTimeout(function() {
                                    window.location = '/history'
                                }, 1000)
                            }
                        } catch (err) {
                            toastr.error(err, '', {
                                timeOut: 5000
                            })
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Withdraw 169']) ?>')
                    }
                })
            },
        })
    })
</script>

<?= $this->endSection(); ?>