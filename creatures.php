<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
$isConnected = isset($_SESSION["utilisateur_id"]);

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["commentaire"])) {
    $contenu = $_POST["commentaire"];
    $id_parent = !empty($_POST["id_parent"]) ? intval($_POST["id_parent"]) : null;

    $stmt = $pdo->prepare("INSERT INTO commentaires (id_utilisateur, contenu, id_parent) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION["utilisateur_id"], $contenu, $id_parent]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Récupération des commentaires
$sql = "SELECT commentaires.*, utilisateurs.pseudo FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
        ORDER BY commentaires.id_commentaire ASC";
$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Block-Note wiki</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="fixed-menu">
    <button class="connexion-btn" href="connexion.php">Connexion</button>
    <button class="inscription-btn" href="inscription.php">Inscription</button>
    <label class="switch">
        <input type="checkbox" id="nightModeCheckbox">
        <span></span>
    </label>
  </div>
  <header>
     <div class="logo"><img src="images/logo.png" alt="Block-Note Logo" style="height: 80px;" id="logo" /></div>
     <nav>
            <a href="#populaires">Populaires</a>
            <a href="#dernieres-maj">Dernières MàJ</a>
            <a href="#block">Block</a>
            <a href="#mob">Mob</a>
            <a href="#tutoriels">Tutoriels</a>
            <a href="#mods-populaires">Mods Populaires</a>
            <a href="#modpacks">Modpacks</a>
     </nav>
     <style>

    .mob {
       background-color: rgba(255, 255, 255, 0.274);
        border-radius: 16px;
       padding: 16px;
       margin: 20px;
       box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        text-align: justify;
        transition: background 0.3s;
       flex: 1;
    }

    
    .mob-img {
      display: block;
      margin: 0 auto 12px auto;
      border-radius: 8px;
      max-width: 300px;
      height: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* ombre image */
    }   

    
  .item-icon {
      width: 24px;
      height: 24px;
      vertical-align: middle;
      margin-right: 4px;
    }
    .cœur {
      width: 24px;
      height: 24px;
    }
    </style>
  </header>

  <main>
    <section class="intro">
      <h1>Les Créatures</h1>
      <p>Dans Minecraft, t’es jamais vraiment seul. Que tu sois en train de planter des patates, de miner à -59 ou de te balader tranquille en forêt, y’a toujours une petite bête quelque part. Certaines sont cool, d’autres un peu chiantes, et y’en a carrément qui veulent juste te faire passer un sale quart d’heure. Allez, on fait le tour ensemble des créatures passives, neutres et hostiles du jeu !</p>
    </section>

<button class="accordion-btn">🐄Créatures passives</button>
    <div class="category-panel">
      <div class="category">

        <p>Ces mobs-là sont tranquilles. Ils te veulent aucun mal, même si tu les tapes. Tu peux les approcher sans souci.</p>

      <article class="mob">
        <h3>Vache</h3>
        <img src="images/cow.png" alt="Vache" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Se promène tranquillement, inoffensive.</li>
          <li><strong>Butin :</strong>
            <img src="images/beef.png" alt="beef" class="item-icon"> Steak,
            <img src="images/leather.png" alt="leather" class="item-icon"> Cuir,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x10</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Poulet</h3>
        <img src="images/chicken_mob.png" alt="Poulet" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Picore l’herbe et flotte doucement quand il tombe.</li>
          <li><strong>Butin :</strong>
            <img src="images/chicken.png" alt="chicken" class="item-icon"> Poulet,
            <img src="images/feather.png" alt="feather" class="item-icon"> Plume,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x2</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Villageois</h3>
        <img src="images/villager.png" alt="Villageois" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Vit dans les villages, propose des échanges.</li>
          <li><strong>Butin :</strong> Aucun sauf en cas de zombification et transformation.</li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x10</span>
          </li>
        </ul>
      </article>
     </section>
     </div>
    </div>


    <button class="accordion-btn">🐺Créatures neutres</button>
    <div class="category-panel">
      <div class="category">

       <p>Les neutres, c’est des chill guys mais pas trop : tant que tu les cherches pas, ils te laissent tranquille. Mais si tu les tapes ou les provoques… ils te sautent dessus sans pitié.</p>

        <article class="mob">
        <h3>Golem de Fer</h3>
        <img src="images/iron_golem.png" alt="Golem de Fer" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Défend les villageois, attaque les créatures hostiles.</li>
          <li><strong>Butin :</strong>
            <img src="images/poppy.png" alt="poppy" class="item-icon"> Fleur,
            <img src="images/iron_ingot.png" alt="iron_ingot" class="item-icon"> lingot de fer,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x50</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Enderman</h3>
        <img src="images/enderman.png" alt="Enderman" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Neutre sauf si on le regarde dans les yeux. Se téléporte.</li>
          <li><strong>Butin :</strong>
            <img src="images/ender_pearl.png" alt="ender_pearl" class="item-icon"> Perle du Néant,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x20</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Loup</h3>
        <img src="images/wolf.png" alt="Loup" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Neutre, devient agressif si attaqué. Peut être apprivoisé avec des os.</li>
          <li><strong>Butin :</strong>
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x8</span>
          </li>
        </ul>
      </article>
      </section>
      </div>
    </div>

 
    <button class="accordion-btn">💀 Créatures hostiles</button>
    <div class="category-panel">
      <div class="category">

        <p>Eux, c’est simple : ils veulent ta peau. Dès qu’ils te voient, ils foncent. Ils spawnent surtout la nuit ou dans les endroits sombres, donc prépare ton épée</p>

        <article class="mob">
        <h3>Zombie</h3>
        <img src="images/zombie.png" alt="Zombie" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Attaque les joueurs et villageois.</li>
          <li><strong>Butin :</strong>
            <img src="images/rotten_flesh.png" alt="rotten_flesh" class="item-icon"> Chair putréfiée,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x10</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Squelette</h3>
        <img src="images/skeleton.png" alt="Squelette" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Tire des flèches de loin.</li>
          <li><strong>Butin :</strong>
            <img src="images/bone.png" alt="bone" class="item-icon"> Os,
            <img src="images/arrow.png" alt="arrow" class="item-icon"> Flèche,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x10</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Creeper</h3>
        <img src="images/creeper.png" alt="Creeper" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Se faufile silencieusement et explose à proximité.</li>
          <li><strong>Butin :</strong>
            <img src="images/gunpowder.png" alt="gunpowder" class="item-icon"> Poudre à canon,
            <img src="images/xp.png" alt="XP" class="item-icon"> XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x10</span>
          </li>
        </ul>
      </article>
      </section>
      </div>
    </div>

    
    <button class="accordion-btn">👑Boss</button>
    <div class="category-panel">
      <div class="category">

        <p> Voici les boss du jeu, les créatures les plus dangereuses,  seuls les plus courageux osent les affronter. </p>

        <article class="mob">
        <h3>Ender Dragon</h3>
        <p> C'est le boss de fin du jeu, il se trouve directement dans la dimension de l'End</p>
        <img src="images/ender_dragon.png" alt="Ender Dragon" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Boss final de l'End. Vol agressivement et se régénère avec ses cristaux.</li>
          <li><strong>Conseils :</strong> Munie toi d'un arc pour détruire les cristaux en haut des tours.</li>
          <li><strong>Butin :</strong>
            <img src="images/dragon_egg.png" alt="dragon_egg" class="item-icon"> Œuf de Dragon,
            <img src="images/xp.png" alt="XP" class="item-icon"> Énorme quantité d’XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x100</span>
          </li>
        </ul>
      </article>
        <article class="mob">
        <h3>Wither Boss</h3>
        <p> Ce boss caché est bien plus puissant que l'Ender Dragon</p>
        <img src="images/wither.png" alt="Wither" class="mob-img">
        <img src="images/wither_0.png" alt="Wither_0" class="mob-img">
        <ul>
          <li><strong>Comportement :</strong> Flotte, attaque tout ce qui bouge, crée des explosions et donne un effet de décomposition.</li>
          <li><strong>Appariition :</strong> Forme un T avec du sable des âmes, et 3 tête de wither squelette au-dessus.</li>
          <li><strong>Conseils :</strong> Réfugie toi sous terre pour le faire apparaître.</li>
          <li><strong>Butin :</strong>
            <img src="images/nether_star.png" alt="nether_star" class="item-icon"> Étoile du Néant,
            <img src="images/xp.png" alt="XP" class="item-icon"> Beaucoup d’XP
          </li>
          <li><strong>Points de vie :</strong>
            <span class="pv"><img src="images/coeur.png" alt="cœur"> x150</span>
          </li>
        </ul>
      </article>
      </section>
      </div>
    </div>
<section class="comment-section" id="commentaires">
  <h2>Commentaires</h2>
<ul>
<?php foreach ($commentaires as $commentaire): ?>
    <?php if ($commentaire["id_parent"] === null): ?>
        <li>
            <strong>Commentaire de <?= $commentaire["pseudo"] ?></strong><br><?= $commentaire["contenu"] ?>
            <br>
            <!-- Affichage des réponses -->
            <?php foreach ($commentaires as $reponse): ?>
                <?php if ($reponse["id_parent"] == $commentaire["id_commentaire"]): ?>
                    <div style="margin-left:30px;">
                        Réponse de <?= $reponse["pseudo"] ?><br><?= $reponse["contenu"] ?>
			<br>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Lien Répondre -->
            <a href="?repondre=<?= $commentaire['id_commentaire'] ?>#commentaires">Répondre</a>

            <!-- Formulaire réponse -->
            <?php if (isset($_GET["repondre"]) && $_GET["repondre"] == $commentaire['id_commentaire']): ?>
                <?php if ($isConnected): ?>
                    <form method="post">
                        <input type="hidden" name="id_parent" value="<?= $commentaire['id_commentaire'] ?>">
                        <textarea name="commentaire" required></textarea><br>
                        <button type="submit">Publier la réponse</button>
                    </form>
                <?php else: ?>
                    <p style="color:red;">Vous ne pouvez pas répondre au commentaire, connectez-vous ou inscrivez-vous.</p>
                <?php endif; ?>
            <?php endif; ?>

        </li>
        <br>
    <?php endif; ?>
<?php endforeach; ?>
</ul>


<!-- Ajouter un commentaire principal -->
<a href="?ajouter=1#commentaires">Ajouter un commentaire</a>

<?php if (isset($_GET["ajouter"])): ?>
    <?php if ($isConnected): ?>
        <form method="post">
            <input type="hidden" name="id_parent" value="">
            <textarea name="commentaire" required></textarea><br>
            <button type="submit">Publier le commentaire</button>
        </form>
    <?php else: ?>
        <p style="color:red;">Vous ne pouvez pas ajouter de commentaire, connectez-vous ou inscrivez-vous.</p>
    <?php endif; ?>
<?php endif; ?>

</section>
  </main>

    <footer>
      <a href="#politique-confidentialite">Politique de confidentialité</a> |
      <a href="#mentions-legales">Mentions légales</a>
  </footer>
  <script src="script.js"></script>
  
</body>
</html>