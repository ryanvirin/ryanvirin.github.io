alert("Welkom op mijn portfolio website")

function Confirm(form){
    alert("Je bericht is verzonden, dankjewel!");
    form.submit();
}

while (!naam) {
    var naam = prompt("Wat is uw naam?");

    document.getElementById("welkom").innerHTML =
        "Welkom " + naam + "";
}


