<?php // index.php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <title>Entrada Mágica 3D</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>

<div class="porta-container" id="porta">
  <div class="porta esquerda"></div>
  <div class="porta direita"></div>
</div>

<div class="conteudo-site" id="conteudo">
  <h1>Batizado da Helena 🌹</h1>
  <p><img src="images/foto-helena.jpg" alt="Helena" class="photo"></p>

  <h2>Você é nosso convidado especial!</h2>

  <p class="details">🗓 Data: 22/03/2026</p>
  <p class="details">⛪ Local: Paróquia São Luís Gonzaga, Rua Cônego José Leão Hartman, 82 - Centro, Canoas</p>
  <p class="details">🕥 Horário: 10:30</p>

  <p>Após o batizado, sinta-se convidado a nos acompanhar para um almoço especial.</p>

  <h2>Confirme sua presença</h2>
  <form id="rsvpForm">
      <input type="text" name="nome" placeholder="Seu nome completo" required>
      <select name="presenca" required>
          <option value="">Vai comparecer?</option>
          <option value="Sim">Sim</option>
          <option value="Não">Não</option>
      </select>
      <button type="submit">Confirmar presença</button>
  </form>

  <p id="respostaMensagem"></p>
</div>

<footer>
  💖 Feito com amor para a Helena
</footer>

</body>
</html>
