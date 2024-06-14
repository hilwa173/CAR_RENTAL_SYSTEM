function openham() {
  const navigation1 = document.querySelector('.navigation1');
  navigation1.style.display = 'flex';
}
const button = document.querySelector('.nav-menu-btn');
button.addEventListener('click', openham);

function closeham() {
  const navigation1 = document.querySelector('.navigation1');
  navigation1.style.display = 'none';
}
// Show the login form container when the login button is clicked
document.querySelector('#login-btn').onclick = () => {
  document.querySelector('.login-form-container', '.signup-form').classList.add('active');
  closeham();
};

document.getElementById('sign-btn').onclick = function showSign() {
  const news = document.querySelector('.signup-form');
  news.style.display = 'flex';

  const lg = document.querySelector('.login-form-container');
  lg.style.display = 'none';
};

document.getElementById('lgn-btn').onclick = function showLogin() {
  const logs = document.querySelector('.login-form-container');
  logs.style.display = 'flex';

  const hideLog = document.querySelector('.signup-form');
  hideLog.style.display = 'none';
};

document.getElementById('close-login-form').onclick = function closeLoginForm() {
  document.querySelector('#close-login-form').onclick = () => {
    document.querySelector('.login-form-container').classList.remove('active');
  };
};

document.getElementById('close-sign-form').onclick = function closeSignForm() {

  const sgn = document.querySelector('.signup-form');
  sgn.style.display = 'none';

};
