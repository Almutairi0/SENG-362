<?php
require 'db.php';

$highlights = $conn->query('SELECT title, description FROM highlights ORDER BY sort_order')->fetchAll();
$pageTitle = 'Home';
$currentPage = 'index';
require 'header.php';
?>
    <section class="hero">
      <p class="hero-tag"><?= e($content['hero_tag'] ?? '') ?></p>
      <h1><?= e($content['hero_title'] ?? '') ?></h1>
      <p class="hero-sub"><?= e($content['hero_text'] ?? '') ?></p>
      <div class="hero-buttons">
        <a href="projects.php" class="btn-primary">View my projects</a>
        <a href="contact.php" class="btn-secondary">Get in touch</a>
      </div>
    </section>

    <section class="highlights">
      <?php foreach ($highlights as $item): ?>
        <div class="card">
          <h3><?= e($item['title']) ?></h3>
          <p><?= e($item['description']) ?></p>
        </div>
      <?php endforeach; ?>
    </section>
<?php require 'footer.php'; ?>

