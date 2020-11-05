
function get_data(str) {

    var xmlhttps = new XMLHttpRequest();
    xmlhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // petite manipulation sur la réponse pour supprimer les balises qui entourent notre message
            $data = this.responseText.split('<body>').pop().split('</body>')[0];
            const resultat = JSON.parse($data);
            // appliquer la méthode reverse pour afficher les messages dans l'ordre: plus récent en dernier
            const html = resultat.reverse().map(function (message) {
                return ` 
                        <div class="chat_box">
                        <span class ="date">${message.created_at.substring(11, 16)}</span>
                        <span class ="author">${message.author}</span>
                        :  <span class ="contenu">${message.chat}</span>
                        </div> 
                        `
            }).join('');
            document.getElementById("chat_box").innerHTML = html;
        }
    };
    xmlhttps.open("GET", "get_data.php");
    xmlhttps.send();
}

// notre fonction qui va envoyer les messages via la méthode post
function fill_data(str) {

    event.preventDefault();
    var xmlhttp = new XMLHttpRequest();
    auteur = document.getElementById("author").value;
    message = document.getElementById("msg").value;
    contenu = message;
    xmlhttp.open("POST", "send_data.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onload = function () {
        document.getElementById("msg").value = '';
        document.getElementById("msg").focus();
        get_data();
    }

    xmlhttp.send("author=" + auteur + '&message=' + message);
}

// chargement du chat en appelant la fonction get_data() dès le chargement de la page 
// en utilisant un event listener
document.addEventListener("DOMContentLoaded", function() {
    get_data();
  });
  
// ajout d'un event listener pour executer la fonction fill data dès une action submit sur notre fomulaire
document.querySelector('form').addEventListener('submit', fill_data);

// boucler l'appel à la fonction qui récupere les données chat avec la méthode setInterval
const interval = window.setInterval(get_data, 3500);
