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
// j'affiche la liste des message et si aucun message n'est stocker j'echo un message d'erreur
$homepage = file_get_contents('message.txt');
if ($homepage){
    echo $homepage;
} else {
    echo 'Pas encore de message';
}

?>
</body>
</html>
