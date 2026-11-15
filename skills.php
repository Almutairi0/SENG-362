<?php
require 'db.php';

$rows = $conn->query('SELECT category, name FROM skills ORDER BY sort_order')->fetchAll();

// Group the skills by category: ['Programming Languages' => ['Go', 'Bash', ...], ...]
$groups = [];
foreach ($rows as $row) {
    $groups[$row['category']][] = $row['name'];
}

$pageTitle = 'Skills';
$currentPage = 'skills';
require 'header.php';
?>
    <section class="page">
      <h1>Skills</h1>
      <p class="page-intro"><?= e($content['skills_intro'] ?? '') ?></p>

      <div class="grid">
        <?php foreach ($groups as $category => $skills): ?>
          <div class="card">
            <h3><?= e($category) ?></h3>
            <ul class="tags">
              <?php foreach ($skills as $skill): ?>
                <li><?= e($skill) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
<?php require 'footer.php'; ?>
