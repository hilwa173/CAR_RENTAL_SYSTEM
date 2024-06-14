document.addEventListener('DOMContentLoaded', () => {
  const closeBtn = document.getElementById('close-login-form');
  const loginBtn = document.querySelector('#login-btn');

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      window.location.href = 'index.php';
    });
  }

  if (loginBtn) {
    loginBtn.addEventListener('click', () => {
      document.querySelector('.login-form-container').classList.add('active');
    });
  }
});
