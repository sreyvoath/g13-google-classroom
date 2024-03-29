<?php

// ==== get user account from database ======
function getUsers() : array
{
    global $connection;
    $statement = $connection->prepare("select * from users");
    $statement->execute();
    return $statement->fetchAll();
}

// =======create user accounts =====
function createUser(string $name, string $email, string $password, string $image) : bool
{
    global $connection;
    $role = "teacher";
    $statement = $connection->prepare("insert into users (name,email, password, role, image) values (:name, :email, :password, :role, :image)");
    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role,
        ':image' => $image

    ]);

    return $statement->rowCount() > 0;
}

