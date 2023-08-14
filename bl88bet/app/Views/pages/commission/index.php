<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- comis section -->
<div id="comis" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-hands-usd"></i> คอมมิชชั่น</div>
    <div class="containprocess" style="padding: 0 20px;">
        <div class="moneyfriend">
            <div style="font-size: 15px; color: #fff;">ยอดทั้งหมด</div>
            <div style="margin-top: 5px;  font-weight: bold;">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td class="cashbmoney">
                                ฿95300.23
                            </td>
                            <td style="width: 50%; text-align: right;">
                                <button class="btncashback02 mcolor">ถอนเงิน</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pccashback">
                <table width="100%" style="white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="width: 33.3%; text-align: center;">
                                ยอดวันนี้ <br> <span style="color: #fff; font-size: 14px;">฿ 3009.00</span>
                            </td>
                            <td style="width: 33.3%; text-align: center;">
                                ที่สามารถรับได้ <br> <span style="color: #fff; font-size: 14px;">฿ 3009.00</span>
                            </td>
                            <td style="width: 33.3%; text-align: center;">
                                จ่ายแล้ว <br> <span style="color: #fff; font-size: 14px;">฿ 3009.00</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End comis section -->

<script>
    $(function() {
        opentab('comis')
    })
</script>

<?= $this->endSection(); ?>