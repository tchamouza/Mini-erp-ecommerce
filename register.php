<?php require './templates/header.php'; ?>
<?php
require './includes/db.php';
$errors=[];
$success="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage des données
    $nom = htmlspecialchars(trim($_POST['last-name']));
    $prenoms = htmlspecialchars(trim($_POST['first-name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $age = htmlspecialchars(trim($_POST['date']));
    $telephone = htmlspecialchars(trim($_POST['telephone']));
    $motdepasse = $_POST['password'];
    $confirmemotdepasse = $_POST['confirm-password'];

    // Validation des champs requis
    if (
        empty($nom) || empty($prenoms) || empty($email) ||
        empty($age) || empty($telephone) || empty($motdepasse) || empty($confirmemotdepasse)
    ) {
        $errors[] = 'Saisissez toutes les informations demandées.';
    }

    if (strlen($motdepasse) > 8 || strlen($motdepasse) < 4) {
        $errors[] = 'Le mot de passe doit contenir entre 4 et 8 caractères.';
    } elseif ($motdepasse !== $confirmemotdepasse) {
        $errors[] = 'Les mots de passe ne correspondent pas.';
    }

    // Vérification de l'email en base
    if (empty($errors)) {
        $checkEmail = $pdo->prepare("SELECT COUNT(*) FROM clients WHERE email = ?");
        $checkEmail->execute([$email]);
        if ($checkEmail->fetchColumn() > 0) {
            $errors[] = "Cet email est déjà enregistré.";
        }
    }

    // Traitement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_dir = 'uploads/' . $image_name;
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($image_ext, $allowed)) {
            $errors[] = "Le format de l'image n'est pas autorisé.";
        }

        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            $errors[] = "L'image est trop lourde (max 2 Mo).";
        }
    } else {
        $errors[] = "Erreur lors du téléchargement de l'image.";
    }

    // Enregistrement
    if (empty($errors)) {

        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        move_uploaded_file($image_tmp, $image_dir);

        $hachagemotdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

        $sql = "INSERT INTO utilisateurs (nom, prenoms, email, age, telephone, motdepasse, image)
                VALUES (:last-name, :first-name, :email, :date, :telephone, :password, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':last-name', $nom);
        $stmt->bindParam(':first-name', $prenoms);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $age);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':password', $hachagemotdepasse);
        $stmt->bindParam(':image', $image_name);

        try {
            if ($stmt->execute()) {
                $success = 'Inscription réussie.';
            }
        } catch (PDOException $e) {
            $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    <h1>Inscription</h1>
    <?php if (!empty($errors)): ?>
            <p style="color:red"><?= implode('<br>', $errors) ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p style="color:green"><?= $success ?></p>
        <?php endif; ?>
    <label for="last-name">Nom <span>*</span></label>
    <input type="text" id="last-name" name="last-name"  placeholder ="Entrez votre nom" required><br>
    <label for="first-name">Prenoms<span>*</span></label>
    <input type="text" id="first-name" name="first-name" placeholder ="Entrez votre prenoms" required><br>
    <label for="birthday">Date de naissance<span>*</span></label>
    <input type="date" id="birthday" name="birthday" required><br>
    <label for="email">Email<span>*</span></label>
    <input type="email" id="email" name="email"  placeholder ="Entrez votre email" required><br>
    <label for="telephone">Telephone<span>*</span></label>
    <input type="tel" id="telephone" name="telephone"  placeholder ="Entrez votre numero de telephone" required><br>
    <label for="image">Photo de profil<span>*</span></label>
    <input type="file" name="image" accept="image/*" id="image" required ><br>
    <label for="password">Mot de passe<span>*</span></label>
    <input type="password" id="password" name="password"  placeholder ="Entrez un mot de passe" required><br>
    <label for="confirm-password">Confirmer le mot de passe<span>*</span></label>
    <input type="password" id="confirm-password" name="confirm-password"  placeholder ="Confirmer le mot de passe" required><br>
    <p style="font-family: century; text-align:center;">Vous avez fini l'inscription ?
            <a style="text-decoration: none; color:midnightblue" href="login.php">Connectez-vous!</a>
        </p><br>
    <button type="submit">S'inscrire</button>

</form>
        
<?php require './templates/footer.php'; ?>