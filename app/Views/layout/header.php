<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Title</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <?php if (isset($css) && !empty($css)) : ?>
        <?php foreach ($css as $c) : ?>
            <link rel="stylesheet" href="./assets/styles/<?= $c ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style type="text/css">
        html {
            display: none;
        }
        * {
            font-family: system-ui!important;
            /* outline: solid red 1px; */
        }
    </style>
</head>
<body>