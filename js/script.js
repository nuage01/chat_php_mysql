
function get_data(str) {

    var xmlhttps = new XMLHttpRequest();
    xmlhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $data = this.responseText.split('<body>').pop().split('</body>')[0];
            const resultat = JSON.parse($data);
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

document.querySelector('form').addEventListener('submit', fill_data);
const interval = window.setInterval(get_data, 2000);
