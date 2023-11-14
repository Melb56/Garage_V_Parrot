function validateForm(event) {
  // Empêcher la soumission du formulaire par défaut
  event.preventDefault();

  // Récupérer les valeurs des champs
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;

  // Réinitialiser les messages d'erreur
  document.getElementById("nameError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("messageError").innerHTML = "";

  // Validation simple côté client
  if (name === "") {
    document.getElementById("nameError").innerHTML =
      "Veuillez saisir votre nom et prénom.";
    return;
  }

  if (email === "") {
    document.getElementById("emailError").innerHTML =
      "Veuillez saisir votre adresse e-mail.";
    return;
  }

  if (message === "") {
    document.getElementById("messageError").innerHTML =
      "Veuillez saisir votre message.";
    return;
  }

  // Si la validation réussit, vous pouvez envoyer les données au serveur ici
  alert("Formulaire soumis avec succès!");
}
