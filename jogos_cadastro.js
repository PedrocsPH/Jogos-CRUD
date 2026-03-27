const mainContainer = document.querySelector('.main-container');
const singnupLink = document.querySelector('.singnup-link');
const LoginLink = document.querySelector('.login-link');

singnupLink.onclick = () =>{
    mainContainer.classList.add('active');
}
LoginLink.onclick = () =>{
    mainContainer.classList.remove('active');
}