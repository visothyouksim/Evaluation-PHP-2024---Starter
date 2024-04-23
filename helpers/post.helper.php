<?php

/**
 * Permet de récupérer les posts du FORUM
 * via l'ID du FORUM.
 * @param int $id
 * @return array|false
 */
function getPostsByForumId(int $id)
{

    global $dbh;

    # TODO Ecrire la requete SQL
    $sql = '';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
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
    $sql = '';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
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
    $sql = '';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll();
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
function insertPost(string $title,
                    string $description,
                    string $id_forum,
                    string $id_user): false|string
{
    global $dbh;

    # TODO Ecrire la requete SQL
    $sql = '';

    # TODO Complétez la requete
    $query = $dbh->prepare($sql);
    $query->bindValue('title');
    $query->bindValue('description');
    $query->bindValue('id_forum');
    $query->bindValue('id_user');
    $query->bindValue('created_at', (new DateTime())->format('Y-m-d H:i:s'));
    $query->bindValue('updated_at', (new DateTime())->format('Y-m-d H:i:s'));

    return $query->execute() ? $dbh->lastInsertId() : false;
}