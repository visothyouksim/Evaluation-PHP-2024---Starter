<?php
# Inclusion du header
require_once './partials/header.php';

require_once './helpers/post.helper.php';


/*
     * La superglobale GET me permet de récupérer les informations
     * passées dans mon URL. Ex. categorie.php?slug=politique
     */
# var_dump($_GET);

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id !== null) {
    $posts = getPostsByForumId($id);
} else {
}


?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Titre de la page -->
    <div class="p-3 mx-auto text-center">
        <h1 class="display-4 text-capitalize">
            <?php foreach ($forums as $forum) : ?>
                <?php if ($forum['id_forum'] == $id) echo $forum['name']; ?>
            <?php endforeach; ?>

        </h1>
    </div>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach ($posts as $post) : ?>
                    <!-- Ici, vous pouvez inclure un fichier partial pour afficher chaque post individuellement -->
                    <?php include 'partials/forum/_post-card.php'; ?>
                <?php endforeach; ?>
            </div>
        </div>

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>