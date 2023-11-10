
<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$currentUserId = $_SESSION['user']['id'];
$note = $db->query('select * from notes where id = :id', [':id' => $currentUserId])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
