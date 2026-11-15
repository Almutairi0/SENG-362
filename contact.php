<?php
require 'db.php';

$errors = [];
$old = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read and trim the submitted values
    foreach ($old as $field => $_) {
        $old[$field] = trim($_POST[$field] ?? '');
    }

    // Validate
    if ($old['name'] === '' || mb_strlen($old['name']) > 100) {
        $errors[] = 'Please enter your name (up to 100 characters).';
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (mb_strlen($old['subject']) > 200) {
        $errors[] = 'The subject must be 200 characters or fewer.';
    }
    if ($old['message'] === '') {
        $errors[] = 'Please write a message.';
    }

    // Save with a prepared statement (prevents SQL injection)
    if (!$errors) {
        $stmt = $conn->prepare(
            'INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$old['name'], $old['email'], $old['subject'], $old['message']]);

        // Redirect so refreshing the page doesn't send the message twice
        header('Location: contact.php?sent=1');
        exit;
    }
}

$sent = isset($_GET['sent']);

$pageTitle = 'Contact';
$currentPage = 'contact';
require 'header.php';
?>
    <section class="page narrow">
      <h1>Get in touch</h1>
      <p class="page-intro"><?= e($content['contact_intro'] ?? '') ?></p>

      <?php if ($sent): ?>
        <div class="alert success">Thanks! Your message was sent — I'll get back to you soon.</div>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="alert error">
          <?php foreach ($errors as $error): ?>
            <p><?= e($error) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="card">
        <form class="contact-form" action="contact.php" method="post">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" maxlength="100" value="<?= e($old['name']) ?>" required />

          <label for="email">Email</label>
          <input type="email" id="email" name="email" maxlength="150" value="<?= e($old['email']) ?>" required />

          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" maxlength="200" value="<?= e($old['subject']) ?>" />

          <label for="message">Message</label>
          <textarea id="message" name="message" rows="6" required><?= e($old['message']) ?></textarea>

          <button type="submit" class="btn-primary">Send message</button>
        </form>
      </div>

      <div class="card contact-links">
        <h3>Or find me here</h3>
        <ul>
          <li>GitHub: <a href="<?= e($content['github_url'] ?? '#') ?>" target="_blank" rel="noopener"><?= e(preg_replace('#^https?://(www\.)?#', '', $content['github_url'] ?? '')) ?></a></li>
          <li>Email: <a href="mailto:<?= e($content['email'] ?? '') ?>"><?= e($content['email'] ?? '') ?></a></li>
          <li>LinkedIn: <a href="<?= e($content['linkedin_url'] ?? '#') ?>" target="_blank" rel="noopener"><?= e(preg_replace('#^https?://(www\.)?#', '', $content['linkedin_url'] ?? '')) ?></a></li>
        </ul>
      </div>
    </section>
<?php require 'footer.php'; ?>
