document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.div-faq');
  
    toggleButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const targetDiv = document.getElementById(targetId);
  
        if (targetDiv) {
          targetDiv.classList.toggle('escondido');
          targetDiv.classList.toggle('visivel');
        }
      });
    });
  });