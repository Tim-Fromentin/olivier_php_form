<?php
//demarrage de la session
session_start();

// je verifie si le formulaire est soumis via la methode post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $message_user = isset($_POST['message_user']) ? trim($_POST['message_user']) : "";
}

if ($name !== '' || $email !== '' || $message_user !== ''){
    $_SESSION['message'] = "Message bien envoyer $name";
    $dateMessage = date("Y-m-d h:i:sa");
    echo file_put_contents("message.txt","Message : $message_user DATE : $dateMessage by $name, <br /> \n", FILE_APPEND);
} else {
    $_SESSION['message'] = "Remplisser les champs";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_SESSION['message'])){
    echo htmlspecialchars($_SESSION['message']);
}
?>
    <form action="form.php" method="post">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" />

        <label for="message_user">message_user</label>
        <textarea name="message_user" id="message_user"></textarea>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
