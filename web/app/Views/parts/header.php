<!DOCTYPE HTML>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Immo'Magic!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="stylsheet" hreg="/uploads">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <script src="sweetalert2.all.min.js" defer></script>
    <script src="https://kit.fontawesome.com/161626f7e5.js" defer></script>
</head>
<body>
<h1><?= esc($title) ?></h1> <!-- esc() fction globale fournie par CI pour aider à prevenir des attaques CSS -->
<div class="container">
    <div id="immo'magic">
        <img src="img/magic.png"/>
        <img src="assets/img/logo.jpg"/>
        <h1 style="text-align:center">Immo'Magic</h1>
        <h1><b>Le bien de vos rêves est là!</b></h1>
        <i class="fas fa-heart"></i>
        <i class="fas fa-user-circle"></i>
        <i class="fab fa-facebook-square"></i>
        <i class="fab fa-twitter"></i>
        <i class="fas fa-search-location"></i>
    </div>
</div>
