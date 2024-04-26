document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher le formulaire de se soumettre normalement
    var isValid = true;
  
    if (isValid) {
      var formData = new FormData(this);
      sendData(formData);
    } else {
      // Afficher les messages d'erreur pendant 3 secondes
      setTimeout(function() {
        nameError.textContent = '';
        prenomError.textContent = '';
        emailError.textContent = '';
      }, 3000);
    }
  });
  
  document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher le formulaire de se soumettre normalement
    
    // Récupérer les données du formulaire
    var formData = new FormData(this);
    
    // Envoyer les données via AJAX
    sendData(formData);
  });
  
  function sendData(formData) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          startProgress();
          document.getElementById('myForm').reset(); // Réinitialiser le formulaire après l'insertion réussie
        } else {
          console.error('Erreur lors de la requête :', xhr.status);
          // Afficher un message d'erreur à l'utilisateur
        }
      }
    };
    
    xhr.open('POST', 'ajouter_classe_traitement.php', true);
    xhr.send(formData);
  }
  
const popupContainer = document.querySelector('.popup-container');
const closeBtn = document.querySelector('.close-btn');

closeBtn.onclick = () => {
    popupContainer.classList.remove('active');
}

// Ajoutez ceci pour cacher le pop-up lors du clic sur le bouton "OK"
closeBtn.addEventListener('click', () => {
    popupContainer.classList.remove('active');
});

  // JavaScript pour contrôler la barre de progression
  let progressBar = document.getElementById("progressBar");
  let progressContainer = document.getElementById("progressContainer");
  let overlay = document.getElementById("overlay");

  function startProgress() {
    overlay.style.display = "flex"; // Afficher l'arrière-plan
    let width = 1;
    let interval = setInterval(function() {
      if (width >= 100) {
        clearInterval(interval);
        hideProgress();
        popupContainer.classList.add('active');
      } else {
        width++;
        progressBar.style.width = width + "%";
        progressBar.innerHTML = width + "%";
      }
    }, 10);
  }

  function hideProgress() {
    overlay.style.display = "none"; // Cacher l'arrière-plan
  }