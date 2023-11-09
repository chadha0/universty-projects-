
<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$im = $db->query("select * from upload where user_id = :id ", [':id' => $_SESSION['user']['id']  ])->get();


view("uploadForm/show.view.php", [
      'heading' => 'Upload',
      'images' => $im,
]);
