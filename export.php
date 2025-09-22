<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
require_once 'db.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="rsvps.csv"');

$out = fopen('php://output', 'w');
fputcsv($out, ['id','nome','presenca','created_at','ip']);
$res = $mysqli->query("SELECT id,nome,presenca,created_at,ip FROM rsvps ORDER BY created_at DESC");
while ($row = $res->fetch_assoc()) {
    fputcsv($out, $row);
}
fclose($out);
