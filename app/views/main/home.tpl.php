<main class="mt-3">
            <form action="<?= $router->generate('message-create') ?>" method="post">
                <div>
                    <label for="nom">Nom</label><br>
                    <input type="text" id="nom" name="nom">
                </div>
                <div>
                    <label for="description">Description</label><br>
                    <textarea id="description" name="description" class="w-100"></textarea>
                </div>
                <div>
                    <button>Ajouter un message</button>
                </div>
            </form>
            <?php foreach($allCharacters as $key => $currentCharacter): ?>
            <article class="container mt-5 border">
                <h2><?= $currentCharacter['nom']  ?></h2>
                <p> <?= $currentCharacter['description']  ?></p>
            </article>
            <?php endforeach ?>