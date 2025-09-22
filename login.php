<?php
session_start();
require_once 'config.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['pass'] ?? '';
    if ($pass === $ADMIN_PASS) {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Senha incorreta';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Login Admin</title></head>
<body>
  <h2>Login - Painel</h2>
  <?php if ($error): ?><p style="color:red;"><?= $error ?></p><?php endif; ?>
  <form method="post">
    <input type="password" name="pass" placeholder="Senha" required>
    <button type="submit">Entrar</button>
  </form>
</body>
</html>
