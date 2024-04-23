<?php
# Inclusion du header
require_once './partials/header.php';

# Vérification des droits d'accès
$user = isAuthenticated();
if ( !$user || ($user && !isGranted('ROLE_ADMIN')) ) {
    addFlash('danger', "Vous n'avez pas les droits suffisants pour cette opération.");
    redirect("connexion.php");
}

# 1. Récupération des informations
# Initialisation des variables à null
$title = $description = $id_forum = $id_user = null;

# 2. Vérification des données $_POST
if (!empty($_POST)) {

    # TODO Récupération des informations $_POST
    # TODO Vérification des informations
    $errors = [];

    # TODO Vérification du titre
    # TODO Vérification de la description
    # TODO Vérification du forum

    # Insertion dans la BDD
    if (empty($errors)) {
        try {
            # TODO Insertion du Post dans la BDD
            if ($id_post) {
                addFlash('success', 'Félicitation votre article est en ligne !');
                redirect("post.php?id=$id_post");
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}


?>

<!-- Contenu de notre page -->
<!-- .p-3.mx-auto.text-center>h1.display-4{Actunews} -->
<main>

    <!-- Titre de la page -->
    <div class="p-3 mx-auto text-center">
        <h1 class="display-4">Créer un article</h1>
    </div>

    <!-- Contenu de la page -->
    <!-- .py-5.bg-light>.container>.row>.col-md-4*6>.card.shadow-sm -->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">

                    <form id="createPostForm"
                          method="post">

                        <!-- Affichage d'une notification d'erreur -->
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger mt-4">
                                <u>Une erreur est survenue dans la validation de vos données :</u> <br>
                                <?php foreach ($errors as $error) : ?>
                                    <?= $error ?> <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>"
                                   id="title" name="title" value="<?= $title ?>" placeholder="Saisissez votre titre">
                            <div class="invalid-feedback">
                                <?= $errors['title'] ?? '' ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ID_FORUM" class="form-label">Catégorie</label>
                            <select
                                    id="ID_FORUM" name="id_forum"
                                    class="form-control <?= isset($errors['ID_FORUM']) ? 'is-invalid' : '' ?>"
                                    name="id_forum">

                                <option selected disabled value="0">-- Choisissez un forum --</option>
                                <?php foreach ($forums as $forum): ?>
                                    <option
                                        <?= $forum['ID_FORUM'] == $id_forum ? 'selected' : '' ?>
                                            value="<?= $forum['ID_FORUM'] ?>">
                                        <?= $forum['NAME'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['ID_FORUM'] ?? '' ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Description</label>
                            <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>"
                                      id="content" name="description"
                                      placeholder="Saisissez votre contenu"><?= $description ?></textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                            <div class="invalid-feedback">
                                <?= $errors['description'] ?? '' ?>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-dark">Publier mon post</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Fin -- Contenu de notre page -->

<?php
# Inclusion du header
require_once './partials/footer.php';
?>
