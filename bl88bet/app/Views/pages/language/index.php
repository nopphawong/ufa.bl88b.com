<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- language section -->
<div id="language" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-language"></i> ภาษา / Language</div>
    <div class="containprocess " style="margin-top: 10px;">
        <table width="260px" align="center">
            <tr>
                <td style="text-align: center; width: 50%;">
                    <span onclick="location.href='<?= site_url('lang/th') ?>'" style="cursor: pointer;">
                        <img src="<?= base_url() ?>assets/fonts/th.svg" width="90px"><br>ไทย
                    </span>
                </td>
                <td style="text-align: center; width: 50%;">
                    <span onclick="location.href='<?= site_url('lang/en') ?>'" style="cursor: pointer;">
                        <img src="<?= base_url() ?>assets/fonts/en.svg" width="90px"><br>English
                    </span>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- End language section -->

<script>
    $(function() {
        opentab('language')
    })
</script>

<?= $this->endSection(); ?>