import $ from 'jquery';

// initialize components based on data attribute selectors
function grupoajax(){
    
    let control_witedmax=false
    $("#grupo_search").on("keydown",(evt)=>{
        let value_input=$("#grupo_search").val()
       

        const modal = FlowbiteInstances.getInstance('Modal', 'default-modal');
    modal.removeInstance();
    initFlowbite();
       
        if(value_input.length>=2){
            control_witedmax=true
           

            $.ajax({
                type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url: "/grupoajax", //url guarda la ruta hacia donde se hace la peticion
                data: {
                    texto:value_input
                },
              
                 // data recive un objeto con la informacion que se enviara al servidor
                success: function(datos) {
                    //success es una funcion que se utiliza si el servidor retorna informacion
                    $(".valores_grupos").html(``)
                 
                    let grupos=datos.result
                    $("#valores_grupos").append(`
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                            <script>
                            $( function() {
                              $( "#accordion" ).accordion({
                                collapsible: true
                              });
                            } );


// initialize components based on data attribute selectors


                            </script>
   

                            `)

                            grupos.forEach((element,i) => {
                   
                      
                                
                                $(".valores_grupos").append(`


                                <h3>${element.Nom}</h3>
                                                              `)

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
                                            let usuarios=datos.result
                                            if(datos==null){
                                            }   else{
                                                usuarios.forEach(element=>{
                                                    $(".valores_grupos").append(`

                                                    <div >
                                                    <button class="modales" data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                    ${element.Nom}
</button>
                                                    </div></div>
    `)
                                                })
                                                jQuery(".modales").on("click",()=>{
                                                    
                                                    modal.show();
                                                  

                                                })
                                               
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
    
        }else{
            if(control_witedmax==true){
                control_witedmax=false
                    $.ajax({
                        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
                        url: "/allgrupoajaxprofe", //url guarda la ruta hacia donde se hace la peticion
                        data: {
                            texto:value_input
                        },
                      // data recive un objeto con la informacion que se enviara al servidor
                        success: function(datos) {
                            //success es una funcion que se utiliza si el servidor retorna informacion
                            $(".valores_grupos").html(``)

                            let grupos=datos.result
                            $("#valores_grupos").append(`
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                            <script>
                            $( function() {
                              $( "#accordion" ).accordion({
                                collapsible: true
                              });
                            } );
                            </script>
                            `)
                          
                            grupos.forEach((element,i) => {
                   
                      
                                
                                    $(".valores_grupos").append(`

 
                                    <h3 >${element.Nom}</h3>
                                                                  `)

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
                                                let usuarios=datos.result
                                                if(datos==null){
                                                }   else{
                                                    usuarios.forEach(element=>{
                                                        $(".valores_grupos").append(`

                                                        <div data-modal-target="default-modal" data-modal-toggle="default-modal" class=" modales">
                                                          <p >${element.Nom}</p>
                                                        </div></div>
        `)
                                                    })
                                                 
                                                    jQuery(".modales").on("click",()=>{
                                                        
                                                        modal.show();

                                                    })
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