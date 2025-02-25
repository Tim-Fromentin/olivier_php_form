<?php
//demarrage de la session
session_start();

// je verifie si le formulaire est soumis via la methode post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//    on stock les valeur du form en verifiasnt si il ne sont pas vide ou remplis seulement d'espace
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $message_user = isset($_POST['message_user']) ? trim($_POST['message_user']) : "";
//SI les champs ne sont pas vides =>
if ($name !== '' || $email !== '' || $message_user !== ''){
//    stockage du message de reussite
    $_SESSION['message'] = "Message bien envoyer $name";
//    je stock la date de l'envoie
    $dateMessage = date("Y-m-d H:i:s");
//    je cree un fichier message.txt puis stock le message, la date, le nom et les stock a la suite
    echo file_put_contents("message.txt","Message : $message_user DATE : $dateMessage by $name, <br /> \n", FILE_APPEND);
} else {
//    je stock le message d'erreur
    $_SESSION['message'] = "Remplisser les champs";
}
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
<!--j'affiche le message -->
<?php
if (isset($_SESSION['message'])){
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
}
?>
<!--je creer un form avec des entry avec required pour une 3 eme securite-->
    <form action="form.php" method="post">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required />

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />

        <label for="message_user">message_user</label>
        <textarea name="message_user" id="message_user" required ></textarea>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
