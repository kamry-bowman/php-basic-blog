<?php
require_once 'lib/common.php';

$pdo = getPDO();
$stmt = $pdo->prepare(
  'SELECT
    title, created_at, body
  FROM
    post
  WHERE id = :id'
);
if ($stmt == false)
{
  throw new Exception('There was a problem preparing this query');
}
$result = $stmt->execute(
  array('id' => 1)
);
if ($result === false) {
  throw new Exception('There was a problem running this query');
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      A blog application |
      <?php echo htmlEscape($row['title']) ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  </head>
  <body>
  <?php require 'templates/title.php' ?>
    <h2>
      <?php echo htmlEscape($row['title']) ?>
    </h2>
    <div>
      <?php echo $row['created_at'] ?>
    </div>
    <p>
        <?php echo htmlEscape($row['body']) ?>
    </p>
</html>