const esquerda = document.querySelector('.porta.esquerda');
const direita  = document.querySelector('.porta.direita');
const container = document.getElementById('porta');
const conteudo  = document.getElementById('conteudo');

// Animação da porta
container.addEventListener('click', () => {
  esquerda.classList.add('aberta');
  direita.classList.add('aberta');

  setTimeout(() => {
    container.style.display = 'none';
    document.body.style.overflow = 'auto';
    conteudo.style.opacity = '1';
  }, 1200);
});

// Envio RSVP
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('rsvpForm');
  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    btn.textContent = 'Enviando...';

    const data = new FormData(form);

    fetch('save_rsvp.php', {
      method: 'POST',
      body: data
    })
    .then(r => r.json())
    .then(json => {
      const msg = document.getElementById('respostaMensagem');
      if (json.success) {
        msg.style.color = 'green';
        form.reset();
        msg.textContent = json.message || 'Presença confirmada!';
        confeteAnimacao();
      } else {
        msg.style.color = 'red';
        msg.textContent = json.message || 'Erro inesperado';
      }
    })
    .catch(() => {
      document.getElementById('respostaMensagem').textContent = 'Erro de rede.';
    })
    .finally(() => {
      btn.disabled = false;
      btn.textContent = 'Confirmar presença';
    });
  });
});

// Função confete
function confeteAnimacao() {
  for (let i = 0; i < 40; i++) {
    const confete = document.createElement('div');
    confete.classList.add('confete');
    confete.style.left = Math.random() * 100 + 'vw';
    confete.style.animationDuration = (2 + Math.random() * 3) + 's';
    confete.style.setProperty('--hue', Math.floor(Math.random() * 360));
    document.body.appendChild(confete);

    setTimeout(() => confete.remove(), 5000);
  }
}
