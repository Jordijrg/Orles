import $ from 'jquery';

function viwer(){
    $(".btn_viwer_ora").on("click",(evt)=>{
        console.log(evt.target)
        switch(evt.target.value){
            case "activado":
                evt.target.value="invisible"
                
                break;
                case "invisible":
                    evt.target.value="activado"
                
                    break;
        }

        $.ajax({
            type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
            url: "/ajax_orlas_visibility", //url guarda la ruta hacia donde se hace la peticion
            data: {
                estado:evt.target.value,
                id: evt.target.dataset.id
            },
            async:true
            , // data recive un objeto con la informacion que se enviara al servidor
            success: function(datos) {
      
                //success es una funcion que se utiliza si el servidor retorna informacion
                let montarid="#estado"+evt.target.dataset.id
                console.log(montarid)
                $(montarid).html(evt.target.value)
             
                
            },

            dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        });
    })
}   
export {viwer}