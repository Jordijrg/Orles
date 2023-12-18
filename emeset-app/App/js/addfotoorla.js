import $ from 'jquery';

function addfotoorla() {
    function closeModal() {
        document.getElementById('myModal').classList.add('hidden');
    }

        // Evento para cerrar modal al hacer clic fuera de él
        $('#myModal').on('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });

        // Evento para cerrar modal al hacer clic en la cruz
        $('.modal-close').on('click', closeModal);


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
        // $(".Idfoto").text("ID: " + id);
        $(".bt-img").attr("id",id);
        $(".bt-img").attr("href","/selfoto/"+iduser+"/"+id);
        let prueba
            $.ajax({
                url: "/ajaxselfoto/"+iduser+"/"+id,
                type: "POST",
                dataType: "json",
                async: false,
                success: function (data) {
                    console.log("d")

                    if (data.respuesta == 1) {
                        prueba=data.respuesta;
                    } else {
                        prueba=data.respuesta;
                    }
                    
                    
                },
                error: function (error) {
                    console.log(error);
                }
        });
            console.log(prueba)
            if (prueba == 1) {
                $("#myModal").addClass("hidden");
                console.log($("#redirecion"))

            } else {
                $("#myModal").removeClass("hidden");

            }
  
     
      
        console.log(id + " " + rutaImagen);
    });
    $(".delft").click(function () {
        var id = this.dataset.id;
        $(".confdel").attr("href","/delselfoto/"+id);
    });

        // Evento para cerrar modal al hacer clic en la cruz
        $('#myModal2').on('click', function() {
            $('#myModal2').hide();
        });
}

export { addfotoorla };
