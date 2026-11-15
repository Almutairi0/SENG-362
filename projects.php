<?php
require 'db.php';

$projects = $conn->query('SELECT * FROM projects ORDER BY sort_order')->fetchAll();

// Labels for the filter buttons
$filters = [
    'all'         => 'All',
    'go'          => 'Go',
    'linux'       => 'Linux',
    'open-source' => 'Open Source',
    'web'         => 'Web',
];

$pageTitle = 'Projects';
$currentPage = 'projects';
require 'header.php';
?>
    <section class="page">
      <h1>Projects</h1>
      <p class="page-intro"><?= e($content['projects_intro'] ?? '') ?></p>

      <div class="filters">
        <?php foreach ($filters as $value => $label): ?>
          <button type="button" class="filter-btn<?= $value === 'all' ? ' active' : '' ?>" data-filter="<?= e($value) ?>">
            <?= e($label) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <div class="grid">
        <?php foreach ($projects as $project): ?>
          <div class="card project" data-category="<?= e($project['category']) ?>">
            <h3><?= e($project['title']) ?></h3>
            <p><?= e($project['description']) ?></p>
            <ul class="tags">
              <?php foreach (explode(',', $project['tags']) as $tag): ?>
                <li><?= e(trim($tag)) ?></li>
              <?php endforeach; ?>
            </ul>
            <?php if (!empty($project['link_url'])): ?>
              <a href="<?= e($project['link_url']) ?>" target="_blank" rel="noopener"><?= e($project['link_text'] ?: 'View →') ?></a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
<?php require 'footer.php'; ?>
