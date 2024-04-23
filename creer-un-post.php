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

    # Récupération des informations $_POST
    $title = $_POST['title'] ?? null;
    $description = $_POST['description'] ?? null;
    $id_forum = $_POST['id_forum'] ?? null;
    $id_user = $_SESSION['user']['id_user'] ?? null;
    }

    # Vérification des informations
    $errors = [];

    # Vérification du titre
    if (empty($title)) {
        $errors['title'] = 'Le titre est requis.';
    } elseif (strlen($title) > 255) {
        $errors['title'] = 'Le titre ne doit pas dépasser 255 caractères.';
    }

    # Vérification de la description
    if (empty($description)) {
        $errors['description'] = 'La description est requise.';
    } elseif (strlen($description) > 5000) { // Example length limit
        $errors['description'] = 'La description ne doit pas dépasser 5000 caractères.';
    }

    # Vérification du forum
    if (empty($id_forum)) {
        $errors['id_forum'] = 'Le forum est requis.';
    }

    # Insertion dans la BDD
    if (empty($errors)) {
        try {
            # Insertion du Post dans la BDD
            $id_post = insertPost($title, $description, $id_forum, $_SESSION['user']['ID_USER']);

            # Alerte de confirmation
            addFlash('success', 'Article publié avec succès !');
            # Redirection vers la page de l'article
            redirect("post.php?id=$id_post");
        } catch (Exception $exception) {
            dd($exception->getMessage());
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
                                    class="form-control <?= isset($errors['id_forum']) ? 'is-invalid' : '' ?>"
                                    name="id_forum">

                                <option selected disabled value="0">-- Choisissez un forum --</option>
                                <?php foreach ($forums as $forum): ?>
                                    <option
                                        <?= $forum['id_forum'] == $id_forum ? 'selected' : '' ?>
                                            value="<?= $forum['id_forum'] ?>">
                                        <?= $forum['name'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $errors['id_forum'] ?? '' ?>
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
