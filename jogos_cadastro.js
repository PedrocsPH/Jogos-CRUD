(function () {
  const formTitle = document.getElementById('form-title');
  const toggleLink = document.getElementById('toggle-link');
  const submitBtn = document.getElementById('submit-btn');
  const messageDiv = document.getElementById('message');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  let isLogin = false;

  function validateEmail(email) {
    // Simples regex para email
    return /\S+@\S+\.\S+/.test(email);
  }

  function clearMessage() {
    messageDiv.textContent = '';
  }

  function showMessage(msg, isError = false) {
    messageDiv.textContent = msg;
    messageDiv.style.color = isError ? '#ff5555' : '#ffd700';
  }

  toggleLink.addEventListener('click', () => {
    isLogin = !isLogin;
    clearMessage();
    if (isLogin) {
      formTitle.textContent = 'Login';
      submitBtn.textContent = 'Login';
      toggleLink.textContent = 'Não é membro? Cadastre-se';
      toggleLink.setAttribute('aria-pressed', 'true');
    } else {
      formTitle.textContent = 'Sign Up';
      submitBtn.textContent = 'Sign Up';
      toggleLink.textContent = 'Já é membro? Faça login';
      toggleLink.setAttribute('aria-pressed', 'false');
    }
  });

  submitBtn.addEventListener('click', () => {
    clearMessage();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    if (!validateEmail(email)) {
      showMessage('Por favor, insira um email válido.', true);
      return;
    }
    if (password.length < 6) {
      showMessage('A senha deve ter pelo menos 6 caracteres.', true);
      return;
    }

    if (isLogin) {
      // Simula login
      showMessage(`Login realizado com sucesso para ${email}!`);
    } else {
      // Simula cadastro
      showMessage(`Cadastro realizado com sucesso para ${email}!`);
    }
  });

  // Simulação de cliques em redes sociais só mostra mensagem
  const socialButtons = document.querySelectorAll('.social-login img');
  socialButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      showMessage(`Login com ${btn.alt.replace('Login with ', '')} não implementado.`);
    });
  });
})();