<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma boutique</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <header>
        <h1>Commercia</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#" onclick="togglePopup()">Connexion</a></li>
            </ul>
        </nav>
    </header>
    <div id="popup" class="poppup">
        <p>Se connecter en tant que :</p>
        <a href="./admin/login-admin.php">Admin</a>
        <a href="login.php">Client</a>
    </div>
    <main>