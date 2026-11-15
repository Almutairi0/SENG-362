<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "PPW";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    exit("Could not connect to the database.");
}

function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}
function load_content(PDO $conn)
{
    $rows = $conn->query('SELECT content_key, content FROM site_content')->fetchAll();
    $content = [];
    foreach ($rows as $row) {
        $content[$row['content_key']] = $row['content'];
    }
    return $content;
}

//Most of the file i got from w3school
$content = load_content($conn);
?>

