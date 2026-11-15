<?php
// Expects $pageTitle and $currentPage to be set by the page that includes this file.
$navItems = [
    'index'    => 'Home',
    'skills'   => 'Skills',
    'projects' => 'Projects',
    'about'    => 'About Me',
];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= e($pageTitle) ?> - Almutairi0</title>
    <script>
      // Apply the saved theme before the page draws, so it doesn't flash.
      (function () {
        var theme = null;
        try { theme = localStorage.getItem("theme"); } catch (err) {}
        if (!theme) {
          theme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", theme);
      })();
    </script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="header">
      <a href="index.php" class="logo">Abdullah Almutairi</a>
      <ul class="nav-links">
        <?php foreach ($navItems as $file => $label): ?>
          <li>
            <a href="<?= $file ?>.php"<?= $currentPage === $file ? ' class="active"' : '' ?>><?= $label ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="header-actions">
        <button id="theme-toggle" class="theme-toggle" type="button" aria-label="Toggle dark mode">
          <span class="icon-moon">☾</span><span class="icon-sun">☀</span>
        </button>
        <a href="contact.php" class="btn-contact">Contact</a>
      </div>
    </div>
