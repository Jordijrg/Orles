import jQuery from 'jquery';


function toggleUsuaris() {
    var usuaris = document.getElementById("usuaris");
    if (usuaris.style.display === "none" || usuaris.style.display === "") {
        usuaris.style.display = "block";
    } else {
        usuaris.style.display = "none";
    }
}

function toggleOrlas() {
    var orlas = document.getElementById("orlas");
    if (orlas.style.display === "none" || orlas.style.display === "") {
        orlas.style.display = "block";
    } else {
        orlas.style.display = "none";
    }
}

export {toggleUsuaris,toggleOrlas};
