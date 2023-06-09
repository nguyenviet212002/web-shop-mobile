<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="text/css" href="<?php echo _FOLDER_ROOT_; ?>/public/acssets/clients/css/style.css">
</head>

<body>
    <?php
    $this->render('blocks/header');
    $this->render($content);
    $this->render('blocks/footer')
    ?>

    <script src="<?php echo _FOLDER_ROOT_; ?>/public/acssets/clients/js/main.js"></script>
</body>

</html>