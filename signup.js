document.addEventListener('DOMContentLoaded', () => {
  const closeSign = document.getElementById('close-sign-form');

  if (closeSign) {
    closeSign.addEventListener('click', () => {
      window.location.href = 'indexx.php';
    });
  }
});
