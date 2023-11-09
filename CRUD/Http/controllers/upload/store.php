<?php

// use Core\Validator;
use Core\App;
use Core\Database;
use Core\Validator;

$db = app::resolve(database::class);
$errors = [];

if(isset($_FILES)) {


    $file = $_FILES['image']['name'];
    $target_file = basename($file);


    //file type
    $imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errors['image'] = "we dont do that here" ;
    }

    if (empty($errors)) {

        $db->query('INSERT INTO upload(image , user_id) VALUES(:file , :user_id)', [
            'file' => $file,
            'user_id' => ($_SESSION['user']['id'])
        ]);

        if ($db) {
            move_uploaded_file($_FILES["image"]['tmp_name'], $target_file);

        }

    }
}
if (! empty($errors)) {
    return view("uploadForm/create.view.php", [
        'heading' => 'Upload',
        'errors' => $errors
    ]);
}

header('location: /uploads');
die();
