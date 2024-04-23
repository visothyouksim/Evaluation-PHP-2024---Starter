<?php
# Inclusion du header
require_once './partials/header.php';

# Récupération du paramètre slug depuis l'URL
$id = $_GET['id'];

# En cas d'absence du id
if(!isset($_GET['id'])) {
    redirect('index.php');
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

# Récupération de l'article
$post = getPostById($id);
$messages = getMessagesByPostId($post['ID_POST']);

if (!$post) {
    redirect('erreur404.php');
}

?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
             <!-- Affichage des messages flash -->
             <?php include 'partials/flash/_flash.message.php' ?>
            <div class="row">

                <div class="col">

                    <!-- Titre de l'article -->
                    <h1 class="display-4"><?= $post['TITLE'] ?></h1>
                    <p><?= $post['DESCRIPTION'] ?></p>
                    <hr class="border border-dark" >

                    <!-- Information de l'article -->
                    <h4 class="text-muted d-flex justify-content-between align-items-center">
                        <p class="m-0"><small style="font-size: 1rem; margin-right: 1rem;">Publié le</small> <?= $post['CREATEDAT'] ?></p>
                    </h4>

                    <hr class="border border-dark mb-5" >

                    <?php foreach ($messages as $message): ?>
                        <div class="alert alert-info">
                            <?= $message['CONTENT'] ?>
                        </div>
                    <?php endforeach ?>

                </div> <!-- ./col -->
            </div> <!-- ./row -->
        </div> <!-- ./container -->
    </div> <!-- ./bg-light -->

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>
