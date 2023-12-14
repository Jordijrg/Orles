
function random(){

  console.log("entraaaa")
$(document).ready(function() {

$(".modalRandom").on("click", function() {
    var IdUsuari = $(this).data("user-id");
    console.log(IdUsuari);

   


    $('#modalRandom').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    }); 

    



    $.ajax({

        type: "POST",
        url: "/modalRandom",
        data: { IdUsuari: IdUsuari },
        dataType: "json", 

        success: function(users) {

                console.log(users.id.IdUsuari);

                $("#ID").val(users.id.IdUsuari);
                $("#names").val(users.id.names);
                $("#surname").val(users.id.surname);
                $("#email").val(users.id.email);
                $("#password").val(users.id.password);
                $("#state").val(users.id.state);
                $("#role").val(users.id.role);

            
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

export {random};