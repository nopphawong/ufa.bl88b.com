<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter();
?>

<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>



<!-- Main menu select01 -->
<i onclick="opentab('section01')" id="defaultOpen" hidden class="fal fa-plus tablinks"></i>
<div id="section01" class="tabcontent mainsection">
    <div class="headerprocess"><?= esc($title) ?></div>
    <div class="menucontain">
        <table style="width: 100%;">
            <tr>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('deposit') ?>'">
                        <i class="fal fa-plus tablinks"></i>
                        <br>
                        <?= lang('Lang.home.deposit') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('withdraw') ?>'">
                        <i class="fal fa-minus tablinks"></i>
                        <br>
                        <?= lang('Lang.home.withdraw') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('promotion') ?>'">
                        <i class="fal fa-gift button--resize tablinks" id style="font-size: 25px; padding-top: 13px;"></i>
                        <br>
                        <?= lang('Lang.home.promotion') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('reward') ?>'">
                        <i class="fal fa-calendar-star tablinks" style="font-size: 25px; padding-top: 14px;"></i>
                        <br>
                        <?= lang('Lang.home.reward') ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('change-password') ?>'">
                        <i class="fal fa-lock tablinks" style="font-size: 25px; padding-top: 13px;"></i>
                        <br>
                        <?= lang('Lang.home.change_pass') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('history') ?>'">
                        <i class="fal fa-history tablinks" id style="font-size: 25px; padding-top: 14px;"></i>
                        <br>
                        <?= lang('Lang.home.history') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('playgame') ?>'">
                        <i class="fal fa-gamepad-alt tablinks" id style="font-size: 25px; padding-top: 14px;"></i>
                        <br>
                        <?= lang('Lang.home.play_game') ?>
                    </span>
                </td>
                <td class="tdgridicon">
                    <span onclick="location.href='<?= site_url('profile') ?>'">
                        <i class="fal fa-user-alt tablinks" id style="font-size: 25px; padding-top: 14px;"></i>
                        <br>
                        <?= lang('Lang.home.profile') ?>
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <div class="swiper-container-2">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/images/6.jpg?v=1">
            </div>
            <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/images/5.jpg">
            </div>
            <div class="swiper-slide">
                <img src="<?= base_url() ?>assets/images/6.jpg?v=1">
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
    </div>
</div>
<!-- end Section 1 main -->

<!-- swiper js -->
<script src="assets/js/swiper-bundle.min_1.js"></script>

<script>
    $(function() {
        opentab('section01')
    })

    var swiper2 = new Swiper('.swiper-container-2', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 50,
        initialSlide: 1,
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
    })
</script>

<?= $this->endSection(); ?>