import jQuery from 'jquery';


function toggleUsuaris() {
    var usuaris = document.getElementById("usuaris");
    var orlas = document.getElementById("orlas");
    var grups = document.getElementById("grups");
    var usuariGrup = document.getElementById("usuariGrup");
    var orlas_generadas = document.getElementById("orlas_generadas");

    if (usuaris.style.display === "none" || usuaris.style.display === "") {
        usuaris.style.display = "block";
        orlas.style.display = "none";
        grups.style.display = "none";
        usuariGrup.style.display = "none";
        orlas_generadas.style.display = "none";
    } else {
        usuaris.style.display = "none";
    }
}

function toggleOrlas() {
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var grups = document.getElementById("grups");
    var usuariGrup = document.getElementById("usuariGrup");
    var orlas_generadas = document.getElementById("orlas_generadas");
    if (orlas.style.display === "none" || orlas.style.display === "") {
        orlas.style.display = "block";
        usuaris.style.display = "none";
        grups.style.display = "none";
        usuariGrup.style.display = "none";
        orlas_generadas.style.display = "none";
    } else {
        orlas.style.display = "none";
    }
}

function toggleGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var usuariGrup = document.getElementById("usuariGrup");
    var orlas_generadas = document.getElementById("orlas_generadas");
    if (grups.style.display === "none" || grups.style.display === "") {
        grups.style.display = "block";
        orlas.style.display = "none";
        usuaris.style.display = "none";
        usuariGrup.style.display = "none";
        orlas_generadas.style.display = "none";

    } else {
        grups.style.display = "none";
    }
}

function toggleUsuariGrups() {
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var usuariGrup = document.getElementById("usuariGrup");
    var orlas_generadas = document.getElementById("orlas_generadas");
    if (usuariGrup.style.display === "none" || usuariGrup.style.display === "") {
        usuariGrup.style.display = "block";
        grups.style.display = "none";
        orlas.style.display = "none";
        usuaris.style.display = "none";
        orlas_generadas.style.display = "none";
    } else {
        usuariGrup.style.display = "none";
    }
}
function toggleorlasgeneradas() {
    var orlas_generadas = document.getElementById("orlas_generadas")
    var grups = document.getElementById("grups");
    var orlas = document.getElementById("orlas");
    var usuaris = document.getElementById("usuaris");
    var usuariGrup = document.getElementById("usuariGrup");
    if (orlas_generadas.style.display === "none" || orlas_generadas.style.display === "") {
        orlas_generadas.style.display = "block";
        usuariGrup.style.display = "none";
        grups.style.display = "none";
        orlas.style.display = "none";
        usuaris.style.display = "none";
    } else {
        orlas_generadas.style.display = "none";
    }
}

// 
export {toggleUsuaris,toggleOrlas, toggleGrups, toggleUsuariGrups,toggleorlasgeneradas};