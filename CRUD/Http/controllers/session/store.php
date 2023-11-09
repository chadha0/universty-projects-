
<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

/* sqli vul */
// $form =  new LoginForm();
//
// if (!$form->validate($email, $password)) {
//     return view('session/create.view.php', [
//         'errors' => $errors
//     ]);
// }
//
// $user = $db->query('select * from users where email = :email', [
//     'email' => $email
// ])->find();


$user = $db->query("SELECT * FROM users WHERE email = '$email'")->find();
if ($user) {
    /* sqli vul */
    // if (password_verify($password, $user['password'])) {
    login([
        'id' => $user['id'] ,
        'email' => $email
    ]);

    header('location: /');
    exit();
    // }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
