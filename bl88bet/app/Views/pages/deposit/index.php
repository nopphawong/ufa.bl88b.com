<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- Deposit section -->
<div id="deposit" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-plus-circle"></i> <?= lang('Lang.deposit.deposit') ?></div>
    <div class="accordion-div">
        <form action="#" method="post" id="deposit_form" enctype="multipart/form-data">
            <div class="tablewd01" style=" margin: 10px auto;">
                <div style="padding: 8px 20px;text-align:left;">
                    <div class="form-group">
                        <span style="font-size: 15px;">
                            <?= lang('Lang.deposit.deposit_amount') ?>
                        </span>
                        <input type="text" name="deposit_amount" class="form-control loginform01 number" placeholder="฿ 0.00" style="padding: 10px; margin-top: 10px;">
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: -10px; margin-bottom: 15px; padding:0px 30px;">
                <button class="mcolor colorbtn01"><i class="fal fa-hand-holding-usd"></i> <?= lang('Lang.deposit.confirm') ?></button>
            </div>
        </form>
        <div class="pdingaccord">
            <button class="accordion"><img src="<?= base_url() ?>assets/fonts/bank.svg" height="50px"> &nbsp;
                ธนาคาร
            </button>
            <div class="panel">
                <div style="padding-top: 20px; padding-bottom: 20px;">
                    <div align="center" class="tabletruewallet">
                        <div style="text-align: center; width: 100%; font-size: 13px; padding: 5px;">
                            <img src="<?= base_url() ?>assets/fonts/scb.svg" width="70px" style="margin-bottom: 5px;"><br>
                            ธนาคารไทยพาณิชย์
                            <br>
                            859-2-59209-0<br>
                            จีรพล มุสิกบุญเลิศ <br>
                            <button onclick="myAlertTop()" class="copybtn mcolor">คัดลอก<span hidden>859-2-59209-0</span></button>
                        </div>
                        <div style="text-align: center; width: 100%; font-size: 13px; padding: 5px;">
                            <img src="<?= base_url() ?>assets/fonts/kbank_1.svg" width="70px" style="margin-bottom: 5px;"><br>
                            กสิกรไทย
                            <br>
                            861-2-16048-2<br>
                            จีรพล มุสิกบุญเลิศ<br>
                            <button onclick="myAlertTop()" class="copybtn mcolor">คัดลอก<span hidden>861-2-16048-2</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pdingaccord">
            <button class="accordion" style="font-size: 20px;"><img src="<?= base_url() ?>assets/images/truewallet.png" height="30px">
                &nbsp;<span style="color: #ed1c24;">true</span><span style="color: #f38020">money</span><span style="color: #fff"> wallet</span></button>
            <div class="panel">
                <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div align="center" class="tabletruewallet">

                        <div style="text-align: center; width: 100%; font-size: 13px; padding: 5px;">
                            <img src="<?= base_url() ?>assets/fonts/truewallet.svg" width="70px" style="margin-bottom: 5px;"><br>
                            ทรูมันนี่วอลเล็ท
                            <br>
                            062-546-2593<br>
                            จีรพล มุสิกบุญเลิศ<br>
                            <button onclick="myAlertTop()" class="copybtn mcolor">คัดลอก<span hidden>062-546-2593</span></button>
                        </div>
                        <div style="text-align: center; width: 100%; font-size: 13px; padding: 5px;">
                            <img src="<?= base_url() ?>assets/fonts/truewallet.svg" width="70px" style="margin-bottom: 5px;"><br>
                            ทรูมันนี่วอลเล็ท
                            <br>
                            062-539-8783<br>
                            จีรพล มุสิกบุญเลิศ<br>
                            <button onclick="myAlertTop()" class="copybtn mcolor">คัดลอก<span hidden>062-539-8783</span></button>
                        </div>
                        <div style="text-align: center; width: 100%; font-size: 13px; padding: 5px;">
                            <img src="<?= base_url() ?>assets/fonts/truewallet.svg" width="70px" style="margin-bottom: 5px;"><br>
                            ทรูมันนี่วอลเล็ท
                            <br>
                            062-539-8783<br>
                            จีรพล มุสิกบุญเลิศ<br>
                            <button onclick="myAlertTop()" class="copybtn mcolor">คัดลอก<span hidden>062-539-8783</span></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Deposit section -->

<script>
    $(function() {
        opentab('deposit')

        $("#deposit_form").validate({
            rules: {
                deposit_amount: {
                    required: true,
                    min: 1,
                    number: true,
                    digits: true,
                },
            },
            messages: {
                deposit_amount: {
                    required: '<?= lang('Lang.deposit.amount_is_required') ?>',
                    min: '<?= lang('Lang.deposit.amount_is_min') ?>',
                    number: '<?= lang('Lang.deposit.amount_is_digits') ?>',
                    digits: '<?= lang('Lang.deposit.amount_is_digits') ?>',
                },
            },
            submitHandler: function(form) {
                const method = $(form).attr('method')
                const formData = new FormData(form)
                formData.set('bankid', '<?= $result->data->bankid ?>')
                formData.set('bankno', '<?= $result->data->bankno ?>')
                $.ajax({
                    url: '<?= base_url('/deposit/submit') ?>',
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
                                swalFlashAlert(msg)
                                setTimeout(function() {
                                    window.location = '/transactions-history'
                                }, 1000)
                            }
                        } catch (err) {
                            console.log(err);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Deposit 194']) ?>')
                    }
                })
            },
        })
    })

    // Deposit -----------------------------------------------------

    // W3C's JS Code
    var acc = document.getElementsByClassName('accordion')
    var i

    // Add onclick listener to every accordion element
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            // For toggling purposes detect if the clicked section is already "active"
            var isActive = this.classList.contains('active')

            // Close all accordions
            var allAccordions = document.getElementsByClassName('accordion')
            for (j = 0; j < allAccordions.length; j++) {
                // Remove active class from section header
                allAccordions[j].classList.remove('active')

                // Remove the max-height class from the panel to close it
                var panel = allAccordions[j].nextElementSibling
                var maxHeightValue = getStyle(panel, 'maxHeight')

                if (maxHeightValue !== '0px') {
                    panel.style.maxHeight = null
                }
            }

            // Toggle the clicked section using a ternary operator
            isActive ? this.classList.remove('active') : this.classList.add('active')

            // Toggle the panel element
            var panel = this.nextElementSibling
            var maxHeightValue = getStyle(panel, 'maxHeight')

            if (maxHeightValue !== '0px') {
                panel.style.maxHeight = null
            } else {
                panel.style.maxHeight = panel.scrollHeight + 'px'
            }
        }
    }

    // Cross-browser way to get the computed height of a certain element. Credit to @CMS on StackOverflow (http://stackoverflow.com/a/2531934/7926565)
    function getStyle(el, styleProp) {
        var value,
            defaultView = (el.ownerDocument || document).defaultView
        // W3C standard way:
        if (defaultView && defaultView.getComputedStyle) {
            // sanitize property name to css notation
            // (hypen separated words eg. font-Size)
            styleProp = styleProp.replace(/([A-Z])/g, '-$1').toLowerCase()
            return defaultView.getComputedStyle(el, null).getPropertyValue(styleProp)
        } else if (el.currentStyle) {
            // IE
            // sanitize property name to camelCase
            styleProp = styleProp.replace(/\-(\w)/g, function(str, letter) {
                return letter.toUpperCase()
            })
            value = el.currentStyle[styleProp]
            // convert other units to pixels on IE
            if (/^\d+(em|pt|%|ex)?$/i.test(value)) {
                return (function(value) {
                    var oldLeft = el.style.left,
                        oldRsLeft = el.runtimeStyle.left
                    el.runtimeStyle.left = el.currentStyle.left
                    el.style.left = value || 0
                    value = el.style.pixelLeft + 'px'
                    el.style.left = oldLeft
                    el.runtimeStyle.left = oldRsLeft
                    return value
                })(value)
            }
            return value
        }
    }

    // End Deposit -----------------------------------------------------
</script>

<?= $this->endSection(); ?>