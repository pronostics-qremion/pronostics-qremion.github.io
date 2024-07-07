const auth = firebase.auth();

document.getElementById('login-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    auth.signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // Connexion réussie
            alert('Connexion réussie !');
            // Rediriger ou afficher le contenu protégé
        })
        .catch((error) => {
            alert(error.message);
        });
});
