<?php

/**
 * Retourne les informations de l'utilisateur
 * via son ID.
 * @return void
 */
function getUserById(int $idUser)
{
    global $dbh;
    $sql = 'SELECT * FROM user WHERE user.ID_USER = :idUser';
    $query = $dbh->prepare($sql);
    $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

/**
 * Permet l'insertion d'un utilisateur
 * dans la base de données
 * @param string $firstname
 * @param string $lastname
 * @param string $email
 * @param string $password
 * @param string $roles
 * @return false|string
 */
function insertUser(string $firstname,
                    string $lastname,
                    string $email,
                    string $password,
                    string $roles = 'ROLE_USER'): false|string
{
    global $dbh;
    $sql = 'INSERT INTO user (FIRSTNAME, LASTNAME, EMAIL, PASSWORD, ROLE) 
                VALUES (:firstname, :lastname, :email, :password, :role)';

    $query = $dbh->prepare($sql);
    $query->bindValue('firstname', $firstname);
    $query->bindValue('lastname', $lastname);
    $query->bindValue('email', $email);
    $query->bindValue('password', password_hash($password, PASSWORD_DEFAULT));
    $query->bindValue('role', $roles);

    return $query->execute() ? $dbh->lastInsertId() : false;
}