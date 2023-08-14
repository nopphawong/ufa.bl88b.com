<?= $this->extend('layouts/lobby'); ?>

<?= $this->section('content'); ?>

<!-- playgame section -->
<div id="playgame" class="tabcontent">
    <div class="headerprocess"><i class="fal fa-gamepad-alt"></i> เข้าเล่นเกม</div>
    <div class="containprocess " style="padding-top: 20px;">
        <table width="100%">
            <tr>
                <td class="gameingtd active">
                    <div class="bkcolor tablinkgame" onclick="opengame(event, 'casino')" id="dfgameOpen"><span><i class="fal fa-spade"></i> คาสิโน</span></div>
                </td>
                <td class="gameingtd">
                    <div class="bkcolor tablinkgame" onclick="opengame(event, 'slot')"><span><i class="fal fa-dice"></i>
                            สล็อต</span></div>
                </td>
                <td class="gameingtd">
                    <div class="bkcolor tablinkgame" onclick="opengame(event, 'sport')"><span><i class="fas fa-futbol"></i></i> กีฬา</span></div>
                </td>
            </tr>
        </table>
        <div id="casino" class="tabgame">
            <div class="gridofgame">
                <?php if (isset($result) && isset($result->casino)) : ?>
                    <?php foreach ($result->casino as $obj) : ?>
                        <div class="ingridgame" onclick="playgame(event, '<?= $obj->code ?>')">
                            <div class="iningridgame"><img src="<?= base_url() ?>assets/images/sexy.png"><br><?= $obj->name ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/sagaming.png"><br>Sa Gaming</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/wm_logo_100x87.png"><br>WM</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/biggaming.png"><br>BG</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/luckystreak.png"><br>Lucky Streak</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/venus.png"><br>Venus</div>
                </div> -->
            </div>
        </div>
        <div id="slot" class="tabgame">
            <div class="gridofgame">
                <?php if (isset($result) && isset($result->slot)) : ?>
                    <?php foreach ($result->slot as $obj) : ?>
                        <div class="ingridgame" onclick="playgame(event, '<?= $obj->code ?>')">
                            <div class="iningridgame"><img src="<?= base_url() ?>assets/images/joker.png"><br><?= $obj->name ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/JDB.png"><br>JOKER</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/PGlogo2.png"><br>PG</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/tgp_redt.png"><br>Red Tiger</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/FC.png"><br>FC</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/tgp_sg.png"><br>tgp_sg</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/FG.png"><br>FG</div>
                </div> -->
            </div>
        </div>
        <div id="sport" class="tabgame">
            <div class="gridofgame">
                <?php if (isset($result) && isset($result->sport)) : ?>
                    <?php foreach ($result->sport as $obj) : ?>
                        <div class="ingridgame" onclick="playgame(event, '<?= $obj->code ?>')">
                            <div class="iningridgame"><img src="<?= base_url() ?>assets/images/bgfishing.png"><br><?= $obj->name ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/joker.png"><br>Joker Fishing</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/kingmaker1010.png"><br>Kingmaker</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/JDB.png"><br>JDB Fishing</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/tgp_sg.png"><br>SG Fishing</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/FG.png"><br>FG Fishing</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/ameIcon_512.png"><br>BG Fishing</div>
                </div>
                <div class="ingridgame">
                    <div class="iningridgame"><img src="<?= base_url() ?>assets/images/pok-deng-pok89.png"><br>BG Xlyou</div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- End playgame section -->

<script>
    $(function() {
        opentab('playgame')
    })

    // gamingtab---------------------------------------------------------
    function opengame(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabgame");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinkgame");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("dfgameOpen").click();
    // gamingtab---------------------------------------------------------

    function playgame(event, code) {
        event.preventDefault();
        const formData = new FormData()
        formData.set('game_code', code)
        $.ajax({
            url: '<?= base_url('/playgame') ?>',
            method: 'post',
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
                    if (status === true) {
                        window.location.href = data.url
                    }
                } catch (err) {
                    console.log(err);
                    toastr.error(err)
                }
            },
            error: function(err) {
                swalError('<?= lang('Lang.dialog.confirm_btn') ?>', '<?= lang('Lang.error.something_went_wrong', ['Casino:80']) ?>')
            }
        })
    }
</script>

<?= $this->endSection(); ?>