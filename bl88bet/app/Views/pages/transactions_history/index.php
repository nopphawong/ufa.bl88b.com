<?php

use App\Libraries\CustomFormatter;

$formatter = new CustomFormatter();
$language = \Config\Services::language();
$locale = $language->getLocale();

?>

<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- history section -->
<div id="history" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-history"></i> ประวัติ</div>
    <div class="containprocess " style="margin-top: 10px;">
        <!-- <table style="width: 100%;">
            <thead style="text-align: center;">
                <th class="headhistory active">
                    <button id="btnhistoryhis" onclick="getTransactionHistory('all')"><i class="fal fa-history" style="color: #aeb2ff;"></i>
                        ประวัติฝาก/ถอน</button>
                </th>
                <th class="headdeposit">
                    <button id="btndeposithis" onclick="getTransactionHistory('deposit')"><i class="fal fa-plus-circle" style="color: #85c185;"></i>
                        ประวัติการฝาก</button>
                </th>
                <th class="headwithdraw">
                    <button id="btnwithdrawwhis" onclick="getTransactionHistory('withdraw')"><i class="fal fa-minus-circle" style="color: red;"></i>
                        ประวัติการถอน</button>
                </th>
            </thead>
        </table> -->
        <div id="historyhis">
            แสดงข้อมูล <span style="color: #aeb2ff;">ฝาก/ถอนเงิน</span> ย้อนหลัง
            <div id="all" class="containloophisdps">
                <!-- Start Loop หน้าฝากเงิน -------------------------------------------------------------- -->
                <?php if ($result->status == 1) : ?>
                    <?php if (count($result->data) > 0) : ?>
                        <?php foreach ($result->data as $item) : ?>
                            <div id='all'>
                                <div class="<?= $formatter->transactionTypeBackground($item->type) ?>">
                                    <table width="100%">
                                        <tr>
                                            <td width="50%" style="padding-top: 7px;">
                                                <table>
                                                    <?php if ($item->type == 'ฝาก') : ?>
                                                        <tr>
                                                            <td style="padding-right: 5px;"> <img class="backlogohis" src="<?= base_url() ?>assets/images/bank/<?= $formatter->transactionBankIcon($item->frombank) ?>.svg"></td>
                                                            <td style="text-align: left; line-height: 20px;">
                                                                <span class="spanofbankhis"><?= lang('Lang.transactions_history.bank_name', [$formatter->transactionBank($item->frombank)]) ?></span>
                                                                <br>
                                                                <span class="spanofbankhis"><?= $formatter->transactionBankAccount($item->frombank) ?></span>

                                                            </td>
                                                        </tr>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td style="padding-right: 5px;"> <img class="backlogohis" src="<?= base_url() ?>assets/images/bank/<?= $formatter->transactionBankIcon($item->tobank) ?>.svg"></td>
                                                            <td style="text-align: left; line-height: 20px;">
                                                                <span class="spanofbankhis"><?= lang('Lang.transactions_history.bank_name', [$formatter->transactionBank($item->tobank)]) ?></span>
                                                                <br>
                                                                <span class="spanofbankhis"><?= $formatter->transactionBankAccount($item->tobank) ?></span>

                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </table>
                                            </td>
                                            <td width="50%" style="text-align: right; line-height: 20px;">
                                                <div class="statushistory"> <span style="<?= $formatter->colorStatus($item->status) ?>"><?= $formatter->transactionStatus($item->status) ?></span></div>
                                                <span class="moneyhisdps"> <i class="<?= $formatter->transctionTypeIcon($item->type) ?>"></i> <?= number_to_currency($item->amount, 'THB', 'th', 2); ?></span>
                                                <br>
                                                <span style="font-size: 11px;"><?= $item->date ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div id='all'>
                            <div style="margin-top: 5rem;font-size: 24px;text-shadow: 3px 3px 10px #000, 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #fff;"><?= lang('Lang.transactions_history.no_history') ?></div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- End Loop หน้าฝากเงิน -------------------------------------------------------------- -->
            </div>
        </div>
        <div id="deposithis">
            แสดงข้อมูล <span style="color: #9fe7a0;">ฝากเงิน</span> ย้อนหลัง
            <div id="deposit" class="containloophisdps"></div>
        </div>
        <div id="withdrawwhis">
            แสดงข้อมูล <span style="color: #ff8989;">ถอนเงิน</span> ย้อนหลัง
            <div id="withdraw" class="containloophiswd"></div>
        </div>
    </div>
</div>
<!-- End history section -->

<script>
    var lastestSegment = 'all'
    $(function() {
        opentab('history')
        $('#historyhis').show()
        $('#withdrawwhis').hide()
        $('#deposithis').hide()
    })

    //history-------------------------------------------
    $('#btnhistoryhis').click(function() {
        $('.headdeposit').removeClass('active')
        $('.headwithdraw').removeClass('active')
        $('.headhistory').addClass('active')
        $('#historyhis').show()
        $('#withdrawwhis').hide()
        $('#deposithis').hide()
    })

    $('#btnwithdrawwhis').click(function() {
        $('.headhistory').removeClass('active')
        $('.headdeposit').removeClass('active')
        $('.headwithdraw').addClass('active')
        $('#withdrawwhis').show()
        $('#historyhis').hide()
        $('#deposithis').hide()
    })

    $('#btndeposithis').click(function() {
        $('.headhistory').removeClass('active')
        $('.headwithdraw').removeClass('active')
        $('.headdeposit').addClass('active')
        $('#deposithis').show()
        $('#historyhis').hide()
        $('#withdrawwhis').hide()
    })
    //history-------------------------------------------
    function getTransactionHistory(segment) {
        if ((segment === 'all' || segment === 'deposit' || segment === 'withdraw') && lastestSegment != segment) {
            lastestSegment = segment
            let segmentUrl = "<?= base_url() . 'transactions/all' ?>";
            switch (segment) {
                case 'deposit':
                    segmentUrl = "<?= base_url() . 'transactions/deposit' ?>";
                    break;
                case 'withdraw':
                    segmentUrl = "<?= base_url() . 'transactions/withdraw' ?>";
                    break;
                default:
                    break;
            }
            $.ajax({
                url: segmentUrl,
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
                            msg,
                            data
                        } = JSON.parse(response)
                        if (!status) {
                            swalError('<?= lang('Lang.dialog.confirm_btn') ?>', msg)
                        } else {
                            let body = ''
                            let content = ''
                            let condition = ''
                            if (data.length) {
                                const thBath = new Intl.NumberFormat('th-TH', {
                                    style: 'currency',
                                    currency: 'THB',
                                })
                                for (const item of data) {
                                    if (item.type == 'ฝาก') {
                                        condition = `<tr>
                                                    <td style="padding-right: 5px;"> <img class="backlogohis" src="<?= base_url() ?>assets/images/bank/${bankIcon(item.frombank)}.svg"></td>
                                                    <td style="text-align: left; line-height: 20px;">
                                                        <span class="spanofbankhis">${bankNameFormat(item.frombank)}</span>
                                                        <br>
                                                        <span class="spanofbankhis">${bankAccountNumberFormat(item.frombank)}</span>
                                                    </td>
                                                </tr>`
                                    } else {
                                        condition = `<tr>
                                                    <td style="padding-right: 5px;"> <img class="backlogohis" src="<?= base_url() ?>assets/images/bank/${bankIcon(item.tobank)}.svg"></td>
                                                    <td style="text-align: left; line-height: 20px;">
                                                        <span class="spanofbankhis">${bankNameFormat(item.tobank)}</span>
                                                        <br>
                                                        <span class="spanofbankhis">${bankAccountNumberFormat(item.tobank)}</span>
                                                    </td>
                                                </tr>`
                                    }
                                    content += `<div class="${transactionTypeBackground(item.type)}">
                                <table width="100%">
                                    <tr>
                                        <td width="50%" style="padding-top: 7px;">
                                            <table>
                                                ${condition}
                                            </table>
                                        </td>
                                        <td width="50%" style="text-align: right; line-height: 20px;">
                                            <div class="statushistory"> <span style="${colorStatus(item.status)}">${transactionStatus(item.status)}</span></div>
                                            <span class="moneyhisdps"> <i class="${transctionTypeIcon(item.type)}"></i> ${thBath.format(item.amount)}</span>
                                            <br>
                                            <span style="font-size: 11px;">${item.date}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>`
                                }
                            } else {
                                content = `<div style="margin-top: 5rem;font-size: 24px;text-shadow: 3px 3px 10px #000, 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #fff;"><?= lang('Lang.transactions_history.no_history') ?></div>`
                            }
                            $(`#${segment}`).html(content);
                        }
                    } catch (err) {
                        console.log(err);
                    }
                },
                error: function(err) {
                    console.log(err);
                    swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Transaction:224']) ?>')
                }
            })
        }
    }

    /**
     * Transaction type convertor.
     */
    function transactionTypeBackground(type) {
        switch (type) {
            case 'ฝาก':
                return 'historyofdps';
            case 'ถอน':
                return 'historyofwd';
            case 'เพิ่มโบนัส':
                return 'historyofdps';
            default:
                return 'historyofwd';
        }
    }

    function bankIcon(value) {
        const splitValue = value.split('-')
        if (splitValue.length < 2 && splitValue.length > 3) return '???'
        return splitValue[0].toLowerCase()
    }

    function bankNameFormat(value) {
        const splitValue = value.split('-')
        if (splitValue.length < 2 && splitValue.length > 3) return '???'
        let bankName = ''
        switch (splitValue[0].toLowerCase()) {
            case 'kbank':
                bankName = '<?= lang('Lang.bank_list.kbank') ?>'
                break;
            case 'bbl':
                bankName = '<?= lang('Lang.bank_list.bbl') ?>'
                break;
            case 'bay':
                bankName = '<?= lang('Lang.bank_list.bay') ?>'
                break;
            case 'scb':
                bankName = '<?= lang('Lang.bank_list.scb') ?>'
                break;
            case 'ktb':
                bankName = '<?= lang('Lang.bank_list.ktb') ?>'
                break;
            case 'scib':
                bankName = '<?= lang('Lang.bank_list.scib') ?>'
                break;
            case 'uobt':
                bankName = '<?= lang('Lang.bank_list.uobt') ?>'
                break;
            case 'tisco':
                bankName = '<?= lang('Lang.bank_list.tisco') ?>'
                break;
            case 'kkp':
                bankName = '<?= lang('Lang.bank_list.kkp') ?>'
                break;
            case 'tbank':
                bankName = '<?= lang('Lang.bank_list.tbank') ?>'
                break;
            case 'ghb':
                bankName = '<?= lang('Lang.bank_list.ghb') ?>'
                break;
            case 'gsb':
                bankName = '<?= lang('Lang.bank_list.gsb') ?>'
                break;
            case 'baac':
                bankName = '<?= lang('Lang.bank_list.baac') ?>'
                break;
            case 'isbt':
                bankName = '<?= lang('Lang.bank_list.isbt') ?>'
                break;
            case 'lhfg':
                bankName = '<?= lang('Lang.bank_list.lhfg') ?>'
                break;
            case 'cimb':
                bankName = '<?= lang('Lang.bank_list.cimb') ?>'
                break;
            case 'ttb':
                bankName = '<?= lang('Lang.bank_list.ttb') ?>'
                break;
            default:
                bankName = '???'
                break;
        }

        const lang = '<?= $locale ?>'
        return lang == 'en' ?
            `${bankName}Bank` : `ธนาคาร${bankName}`
    }

    function bankAccountNumberFormat(value) {
        const splitValue = value.split('-')
        if (splitValue.length < 2 && splitValue.length > 3) return '???'
        const strBankNo = splitValue[1]
        strFirst = strBankNo.substr(0, 3)
        strSecond = strBankNo.substr(3, 1)
        strThird = strBankNo.substr(4, 5)
        strFourth = strBankNo.substr(9, 1)

        return `${strFirst}-${strSecond}-${strThird}-${strFourth}`
    }

    function transactionType($type) {
        switch ($type) {
            case 'ฝาก':
                return '<?= lang('Lang.transactions_history.deposit') ?>';
            case 'ถอน':
                return '<?= lang('Lang.transactions_history.withdraw') ?>';
            case 'เพิ่มโบนัส':
                return '<?= lang('Lang.transactions_history.add_bonus') ?>';
            default:
                return '<?= lang('Lang.transactions_history.reduce_bonus') ?>';
        }
    }

    function transctionTypeIcon(type) {
        switch (type) {
            case 'ฝาก':
                return 'fal fa-plus-circle plushis';
            case 'ถอน':
                return 'fal fa-minus-circle minushis';
            case 'เพิ่มโบนัส':
                return 'fal fa-plus-circle plushis';
            default:
                return 'fal fa-minus-circle minushis';
        }
    }

    /**
     * Transaction status.
     */
    function transactionStatus(status) {
        switch (status) {
            case 'Y':
                return '<?= lang('Lang.transactions_history.successful') ?>';
            case 'C':
                return '<?= lang('Lang.transactions_history.cancel') ?>';
            default:
                return '<?= lang('Lang.transactions_history.pending') ?>';
        }
    }

    /**
     * Transaction color status.
     */
    function colorStatus(status) {
        switch (status) {
            case 'Y':
                return 'background: #619d61;';
            case 'C':
                return 'background: #db1b1b;';
            default:
                return 'background: #c98e15;';
        }
    }
</script>

<?= $this->endSection(); ?>