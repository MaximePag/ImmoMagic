<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-5">Voici la liste des annonces</h2>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($announcesList as $announce) { ?>
            <div class="col-12 col-md-6 mb-3">
                <div class="border border-secondary">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="fw-bold">Titre : </span><?= $announce['title'] ?></li>
                        <li class="list-group-item"><span class="fw-bold">Description : </span><?= $announce['description'] ?></li>
                        <li class="list-group-item"><span class="fw-bold">Date de création : </span><?= $announce['creationDate'] ?></li>
                        <li class="list-group-item"><span class="fw-bold">Prix : </span><?= $announce['price'] ?> $</li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</div>