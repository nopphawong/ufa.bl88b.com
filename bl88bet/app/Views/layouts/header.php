<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= esc($title) ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link href="assets/css/pro.min_1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- AOS JS -->
    <?= link_tag('assets/css/aos.css?v=1.0') ?>

    <!-- javascript -->
    <script src="assets/js/jquery-3.6.0.js" crossorigin="anonymous"></script>

    <!-- CSS flickity -->
    <link rel="stylesheet" href="assets/css/flickity.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- Our Custom CSS -->
    <?= link_tag('assets/css/style.css?v=1.0.1') ?>

    <!-- Loader CSS -->
    <?= link_tag('assets/css/loader.css?v=1.1') ?>

</head>

<!-- <body class="d-flex flex-column h-100" oncontextmenu="return false"> -->

<body class="d-flex flex-column h-100">

    <div id="loader-area">
        <div id="custom-loader">
            <div id="shadow"></div>
            <div id="box"></div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        // JS.JS
        if (window !== window.parent) {
            $('.wrapper').show();
        } else {
            $('.wrapper').remove();
            window.top.close();
        }

        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }
        // JS.JS
    </script> -->