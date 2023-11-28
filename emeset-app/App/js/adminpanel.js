
function ajax(){

    
$(document).ready(function() {

    $(".openModal").on("click", function() {
        var IdUsuari = $(this).data("user-id");
        console.log(IdUsuari);

       
 

        //quan tanqui el modal totes les dades del modal
        $('#editUserModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
        }); 

        



        $.ajax({

            type: "POST",
            url: "/openModal",
            data: { IdUsuari: IdUsuari },
            dataType: "json", 

            success: function(users) {

                    console.log(users.id.IdUsuari);

                    $("#ID").val(users.id.IdUsuari);
                    $("#Nom").val(users.id.Nom);
                    $("#Cognom").val(users.id.Cognom);
                    $("#Correu").val(users.id.Correu);
                    $("#Contrasenya").val(users.id.Contrasenya);
                    $("#Estado").val(users.id.estado);
                    $("#Rol").val(users.id.rol);


                    
            // jQuery("#ID").html(users.id.IdUsuari);
            // jQuery("#Nom").html(users.Nom);
            // jQuery("#Cognom").html(users.Cognom);
            // jQuery("#Correu").html(users.Correu);
            // jQuery("#Contrasenya").html(users.Contrasenya);
            // jQuery("#Estado").html(users.estado);
            // jQuery("#Rol").html(users.rol);
                
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX: " + errorThrown);
            }
        });
    });
});
 document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("table-search-users");
    const table = document.getElementById("userTable");
    const rows = table.getElementsByTagName("tr");

    input.addEventListener("input", function () {
      const searchTerm = input.value.toLowerCase();

      for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName("td");
        let shouldHide = true;

        for (let j = 0; j < cells.length; j++) {
          const cellText = cells[j].textContent.toLowerCase();

          if (cellText.includes(searchTerm)) {
            shouldHide = false;
            break;
          }
        }

        if (shouldHide) {
          row.style.display = "none";
        } else {
          row.style.display = "";
        }
      }
    });

  });
}

export {ajax};