<?= \Config\Services::validation()->listErrors() ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/creer-une-annonce" method="post">
                <!-- permet de valider que le formulaire envoyé est bien celui qui est traité -->
                <?= csrf_field() ?>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="title" />
                    <label for="title">Titre</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
                    <label for="description">Description</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="creationDate" id="creationDate" />
                    <label for="creationDate">Date de création</label>
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="price" id="price" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">€</span>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="category" name="id_categories" aria-label="Floating label select example">
                        <option selected disabled>Sélectionner une catégorie</option>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        <option value="3">Enfant</option>
                    </select>
                    <label for="category">Catégorie</label>
                </div>

                <input type="submit" name="submit" value="Create news item" />
            </form>
        </div>
    </div>
</div>