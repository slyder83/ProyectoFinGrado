// Script de prueba para dejar el nav pegado al borde superior al hacer scroll

// Se selecciona el elemento nav
const nav = document.querySelector('nav');

// Función que se ejecuta al hacer scroll
window.addEventListener('scroll', function() {
  const scrollPosition = window.scrollY;
  const navTop = nav.offsetTop;
  
  if (scrollPosition >= navTop) {
    nav.classList.add('sticky');
  } else {
    nav.classList.remove('sticky');
  }
});