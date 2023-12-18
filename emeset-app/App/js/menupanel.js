import jQuery from 'jquery';


function toggleUsuaris() {
    var usuaris = document.getElementById("usuaris");
    var orlas = document.getElementById("orlas");
    var grups = document.getElementById("grups");
    var usuariGrup = document.getElementById("usuariGrup");

    if (usuaris.style.display === "none" || usuaris.style.display === "") {
        usuaris.style.display = "block";
        orlas.style.display = "none";
        grups.style.display = "none";
        usuariGrup.style.display = "none";
    } else {
        usuaris.style.display = "none";
    }
}

function toggleOrlas() {
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var grups = document.getElementById("grups");
    var usuariGrup = document.getElementById("usuariGrup");
    if (orlas.style.display === "none" || orlas.style.display === "") {
        orlas.style.display = "block";
        usuaris.style.display = "none";
        grups.style.display = "none";
        usuariGrup.style.display = "none";
    } else {
        orlas.style.display = "none";
    }
}

function toggleGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var usuariGrup = document.getElementById("usuariGrup");
    if (grups.style.display === "none" || grups.style.display === "") {
        grups.style.display = "block";
        orlas.style.display = "none";
        usuaris.style.display = "none";
        usuariGrup.style.display = "none";

    } else {
        grups.style.display = "none";
    }
}

function toggleUsuariGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var usuariGrup = document.getElementById("usuariGrup");
    if (usuariGrup.style.display === "none" || usuariGrup.style.display === "") {
        usuariGrup.style.display = "block";
        grups.style.display = "none";
        orlas.style.display = "none";
        usuaris.style.display = "none";
    } else {
        usuariGrup.style.display = "none";
    }
}



export {toggleUsuaris,toggleOrlas, toggleGrups, toggleUsuariGrups};