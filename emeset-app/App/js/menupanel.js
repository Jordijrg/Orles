import jQuery from 'jquery';


function toggleUsuaris() {
    var usuaris = document.getElementById("usuaris");
    var orlas = document.getElementById("orlas");
    var grups = document.getElementById("grups");
    if (usuaris.style.display === "none" || usuaris.style.display === "") {
        usuaris.style.display = "block";
        orlas.style.display = "none";
        grups.style.display = "none";
    } else {
    }
}

function toggleOrlas() {
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var grups = document.getElementById("grups");
    if (orlas.style.display === "none" || orlas.style.display === "") {
        orlas.style.display = "block";
        usuaris.style.display = "none";
        grups.style.display = "none";
    } else {
    }
}

function toggleGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    if (grups.style.display === "none" || grups.style.display === "") {
        grups.style.display = "block";
        orlas.style.display = "none";
        usuaris.style.display = "none";
    } else {
    }
    console.log("VAAAAAAAAAAAA");
}



export {toggleUsuaris,toggleOrlas, toggleGrups};
