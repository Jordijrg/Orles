import $ from 'jquery';

function orlapdf(){

    jQuery("#back_orla").click(()=>{
        $.ajax({
            type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
            url: "/pdforla", //url guarda la ruta hacia donde se hace la peticion
            data: {
                idgrupo:element.IdGrup
            },
            async:false
            , // data recive un objeto con la informacion que se enviara al servidor
            success: function(datos) {
        
                //success es una funcion que se utiliza si el servidor retorna informacion
                 usuarios=datos.result
         
             
                
            },

            dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        });
     
    })
}