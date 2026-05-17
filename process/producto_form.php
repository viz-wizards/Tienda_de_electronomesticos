<?php

$id = (int) ($_GET['id'] ?? 0);
$url = '../admin.php?section=productos';

if ($id > 0) {
    $url .= '&edit=' . $id;
}

header('Location: ' . $url);
exit;
