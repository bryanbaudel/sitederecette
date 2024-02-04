document.addEventListener('DOMContentLoaded', () => {
  const champsAValider = document.querySelectorAll('.validation');

  champsAValider.forEach(champ => {
      champ.addEventListener('change', (e) => {
          console.log('changement de valeur');
          validation(e.target);
      });
  });
});

let messagesErreurs = [];

const validation = (e) => {
  messagesErreurs = [];

  if (e.dataset.required === 'true') {
      if (e.value.length === 0) {
          e.classList.remove('is-valid');
          e.classList.add('is-invalid');
          messagesErreurs.push('Ce champ est obligatoire.');
      }
  }

  switch (e.dataset.type) {
      case 'text':
          validationText(e);
          break;
      case 'email':
          validationEmail(e);
          break;
      case 'adresse':
          validationAdresse(e);
          break;
      case 'codepostal':
          validationCd(e);
          break;
      case 'phoneNumber':
          validationPhone(e);
          break;
      case 'cartNumber':
          validationCart(e);
          break;
      case 'codeSecu':
          validationCode(e);
          break;
      default:
          break;
  }

  e.parentNode.querySelector('.invalid-feedback').innerHTML = messagesErreurs.join('<br>');
};

const validationText = (e) => {
  if (e.value.length < e.dataset.min || e.value.length > e.dataset.max) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push(`La longueur doit être entre ${e.dataset.min} et ${e.dataset.max} caractères.`);
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationEmail = (e) => {
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  
  if (e.value.length < e.dataset.min || !emailRegex.test(e.value)) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push('Veuillez entrer une adresse email valide.');
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationAdresse = (e) => {
  if (e.value.length < e.dataset.min || e.value.length > e.dataset.max) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push(`La longueur doit être entre ${e.dataset.min} et ${e.dataset.max} caractères.`);
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationCd = (e) => {
  const codePostal = e.value.replace(/\D/g, '');
  
  if (codePostal.length !== 5) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push('Veuillez entrer 5 chiffres.');
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationPhone = (e) => {
  const phoneNumber = e.value.replace(/\D/g, '');
  
  if (phoneNumber.length !== 6) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push('Veuillez entrer 6 chiffres.');
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationCart = (e) => {
  const cartNumber = e.value.replace(/\D/g, '');
  
  if (cartNumber.length !== 16) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push('Veuillez entrer 16 chiffres.');
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};

const validationCode = (e) => {
  const code = e.value.replace(/\D/g, '');
  
  if (code.length !== 3) {
      e.classList.remove('is-valid');
      e.classList.add('is-invalid');
      messagesErreurs.push('Veuillez entrer 3 chiffres.');
  } else {
      e.classList.remove('is-invalid');
      e.classList.add('is-valid');
  }
};
