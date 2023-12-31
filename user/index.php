<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les langages informatiques les plus populaires et testez vos connaissances avec notre QCM interactif.">
    <title>QCM</title>
    <script src="Content/script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="Content/style.css">
</head>
<body>
    <?php
    session_start();


    require_once 'Controllers/Controller.php';
    require_once 'Models/Model.php';
    require_once 'Utils/header.php';

    $controllers = ["themes", "question", "reponse", "niveau", "profil", "score"];
    $controller_default = "themes";

    if (!isset($_SESSION['id_utilisateur'])){
        $nom_controller = $controller_default;
    }

    if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
        $nom_controller = $_GET['controller'];
    } else {
        $nom_controller = $controller_default;
    }

    $nom_classe = "Controller_" . $nom_controller;
    $nom_fichier = "Controllers/" . $nom_classe . ".php";

    if (file_exists($nom_fichier)) {
        require_once($nom_fichier);
        $controller = new $nom_classe();
    } else {
        exit("Error 404 : not found");
    }
        require_once 'Utils/footer.php';
    ?>
</body>
</html>
