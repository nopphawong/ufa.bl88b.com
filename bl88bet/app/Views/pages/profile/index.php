<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter()
?>

<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- Profile section -->
<div id="account" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-user"></i> <?= lang('Lang.profile.profile') ?></div>
    <div class="containprocess" style="padding: 0 20px;">
        <table align="center" class="accountofuser">
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-user"></i> <?= lang('Lang.profile.name') ?></td>
                <td><?= session()->data->name ?></td>
            </tr>
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-user-circle"></i> <?= lang('Lang.profile.username') ?></td>
                <td><?= session()->data->userid ?></td>
            </tr>
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-lock"></i> <?= lang('Lang.profile.password') ?></td>
                <td>1234567890</td>
            </tr>
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-university"></i> <?= lang('Lang.profile.bank_name') ?></td>
                <td><img src="<?= base_url() ?>assets/fonts/kbank.svg" width="25px"> <?= $formatter->bank_name_format(session()->data->bankid) ?></td>
            </tr>
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-gift"></i> <?= lang('Lang.profile.promotion') ?></td>
                <td>ไม่รับโปรโมชั่น</td>
            </tr>
            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-users"></i> <?= lang('Lang.profile.recommendation') ?></td>
                <td>949.00 บาท</td>
            </tr>

            <tr class="trofaccount">
                <td class="headeraccount"><i class="fal fa-sack-dollar"></i> <?= lang('Lang.profile.commission') ?></td>
                <td>478.00 บาท</td>
            </tr>
        </table>
    </div>
</div>
<!-- End Profile section -->

<script>
    $(function() {
        opentab('account')
    })
</script>

<?= $this->endSection(); ?>