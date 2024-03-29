<?php

//<======== create classes=======>
function createMessage(string $message, int $user_id, int $class_id, int $inviter_id): bool
{
    global $connection;
    $statement = $connection->prepare("insert into invited (message, user_id, class_id, inviter_id) values(:message, :user_id, :class_id, :inviter_id )");
    $statement->execute([
        ":message"=> $message,
        ":user_id"=> $user_id,
        ":class_id"=> $class_id,
        ":inviter_id"=> $inviter_id,
    ]);
    return $statement->rowCount() > 0;
}


// ========Get all messages============
function getMessages()
{

    global $connection;
    $statement = $connection->prepare("select i.id, i.inviter_id, u.name, u.id as user_id, c.id as class_id, c.title, i.message, u.role from users u
     inner join invited i on i.user_id = u.id
     inner join classes c on i.class_id = c.id 
     order by i.id desc
    ");

    $statement->execute();
    return $statement->fetchAll();
}
// ========Get one messages============
function getMessage($id)
{

    global $connection;
    $statement = $connection->prepare("select i.id, i.inviter_id, u.name, u.id as user_id, c.id as class_id, c.title, i.message from users u
     inner join invited i on i.user_id = u.id
     inner join classes c on i.class_id = c.id 
     where i.id = :id
    ");

    $statement->execute([":id"=>$id]);
    return $statement->fetch();
}

//<======== delete message=======>
function deleteMessage(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from invited where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

//<======== delete message=======>
function deleteUserInvited(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from invited where class_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
