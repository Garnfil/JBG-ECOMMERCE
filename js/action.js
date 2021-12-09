// add click event for hamburger menu 
const menu = document.querySelector('.menu');
const headContainer = document.querySelector('.head-container');

menu.addEventListener('click', () => {
  headContainer.classList.toggle('active-side');
})

//show message
const message = document.querySelector('.message');
if (message.innerText.length > 0){
  message.classList.add('show-message');
}
