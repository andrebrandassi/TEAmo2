const fix = document.querySelector('.fix');

// Adicionar classe fixed ao header ao rolar a página
window.addEventListener('scroll', function () {
  if (window.scrollY > 0) {
    fix.classList.add('fixed');
  } else {
    fix.classList.remove('fixed');
  }
});


document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const navList = document.querySelector('.nav-list');
  const btnMenu = document.querySelector(".btn-menu")
  
 
  menuToggle.addEventListener('click', function () {
    navList.classList.toggle('show')
  });

  // Fechar o menu se clicar em um item de navegação
  navList.addEventListener('click', function () {
    navList.classList.remove('show');
    btnMenu.classList.remove('ativar')
  });

  btnMenu.addEventListener('click', () =>{
    btnMenu.classList.toggle('ativar')
  })

});