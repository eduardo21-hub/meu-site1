<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
require_once 'db.php';

$res = $mysqli->query("SELECT * FROM rsvps ORDER BY created_at DESC");
$tot = $mysqli->query("SELECT 
    SUM(presenca='Sim') as sim, 
    SUM(presenca='Não') as nao, 
    COUNT(*) as total 
    FROM rsvps")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Painel RSVPs</title></head>
<body>
  <h1>Confirmações</h1>
  <p>Total: <?= $tot['total'] ?> | Sim: <?= $tot['sim'] ?> | Não: <?= $tot['nao'] ?></p>
  <p><a href="export.php">Exportar CSV</a> | <a href="logout.php">Sair</a></p>
  <table border="1" cellpadding="6">
    <tr><th>ID</th><th>Nome</th><th>Presença</th><th>Data</th><th>IP</th><th>Ação</th></tr>
    <?php while($row = $res->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nome']) ?></td>
        <td><?= $row['presenca'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td><?= $row['ip'] ?></td>
        <td><a href="delete_rsvp.php?id=<?= $row['id'] ?>" onclick="return confirm('Apagar?')">Excluir</a></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
