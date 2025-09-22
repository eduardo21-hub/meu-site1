<?php
session_start();
if (!isset($_SESSION['admin'])) die('Acesso negado');
require_once 'db.php';

$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    $stmt = $mysqli->prepare("DELETE FROM rsvps WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
header("Location: admin.php");
