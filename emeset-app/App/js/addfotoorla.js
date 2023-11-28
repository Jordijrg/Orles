import $ from 'jquery';

function addfotoorla() {
    $(".imgft").click(function () {
        // Mostrar el div con id "addfotoorla"
        $("#addfotoorla").removeClass("hidden");
        // Obtener la ID y la ruta de la imagen
        var id = this.id;
        var rutaImagen = $("#" + this.id + " div img").attr("src");
        var iduser = $("#" + this.id + " div img").data("user");
        console.log(iduser);
        // Actualizar el contenido del bloque en el HTML
        $("#addfotoorla .srcfoto img").attr("src", rutaImagen);
        $(".Idfoto").text("ID: " + id);
        $(".bt-img").attr("id",id);
        $(".bt-img").attr("href","/selfoto/"+iduser+"/"+id);
        console.log(id + " " + rutaImagen);
    });
    $(".delft").click(function () {
        var id = this.id;
        $(".confdel").attr("href","/delselfoto/"+id);
    });
}

export { addfotoorla };
