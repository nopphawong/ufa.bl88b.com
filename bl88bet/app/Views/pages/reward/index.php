<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- event section -->
<div id="event" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-calendar-star"></i></i> <?= lang('Lang.reward.reward') ?></div>
    <div class="containprocess" style="padding: 0 20px;">
        <div class="containprocess containevent">
            <div class="swiper-container-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url(&#x27;assets/images/1.jpg&#x27;)">
                        <div class="detailpro">
                            <i class="fad fa-circle-notch"></i> Commission Return คืนค่าคอมทุกยอดฝากสูงสุด 2.3% <br>
                            <i class="fad fa-circle-notch"></i> Commission Return คืนค่าคอมทุกยอดฝากสูงสุด 2.3% <br>
                            <i class="fad fa-circle-notch"></i> ไม่ต้องทำเทิร์น
                            <br>
                            <div style="text-align: center;">
                                <button class="btnbonus mcolor">รับโบนัส</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image:url(&#x27;assets/images/2.jpg&#x27;)">
                        <div class="detailpro">
                            <i class="fad fa-circle-notch"></i> สมัครใหม่ รับโบนัสฟรี 30% <br>
                            <i class="fad fa-circle-notch"></i> สมัครใหม่ รับโบนัสฟรี 30% <br>
                            <i class="fad fa-circle-notch"></i> ฟรีสูงสุด 2,000 เครดิต ถอนไม่อั้น
                            <br>
                            <div style="text-align: center;">
                                <button class="btnbonus mcolor">รับโบนัส</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image:url(&#x27;assets/images/4.jpg&#x27;)">
                        <div class="detailpro">
                            <i class="fad fa-circle-notch"></i> รับโบนัสจุใจตลอดทั้งวัน 10% ถอนไม่อั้น <br>
                            <i class="fad fa-circle-notch"></i> รับโบนัสจุใจตลอดทั้งวัน 10% ถอนไม่อั้น <br>
                            <i class="fad fa-circle-notch"></i> ทำเทิร์น 1 เท่า
                            <br>
                            <div style="text-align: center;">
                                <button class="btnbonus mcolor">รับโบนัส</button>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image:url(&#x27;assets/images/3.jpg&#x27;)">
                        <div class="detailpro">
                            <i class="fad fa-circle-notch"></i> ไม่รับโบนัส <br>
                            <i class="fad fa-circle-notch"></i> ไม่รับโบนัส <br>
                            <i class="fad fa-circle-notch"></i> ได้เสียเท่าไหร่ถอนได้ทันที
                            <br>
                            <div style="text-align: center;">
                                <button class="btnbonus mcolor">รับโบนัส</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
            </div>
            <button class="btnnext2 bkcolor"><i class="fad fa-chevron-right"></i></button>
            <button class="btnprev2 bkcolor"><i class="fad fa-chevron-left"></i></button>
        </div>
    </div>
</div>
<!-- End event section -->

<!-- swiper js -->
<script src="assets/js/swiper-bundle.min_1.js"></script>

<script>
    $(function() {
        opentab('event')
    })

    var swiper3 = new Swiper('.swiper-container-3', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        observer: true,
        observeParents: true,
        initialSlide: 1,
        coverflowEffect: {
            rotate: 10,
            stretch: 150,
            depth: 500,
            modifier: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.btnnext2',
            prevEl: '.btnprev2',
        },
    });
</script>

<?= $this->endSection(); ?>