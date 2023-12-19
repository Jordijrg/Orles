import $ from 'jquery';

function delmissatge() {
    console.log("missasssss");
    $(".delmssg").click(function () {
        // Mostrar el div con id "addfotoorla"
        // Obtener la ID y la ruta de la imagen
        var id = this.id;
        // Actualizar el contenido del bloque en el HTML
        $(".confdelmssg").attr("id",id);
        $(".confdelmssg").attr("href","/delmssg/"+id);
        console.log(id);
        console.log("entra");
    });

}

export { delmissatge };
