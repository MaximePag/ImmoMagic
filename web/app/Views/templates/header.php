<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Immo'Magic!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <script src="sweetalert2.all.min.js" defer></script>
    <script src="https://kit.fontawesome.com/161626f7e5.js" defer></script>


</head>
<body>
<h1><?= esc($title) ?></h1> <!-- esc() fction globale fournie par CI pour aider à prevenir des attaques CSS -->
<div class="container" id="header">
    <div id="title"><h1 id="rotate"><b>Immo'Magic</b></h1><em id="slogan"> Le bien de vos rêves est là!</em></div>
        <div class="icons">
            <i class="fas fa-heart fa-2x"></i>
            <i class="fas fa-user-circle fa-2x"></i>
            <i class="fab fa-facebook-square fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
            <i class="fas fa-search-location fa-2x"></i>
        </div>
</div>

