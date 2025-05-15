<?php include '../templates/header-login-admin.php'; ?>
<form action="../includes/auth-admin.php" method="POST" autocomplete="off">
    <h1 style="color: midnightblue;">Connexion</h1>
    <label for="email">Matricule<span>*</span></label>
    <input type="email" id="Matricule" name="matricule" placeholder="Entrez votre matricule" required>
    <label for="email">Email<span>*</span></label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
    <label for="motdepasse">Mot de passe<span>*</span></label>
    <input type="password" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
    <br><br>
    <p style="font-family: century; text-align:center;">
        Pas de compte ?
        <a style="text-decoration: none; color:midnightblue" href="register.php">Inscrivez-vous!</a>
    </p><br>

    <button type="submit">Connexion</button>
</form>
<br><br><br><br><br><br>
<?php include '../templates/footer.php'; ?>