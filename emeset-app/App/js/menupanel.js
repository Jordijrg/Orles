import jQuery from 'jquery';


function toggleUsuaris() {
    var usuaris = document.getElementById("usuaris");
    var orlas = document.getElementById("orlas");
    if (usuaris.style.display === "none" || usuaris.style.display === "") {
        usuaris.style.display = "block";
        orlas.style.display = "none";
    } else {
        usuaris.style.display = "none";
    }
}

function toggleOrlas() {
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    if (orlas.style.display === "none" || orlas.style.display === "") {
        orlas.style.display = "block";
        usuaris.style.display = "none";
    } else {
        orlas.style.display = "none";
    }
}

function toggleGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    if (grups.style.display === "none" || grups.style.display === "") {
        grups.style.display = "block";
        orlas.style.display = "none";
    } else {
        grups.style.display = "none";
    }
}



export {toggleUsuaris,toggleOrlas, toggleGrups};
