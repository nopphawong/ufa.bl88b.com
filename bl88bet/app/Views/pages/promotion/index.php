<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- promotion section -->
<div id="promotion" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-gift"></i> <?= lang('Lang.promotion.promotion') ?></div>
    <div class="containprocess containpromotion">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&#x27;assets/images/1.jpg&#x27;)">
                    <div class="detailpro">

                        <br>
                        <div style="text-align: center;">
                            <button class="btnbonus mcolor">รับโบนัส</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(&#x27;assets/images/2.jpg&#x27;)">
                    <div class="detailpro">

                        <br>
                        <div style="text-align: center;">
                            <button class="btnbonus mcolor">รับโบนัส</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(&#x27;assets/images/4.jpg&#x27;)">
                    <div class="detailpro">

                        <br>
                        <div style="text-align: center;">
                            <button class="btnbonus mcolor">รับโบนัส</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(&#x27;assets/images/3.jpg&#x27;)">
                    <div class="detailpro">

                        <br>
                        <div style="text-align: center;">
                            <button class="btnbonus mcolor">รับโบนัส</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
        </div>
        <button class="btnnext bkcolor"><i class="fad fa-chevron-right"></i></button>
        <button class="btnprev bkcolor"><i class="fad fa-chevron-left"></i></button>
    </div>
</div>
<!-- End promotion section -->

<!-- swiper js -->
<script src="assets/js/swiper-bundle.min_1.js"></script>

<script>
    $(function() {
        opentab('promotion')
    })

    // Promotion-----------------------------------
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        observer: true,
        observeParents: true,
        initialSlide: 1,
        coverflowEffect: {
            rotate: 10,
            stretch: 120,
            depth: 500,
            modifier: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.btnnext',
            prevEl: '.btnprev',
        },
    });

    // Promotion--------------------------------------
</script>

<?= $this->endSection(); ?>