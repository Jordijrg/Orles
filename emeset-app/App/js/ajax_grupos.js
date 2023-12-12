import $ from 'jquery';

// initialize components based on data attribute selectors
function grupoajax(){
    
    let control_witedmax=false
    $("#grupo_search").on("keydown",(evt)=>{
        let value_input=$("#grupo_search").val()
       

       
    if(value_input.length>=2){
        control_witedmax=true
       

        $.ajax({
            type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
            url: "/grupoajax", //url guarda la ruta hacia donde se hace la peticion
            data: {
                texto:value_input
            },
          async:false,
             // data recive un objeto con la informacion que se enviara al servidor
            success: function(datos) {
                //success es una funcion que se utiliza si el servidor retorna informacion
                $(".valores_grupos").html(``)
                        
                jQuery(`#accordion`).before(`
                <div id="extra">
                <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
$( "#accordion" ).accordion({
collapsible: true,
icons: null

});
} );

</script>
</div>
                `)           
                let grupos=datos.result
        
                        grupos.forEach((element,i) => {
                            let usuarios=[]
                      
                          
                                                
                                console.log(element)
                                    $.ajax({
                                    type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                                    url: "/alumngrupajax", //url guarda la ruta hacia donde se hace la peticion
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
                             
                                console.log(usuarios)
                                if(usuarios==null){
                                }   else{
                                  
                                    let html=``

                                    html+=`<h3>${element.Nom}</h3>
                                    <div>
                                    `
                                    
                                    usuarios.forEach(element2=>{
                                        console.log(" aquiiii el de busqueda")
                                        console.log(element2.IdUsuari)
                                            html+=` <div data-modal-target="default-modal" data-modal-toggle="default-modal" class=" modales">
                                            <button>${element2.Nom}</button>
                                            <a href="/subir_alumno/${element2.IdUsuari}/${element.IdGrup}">    <button class="float-right	">Imagenes</button></a>

                                          </div>`
                                    })

                                   html+= `</div>`
                                   
                                 
                                   $(".valores_grupos").append(`
                                   
                                   ${html}`)

                            
                                   
                                }
                                
                               
                           
                        /*
                         <div>
                              <p id=>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                            </div>
                        */
                    });
                 
             
            },

            dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        });
        console.log("....................")
    }else{
        if(control_witedmax==true){
            control_witedmax=false
                $.ajax({
                    type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                    url: "/allgrupoajaxprofe", //url guarda la ruta hacia donde se hace la peticion
                    data: {
                        texto:value_input
                    },
                    async: false,
                  // data recive un objeto con la informacion que se enviara al servidor
                    success: function(datos) {
                        //success es una funcion que se utiliza si el servidor retorna informacion
                        $(".valores_grupos").html(``)
                        jQuery(`#extra`).remove()                 
                        
                        jQuery(`#accordion`).before(`
                        <div id="extra">
                        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
$( "#accordion" ).accordion({
collapsible: true,
icons: null

});
} );

</script>
</div>
                        `)

                        let grupos=datos.result
                       
                        grupos.forEach((element2,i) => {
                                        $.ajax({
                                        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                                        url: "/alumngrupajax", //url guarda la ruta hacia donde se hace la peticion
                                        data: {
                                            idgrupo:element2.IdGrup
                                        },
                                        async:false
                                        , // data recive un objeto con la informacion que se enviara al servidor
                                        success: function(datos) {
                                  
                                            //success es una funcion que se utiliza si el servidor retorna informacion
                                            let usuarios=datos.result
                                            if(datos==null){
                                            }   else{
                                                let html=``

                                                html+=`<h3>${element2.Nom}</h3>
                                                <div>
                                                `
                                                usuarios.forEach(element=>{
                                                    console.log("aquiii22--")
                                                    console.log(element.IdUsuari)
                                                    html+=`  <div data-modal-target="default-modal" data-modal-toggle="default-modal" class=" modales">
                                                    <button>${element.Nom}</button>
                                                    <a href="/subir_alumno/${element.IdUsuari}/${element2.IdGrup}"> <button class="float-right	">Imagenes</button></a>
                                                  </div>`

                                                   

                                                })
                                                html+= `</div>`
                                            
                                              
                                                $(".valores_grupos").append(html)
         
                                            }
                                           
                                         
                                            
                                        },
                            
                                        dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
                                    });
                            
                            /*
                             <div>
                                  <p id=>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                                </div>
                            */
                        });
                     
                    },
        
                    dataType: "json", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
             });
            }

    }
    
    })

}
export {grupoajax}; 