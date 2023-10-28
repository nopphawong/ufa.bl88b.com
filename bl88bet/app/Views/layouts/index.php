<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter();
?>

<!-- Cantainer all content----------------------------------------------- -->
<div class="containall">
    <div data-aos="fade-right" class="contentmain boxcolor">
        <?= $this->renderSection('content') ?>
    </div>
</div>
<!-- Cantainer all content----------------------------------------------- -->


<div class="heightmobile"></div>


<a href="<?= $line_link ?>" target="_blank" rel="noreferrer" class="tip_trigger">
    <div class="linebtn"><img src="<?= base_url() ?>assets/fonts/chat2.svg" style="width: 70px;"></div>
</a>

<div class="myAlert-top alert">
    <i class="fad fa-check-circle" style="color: #d2b882; font-size: 30px;"></i>
    <br>
    <strong style="color: white;">
        <?= lang('Lang.dialog.copied') ?> </strong>
</div>




<?= $footer ?>