<?php include './templates/header.php'; ?>
<section class="section1">
    <h2>Bienvenue chez Commercia</h2>
    <p>Cette boutique est réputée pour la vente des materiels informatique de bonne qualité et a bas prix</p>
    <a href="login.php" class="btn" id="connecte">Connectez-vous</a>
</section>
<section class="section2">
    <h2>Voici quelques Articles de notre boutique</h2>
    <div class="section2-box">
        <div class="box">
            <img src="./images/OIF (1).jpg" alt="">
            <p>Camera</p>
        </div>
        <div class="box">
            <img src="./images/OIF.jpg" alt="">
            <p>MacOS</p>
        </div>
        <div class="box">
            <img src="./images/OIP (2).jpg" alt="">
            <p>Unité centrale</p>
        </div>
        <div class="box">
            <img src="./images/OIP.jpg" alt="">
            <p>Laptop MacOS</p>
        </div>
        <div class="box">
            <img src="./images/télécharger.jpg" alt="">
            <p>Switch</p>
        </div>
        <div class="box">
            <img src="./images/th.jpg" alt="">
            <p>Testeur de cable</p>
        </div>
    </div>
    <p> <a href="#connecte" class="btn1"><strong>Connectez-vous</strong></a> pour voir plus d'articles et leurs prix.
    </p>
</section>
<section class="section3">
    <h2>Aperçu</h2>
    <div class="section3-box">
        <div class="box">
            <h3>Description</h3>
            <p></p>
        </div>
        <div class="box">
            <img src="./images/section3.jpg" alt="">
        </div>
    </div>
</section>
<section class="section4">
   <h2>Contactez-nous</h2>
    <form action="" method="post" class="section4-box">
      <label for="name">Nom :</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message :</label>
      <textarea id="message" name="message" rows="7" required></textarea>

      <button type="submit">Envoyer</button>
    </form>

</section>

<?php include './templates/footer.php'; ?>