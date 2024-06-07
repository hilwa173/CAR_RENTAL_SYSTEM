function openham() {
    const navigation1 = document.querySelector('.navigation1');
    navigation1.style.display = 'flex';
                }
 function closeham() {
   const navigation1 = document.querySelector('.navigation1');
 navigation1.style.display = 'none';
                }
        // Show the login form container when the login button is clicked
document.querySelector('#login-btn').onclick = () => {
    document.querySelector('.login-form-container','.signup-form').classList.add('active');
    
}

function showSign(){
const news = document.querySelector('.signup-form');
news.style.display = 'flex';

const lg = document.querySelector('.login-form-container');
lg.style.display = 'none';
}

function showLogin(){
const logs = document.querySelector('.login-form-container');
logs.style.display = 'flex';

const hideLog = document.querySelector('.signup-form');
hideLog.style.display = 'none';
}


function closeLoginForm() {
    document.querySelector('#close-login-form').onclick = () => {
        document.querySelector('.login-form-container').classList.remove('active');
    }
      }    
  
    function closeSignForm() {
       const sgn= document.querySelector('.signup-form');
       sgn.style.display='none';
        }

        function hide(){
            const trys=document.querySelector('logintry');
            trys.style.display='none';
        }