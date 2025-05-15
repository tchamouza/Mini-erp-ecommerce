<?php
require 'db.php';
session_start();

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $motdepasse = $_POST['password'];
    $matricule = $_POST['matricule'];

    if (empty($email) || empty($motdepasse)) {
        $errors[] = 'Veuillez remplir tous les champs.';
    } else {
        $sql = "SELECT * FROM clients WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($motdepasse, $utilisateur['password'])) {
            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: ./dashboard-admin.php');
            exit();
        } else {
            $errors[] = "Email ou mot de passe incorrect.";
        }
    }
}
?>
