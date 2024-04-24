<?php

/**
 * Permet de récupérer les posts du FORUM
 * via l'ID du FORUM.
 * @param int $id
 * @return array|false
 */
function getPostsByForumId(int $id) {
    global $dbh; // Assurez-vous que $dbh est votre objet PDO connecté à la base de données

    $query = $dbh->prepare("SELECT * FROM post WHERE id_forum = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
/**
 * Permet de récupérer un POST
 * via son ID_POST
 * @param int $id
 * @return mixed
 */
function getPostById(int $id)
{
    global $dbh;

    # TODO Ecrire la requete SQL
    $sql = 'SELECT * FROM post WHERE id_post = :id';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

/**
 * Permet de récupérer les messages
 * d'un POST via son ID_POST
 * @param int $id
 * @return array|false
 */
function getMessagesByPostId(int $id)
{
    global $dbh;

    # TODO Ecrire la requete SQL
    $sql = 'SELECT * FROM message WHERE id_post = :id';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

/**
 * Permet d'insérer un message
 * @param string $content Le contenu du message
 * @param int $userId L'ID de l'utilisateur connecté
 * @param int $postId L'ID du post sur lequel le message doit être laissé
 * @return false|string
 */
function insertMessage(string $content, int $userId, int $postId): false|string {
    global $dbh;

    $sql = 'INSERT INTO message (content, id_user, id_post, createdat) VALUES (:content, :userId, :postId, :createdAt)';

    $query = $dbh->prepare($sql);
    $query->bindValue(':content', $content, PDO::PARAM_STR);
    $query->bindValue(':userId', $userId, PDO::PARAM_INT);
    $query->bindValue(':postId', $postId, PDO::PARAM_INT);
    $query->bindValue(':createdAt', (new DateTime())->format('Y-m-d H:i:s'), PDO::PARAM_STR);

    return $query->execute() ? $dbh->lastInsertId() : false;
}

/**
 * Permet l'insertion d'un POST
 * dans la base de donnée.
 * @param string $title
 * @param string $description
 * @param string $id_forum
 * @param string $id_user
 * @return false|string
 */
function insertPost(
    string $title,
    string $description,
    string $id_forum,
    string $id_user
): false|string {

    global $dbh;
    
    $sql = 'INSERT INTO post (title, description, id_forum, id_user, createdat, updatedat) VALUES (:title, :description, :id_forum, :id_user, :created_at, :updated_at)';

    $query = $dbh->prepare($sql);
    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':id_forum', $id_forum, PDO::PARAM_INT);
    $query->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $query->bindValue(':created_at', (new DateTime())->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    $query->bindValue(':updated_at', (new DateTime())->format('Y-m-d H:i:s'), PDO::PARAM_STR);

    return $query->execute() ? $dbh->lastInsertId() : false;
}
