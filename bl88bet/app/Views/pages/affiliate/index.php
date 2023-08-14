<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- friend section -->
<div id="friend" class="tabcontent">
    <div class="containfriend">
        <div class="bgcutinfriend">
            <div class="headerprocess"><i class="fal fa-users"></i> พันธมิตร</div>
            <div class="wrapgrid001">
                <div class="inwrapgrid001">
                    <div class="ininwrapgrid001" onclick="openfriendtab(event, 'allfriend')" id="tabfriendopen">
                        <i class="far fa-handshake"></i><br>
                        ภาพรวม
                    </div>
                </div>
                <div class="inwrapgrid001">
                    <div class="ininwrapgrid001 " onclick="openfriendtab(event, 'friendtabs')">
                        <i class="far fa-handshake"></i><br>
                        เพื่อน
                    </div>
                </div>
                <div class="inwrapgrid001">
                    <div class="ininwrapgrid001  " onclick="openfriendtab(event, 'moneyfriendtabs')">
                        <i class="far fa-handshake"></i><br>
                        รายได้
                    </div>
                </div>
                <div class="inwrapgrid001">
                    <div class="ininwrapgrid001  " onclick="openfriendtab(event, 'withdrawfriendtabs')">
                        <i class="far fa-handshake"></i><br>
                        ถอนรายได้
                    </div>
                </div>
            </div>
            <div class="moneycontainaf">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <i class="fas fa-users-crown"></i>
                            </td>
                            <td style="text-align: right;">
                                รายได้ปัจจุบัน / รับไปทั้งหมด <br>
                                <span style="font-size: 25px; color: #fddc8c;">0.00 / 0.00</span>
                                <br>
                                <div style="position: relative;">
                                    <span class="countearnmoney">
                                        <i class="fad fa-money-bill"></i>
                                        อัตราส่วนแบ่งรายได้ (2 ชั้น)</span>
                                    <!-- ปุ่มถอนรายได้ form>....... -->
                                    <br>
                                    <div id="withdrawfriend">
                                        <button class="btn-grad" type="submit"><i class="fas fa-hand-holding-usd"></i>
                                            แจ้งถอนรายได้</button>
                                    </div>
                                    <!-- </from>................ -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="pcfriendback">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td class="text-left">
                                    <i class="fad fa-coins" style="font-size: 20px;"></i> <span>ส่วนแบ่งรายได้ชั้นที่ 1</span>
                                </td>
                                <td class="text-right">
                                    <span style="font-size: 20px;">10 %</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td class="text-left">
                                    <i class="fad fa-coins" style="font-size: 20px;"></i> <span>ส่วนแบ่งรายได้ชั้นที่ 2</span>
                                </td>
                                <td class="text-right">
                                    <span style="font-size: 20px;">5 %</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="containlinkcopy">
                        ลิงค์แนะนำ
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="80%" style="text-align: center;">
                                        <input class="friendlink" id="friend" type="text" name="link" readonly value="https://app.icerbet888.com/register-friend/3128">
                                    </td>
                                    <td width="20%" style="text-align: right;">
                                        <button onclick="copy('hello world')" class="btnfriendback02">คัดลอกลิงค์</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="allfriend" class="friendcontent">
                <div style=" padding:0 30px; padding-top: 10px; text-align: center; ">
                    <span class="detailaf">รายละเอียด</span>
                    <div role="alert" class="indetail">
                        <div class="row" style="padding-top: 5px;">
                            <div class="col-6 text-left">
                                <span>เพื่อนทั้งหมด</span>
                            </div>
                            <div class="col-4 text-right">0</div>
                            <div class="col-2">คน</div>
                        </div>
                        <div class="row" style="padding-top: 5px;">
                            <div class="col-6 text-left">
                                <span>เพื่อนที่ฝาก</span>
                            </div>
                            <div class="col-4 text-right">0</div>
                            <div class="col-2">คน</div>
                        </div>
                        <div class="row" style="padding-top: 5px;">
                            <div class="col-6 text-left">
                                <span>ยอดฝาก</span>
                            </div>
                            <div class="col-4 text-right">0.00</div>
                            <div class="col-2">บาท</div>
                        </div>
                        <div class="row" style="padding-top: 5px;">
                            <div class="col-6 text-left">
                                <span>ยอดแทงเสีย</span>
                            </div>
                            <div class="col-4 text-right">0.00</div>
                            <div class="col-2">C</div>
                        </div>
                    </div>
                </div>
                <div class="alert01 mt-1" role="alert01" style="font-size: 11px; text-align: left; color:white;">
                    <span style="font-size: 20px;color: #e8c675;">ระบบพันธมิตร</span>
                    หารายได้กับเราง่ายๆเพียงแค่ท่านแชร์ลิ้งแนะนำเพื่อนออกไป ท่านก็สามารถรับรายได้จากยอดแทงเสียของเพื่อนไปเลย
                </div>
            </div>
            <div id="friendtabs" class="friendcontent">
                <div style="margin-top: 15px; position: relative;text-align: center;"> <span class="detailaf">รายชื่อเพื่อน</span></div>
                <div class="divoffriends">
                </div>
            </div>
            <div id="moneyfriendtabs" class="friendcontent">
                <div style="padding:10px;">เลือกเดือน</div>
                <div class="divoffriends">
                    <input type="month" id="month" name="month" class="form-control" value="2021-03">
                </div>
            </div>
            <div id="withdrawfriendtabs" class="friendcontent">
                <div class="wranningwd" style="padding:10px;"><span class="detailaf">คำอธิบาย</span>รายได้ที่เกิดขึ้นในวันนี้จะสามารถทำการถอนได้ในวันถัดไป</div>
                <div class="divoffriends">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End friend section -->

<script>
    $(function() {
        opentab('friend')
    })

    // tabs friend---------------------------------------------------------
    function openfriendtab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("friendcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";

        }
        tablinks = document.getElementsByClassName("ininwrapgrid001");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");

        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        if ($("#allfriend").css('display') == 'none') {
            $(".countearnmoney").hide();
            $(".pcfriendback").hide();
        } else {
            $(".countearnmoney").show();
            $(".pcfriendback").show();
        }


        if ($("#withdrawfriendtabs").css('display') == 'block') {
            $("#withdrawfriend").show();
        } else {
            $("#withdrawfriend").hide();
        }

    }
    document.getElementById("tabfriendopen").click();
    // Endtabs friend---------------------------------------------------------
</script>

<?= $this->endSection(); ?>