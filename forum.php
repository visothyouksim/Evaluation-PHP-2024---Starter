<?php
    # Inclusion du header
    require_once './partials/header.php';

    /*
     * La superglobale GET me permet de récupérer les informations
     * passées dans mon URL. Ex. categorie.php?slug=politique
     */
    # var_dump($_GET);

    // Assuming the ID is coming from a query string
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Titre de la page -->
    <div class="p-3 mx-auto text-center">
        <h1 class="display-4 text-capitalize">
            <?= $forum['name'] ?>
        </h1>
    </div>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach ($posts as $post):
                    # On fait un copier / coller du fichier dans la boucle
                    # Il y aura autant d'include que de tour de boucle
                    include 'partials/forum/_post-card.php';
                endforeach ?>
            </div>
        </div>
    </div>

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>
