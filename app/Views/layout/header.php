<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?= $title ?></title>
    <link rel="shortcut icon" href="<?= esc(base_url() . 'favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= esc(base_url() . 'assets/css/main.css') ?>" />
    <noscript><link rel="stylesheet" href="<?= esc(base_url() . 'assets/css/noscript.css') ?>" /></noscript>
    <style type="text/css">
        html {
            display: none;
        }
        * {
            font-family: system-ui!important;
            /* outline: solid red 1px; */
        }
        .tiles article {
            width: calc(12em)!important;
            height: calc(17em)!important;
        }
    </style>
</head>