<?php
require 'db.php';

$pageTitle = 'About me';
$currentPage = 'about';
require 'header.php';
?>
    <div class="About-Par">
      <p><?= e($content['about_text'] ?? '') ?></p>
      <p class="about-link">
        <a href="<?= e($content['github_url'] ?? '#') ?>" target="_blank" rel="noopener">Visit my GitHub →</a>
      </p>
    </div>
<?php require 'footer.php'; ?>
